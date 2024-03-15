<?php

namespace App\Http\Controllers\Api;
use App\Base\Cache\Users\UserCache;
use App\Models\Config;
use App\Models\Feedback;
use App\Models\Admin;
use App\Mongo\LogTrip;
use App\Enums\LogType;
use App\Enums\TripDefine;
use App\Enums\UserType;
use App\Enums\StatusCode;
use App\Services\Log\LogService;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\SettingInfoRequest;
use App\Http\Requests\Admin\BuyTripRequest;
use App\Http\Requests\Admin\ConfirmTripRequest;
use App\Http\Requests\Admin\CancelTripRequest;
use App\Http\Requests\Admin\TrackingTripRequest;
use App\Http\Requests\Admin\HistoryBuyTripRequest;
use App\Http\Requests\Admin\HistorySellTripRequest;
use App\Http\Requests\Admin\DetailTripRequest;
use App\Http\Requests\Admin\TransactionListRequest;
use App\Services\Trip\TripService;
use App\Services\Transaction\TransactionService;
use Illuminate\Support\MessageBag;
use App\Jobs\SendMailCreateTrip;

class TripController extends ApiController
{
    public function __construct() {}

    public function create(SettingInfoRequest $request){
        try {
            $data = $request->all();
            $service = new TripService();
            $user = UserCache::getUserById($data['user_id']);
            if($data['type'] == TripDefine::TYPE_TRIP_PACKAGE){ // Trọn gói
                if(empty($data['car_type_id'])){
                    return $this->responseApi(StatusCode::VALIDATOR, 'Dữ liệu không hợp lệ', new MessageBag(['car_type_id' => 'Loại xe không được trống']));
                }
            }else if($data['type'] == TripDefine::TYPE_TRIP_PAIRING){ // Ghép chuyến
                if(empty($data['seats'])){
                    return $this->responseApi(StatusCode::VALIDATOR, 'Dữ liệu không hợp lệ', new MessageBag(['seats' => 'Số ghế không được trống']));
                }

                $data['money'] = $data['seats'] * $data['money'];
            }

            if($user['group_id'] == UserType::DRIVER && empty($data['guest_phone'])){
                return $this->responseApi(StatusCode::VALIDATOR, 'Dữ liệu không hợp lệ', new MessageBag(['guest_phone' => 'Số điện thoại của khách không được trống']));
            }
            if(strtotime(' +5 minutes') >= strtotime($data['time_start'])){
                return $this->responseApi(StatusCode::VALIDATOR, 'Dữ liệu không hợp lệ', new MessageBag(['time_start' => 'Thời gian đón phải trước 5 phút']));
            }

            $data['percent_money'] = $service->getPercentMoney();
            $data['money_discount'] = round($data['percent_money'] * $data['money'], 0);
            $data['percent_service_fee'] = $service->getPercentServiceFee();
            $data['service_fee'] = round($data['percent_service_fee'] * $data['money'], 0);
            $data['status'] = $service->getTripStatusDefault($data);
            $data['time_sell'] = $service->getTimeSell($data);
            $data['point'] = $service->getPoint($data);
            $data['reputation'] = $service->getReputation();
            $data['radius'] = $service->getRadius();
            $personCreate = $service->getPersonCreate($user, $data);
            $data = array_merge($data, $personCreate);
            $trip = Feedback::create($data);
            // gui job mail cho admin
            dispatch(new SendMailCreateTrip($trip))->onQueue('send-mail');
            // goi service notification ban thong bao cho lxe tao, va cac lai xe nam trong ban kinh
            // ghi log - type > tracking
            $logService = new LogService();
            $logService->setCode($logService->logMongoCode);
            $logService->setType(LogType::TYPE_CREATE_TRIP);
            $logService->setTypeRequest(LogType::TYPE_REQUEST_APP);
            $logService->pushLog([
                'message' => $user['group_id'] == UserType::DRIVER ? 'Lái xe bán chuyến' : 'Khách tạo chuyến',
                'data_request' => $data,
                'trip' => $trip,
                'trip_id' => $trip->id,
                'show_tracking' => 1,
                'status' => 'success',
            ]);
            return $this->responseApi(StatusCode::SUCCESS, 'Tạo chuyến thành công', $trip);
        }catch (\Exception $e){
            return $this->responseApi(StatusCode::UNKNOWN_ERROR, $e->getMessage(), []);
        }
    }

    public function getList(Request $request){
       $data = $request->all();
       $now = date('Y-m-d H:i:s');
       $user = Admin::where('id', $data['user_id'])->first();
       $latDriver = $user->lat_region;
       $longDriver = $user->long_region;
       $tripList = Feedback::where('status', TripDefine::STATUS_TRIP_SELLING)
                   ->select(
                       'id', 'status', 'place_start', 'place_end', 'time_start', 'time_sell', 'type', 'car_type_id', 'seats', 'money',
                       'money_discount', 'service_fee', 'point', 'note'
                   )
                   ->nearby([
                       $latDriver,
                       $longDriver
                   ], TripDefine::RADIUS_DEFAULT)
//                   ->where('time_sell', '<=', $now)
                   ->where(function ($query) use ($user) {
                       $query->whereNull('car_type_id')
                               ->orWhere(function ($query) use ($user) {
                                   $query->whereNotNull('car_type_id')
                                       ->where('car_type_id', '<=', $user->car_type_id);
                               });
                   });
       if(!empty($data['datetime_from']) && !empty($data['datetime_to'])){
           $tripList = $tripList->whereBetween('time_start', [$data['datetime_from'], $data['datetime_to']]);
       }
        if(isset($data['type']) && in_array($data['type'], [0,1])){
            $tripList = $tripList->where('type', $data['type']);
        }

        $tripList = $tripList->orderBy('time_sell', 'ASC')->get();
        return $this->responseApi(StatusCode::SUCCESS, 'Lấy danh sách chuyến thành công', $tripList);
    }

    public function buy(BuyTripRequest $request){
        try {
            $data = $request->all();
            $user = Admin::where('id', $data['user_id'])->first();
            $trip = Feedback::where('id', $data['id'])->where('status', TripDefine::STATUS_TRIP_SELLING)->first();
            if($trip){
                if(!empty($trip->driver_sell_id) && $user->id == $trip->driver_sell_id){
                    return $this->responseApi(StatusCode::UNKNOWN_ERROR, 'Bạn không thể mua chuyến bạn bán lên hệ thống', []);
                }
                if($user->money < ($trip->money_discount + $trip->service_fee)){
                    return $this->responseApi(StatusCode::NOT_ENOUGH_MONEY, 'Bạn không đủ tiền, vui lòng nạp thêm tiền để mua chuyến', [], StatusCode::UNKNOWN_ERROR);
                }
                if($user->point < $trip->point){
                    return $this->responseApi(StatusCode::NOT_ENOUGH_POINT, 'Bạn không đủ điểm, vui lòng bán chuyến lên hệ thống để thực hiện trao đổi chuyến', [], StatusCode::UNKNOWN_ERROR);
                }
                if($user->reputation < TripDefine::REPUTATION_MIN_BUY_TRIP){
                    return $this->responseApi(StatusCode::NOT_ENOUGH_REPUTATION, 'Uy tín của bạn hiện tại là '.$user->reputation.', Hãy tuân thủ chính sách để tăng điểm uy tin', [], StatusCode::UNKNOWN_ERROR);
                }
                $trip->driver_buy_id = $user->id;
                $trip->status = TripDefine::STATUS_TRIP_SUCCESS;
                $trip->buy_at = date('Y-m-d H:i:s');
                $trip->save();
                // Ghi log mua chuyến
                $logService = new LogService();
                $logService->setCode($logService->logMongoCode);
                $logService->setType(LogType::TYPE_BUY_TRIP);
                $logService->setTypeRequest(LogType::TYPE_REQUEST_APP);
                $logService->pushLog([
                    'message' => 'Lái xe nhận chuyến' ,
                    'data_request' => $data,
                    'trip' => $trip,
                    'trip_id' => $trip->id,
                    'show_tracking' => 1,
                    'status' => 'success',
                ]);

                $transactionService = new TransactionService();
                $transactionService->setLogId($logService->logMongoCode);
                $transactionService->setLogType(LogType::TYPE_BUY_TRIP);
                $transactionService->setLogRequest(LogType::TYPE_REQUEST_APP);
                $transactionService->changeBuyTrip($user, $trip);

                return $this->responseApi(StatusCode::SUCCESS, 'Mua chuyến thành công', []);
            }else {
                return $this->responseApi(StatusCode::UNKNOWN_ERROR, 'Chuyến không tồn tại', []);
            }
        }catch (\Exception $e){
            return $this->responseApi(StatusCode::UNKNOWN_ERROR, $e->getMessage(), []);
        }
    }

    public function cancel(CancelTripRequest $request){
        try {
            $data = $request->all();
            $user = Admin::where('id', $data['user_id'])->first();
            $trip = Feedback::where('id', $data['id'])
                ->where('status', '<>', TripDefine::STATUS_TRIP_CANCEL)
                ->where(function ($query) use ($user) {
                    $query->where('driver_sell_id', $user->id)
                        ->orWhere('driver_buy_id', $user->id);
                })->first();
            if($trip){
                if($user->id == $trip->driver_sell_id){
                    // Lxe bán hủy: Đã có lái xe, không thể hủy
                    if(in_array($trip->status, TripDefine::STATUS_TRIP_SUCCESS, TripDefine::STATUS_TRIP_CONFIRMED)){
                        return $this->responseApi(StatusCode::UNKNOWN_ERROR, 'Chuyến đã có lái xe mua, Liên hệ Admin để hủy chuyến', []);
                    }
                }else if($user->id == $trip->driver_buy_id){
                    // Lxe mua hủy : Đã xác nhận chuyến không thể hủy
                    if($trip->status == TripDefine::STATUS_TRIP_CONFIRMED){
                        return $this->responseApi(StatusCode::UNKNOWN_ERROR, 'Chuyến đã đã xác nhận không thể hủy, Liên hệ Admin để hủy chuyến', []);
                    }
                }
                $trip->cancel_user_id = $user->id;
                $trip->cancel_note = $data['cancel_note'];
                $trip->cancel_at = date('Y-m-d H:i:s');
                $trip->status = TripDefine::STATUS_TRIP_CANCEL;
                $trip->save();
                $msg = $user->id == $trip->driver_sell_id ? 'Lái xe bán hủy chuyến' : ($user->id == $trip->driver_buy_id ? 'Lái xe nhận chuyến hủy chuyến' : 'Khách hủy chuyến');
                // Ghi log hủy chuyến
                $logService = new LogService();
                $logService->setCode($logService->logMongoCode);
                $logService->setType(LogType::TYPE_CANCEL_TRIP);
                $logService->setTypeRequest(LogType::TYPE_REQUEST_APP);
                $logService->pushLog([
                    'message' => $msg ,
                    'data_request' => $data,
                    'trip_id' => $trip->id,
                    'show_tracking' => 1,
                    'status' => 'success',
                ]);
                $transactionService = new TransactionService();
                $transactionService->setLogId($logService->logMongoCode);
                $transactionService->setLogType(LogType::TYPE_CANCEL_TRIP);
                $transactionService->setLogRequest(LogType::TYPE_REQUEST_APP);
                $transactionService->changeCancelTrip($user, $trip);

                return $this->responseApi(StatusCode::SUCCESS, 'Hủy chuyến thành công', []);
            }else {
                return $this->responseApi(StatusCode::UNKNOWN_ERROR, 'Bạn không thể hủy chuyến này', []);
            }
        }catch (\Exception $e){
            return $this->responseApi(StatusCode::UNKNOWN_ERROR, $e->getMessage(), []);
        }
    }

    public function confirm(ConfirmTripRequest $request){
        try {
            $data = $request->all();
            $user = Admin::where('id', $data['user_id'])->first();
            $trip = Feedback::where('id', $data['id'])->where('status', TripDefine::STATUS_TRIP_SUCCESS)->where('driver_buy_id', $user->id)->first();
            if($trip){
                $trip->status = TripDefine::STATUS_TRIP_CONFIRMED;
                $trip->confirm_at = date('Y-m-d H:i:s');
                $trip->save();
                // Ghi log xác nhận chuyến
                $logService = new LogService();
                $logService->setCode($logService->logMongoCode);
                $logService->setType(LogType::TYPE_CONFIRM_TRIP);
                $logService->setTypeRequest(LogType::TYPE_REQUEST_APP);
                $logService->pushLog([
                    'message' => 'Lái xe đã xác nhận chuyến' ,
                    'data_request' => $data,
                    'trip_id' => $trip->id,
                    'show_tracking' => 1,
                    'status' => 'success',
                ]);
                $transactionService = new TransactionService();
                $transactionService->setLogId($logService->logMongoCode);
                $transactionService->setLogType(LogType::TYPE_CONFIRM_TRIP);
                $transactionService->setLogRequest(LogType::TYPE_REQUEST_APP);
                $transactionService->changeConfirmTrip($user, $trip);

                return $this->responseApi(StatusCode::SUCCESS, 'Xác nhận chuyến thành công', []);
            }else {
                return $this->responseApi(StatusCode::UNKNOWN_ERROR, 'Bạn không xác nhận được chuyến này hoặc chuyến đã được xác nhận trước đó', []);
            }
        }catch (\Exception $e){
            return $this->responseApi(StatusCode::UNKNOWN_ERROR, $e->getMessage(), []);
        }
    }

    public function detail(DetailTripRequest $request){
        $data = $request->all();
        try {
            $trip = Feedback::with([
                    'guest' => function ($query) {
                        $query->select('id', 'name', 'phone');
                    },
                    'driverBuy' => function ($query) {
                        $query->select('id', 'name', 'phone', 'car_type_id', 'carlicense', 'model');
                    }, 'driverSell' => function ($query) {
                    $query->select('id', 'name', 'phone', 'car_type_id', 'carlicense', 'model');
                    }
                ])
                ->where('id', $data['id'])
                ->where(function ($query) use ($data) {
                    $query->where('driver_sell_id', $data['user_id'])
                        ->orWhere('driver_buy_id', $data['user_id']);
                })
                ->first();
            return $this->responseApi(StatusCode::SUCCESS, 'Lấy dữ liệu thành công', $trip);
        }catch (\Exception $e){
            return $this->responseApi(StatusCode::UNKNOWN_ERROR, $e->getMessage(), []);
        }

    }

    public function historyBuyTrip(HistoryBuyTripRequest $request){
        try {
            $data = $request->all();
            $tripList = Feedback::where('driver_buy_id', $data['user_id'])
                ->whereBetween('time_start', [$data['datetime_from'], $data['datetime_to']])
                ->orderBy('time_start', 'DESC')
                ->paginate(20);
            return $this->responseApi(StatusCode::SUCCESS, 'Lấy dữ liệu thành công', $tripList);
        }catch (\Exception $e){
            return $this->responseApi(StatusCode::UNKNOWN_ERROR, $e->getMessage(), []);
        }
    }

    public function historySellTrip(HistorySellTripRequest $request){
        try {
            $data = $request->all();
            $tripList = Feedback::where('driver_sell_id', $data['user_id'])
                ->whereBetween('time_start', [$data['datetime_from'], $data['datetime_to']])
                ->orderBy('time_start', 'DESC')
                ->paginate(20);
            return $this->responseApi(StatusCode::SUCCESS, 'Lấy dữ liệu thành công', $tripList);
        }catch (\Exception $e){
            return $this->responseApi(StatusCode::UNKNOWN_ERROR, $e->getMessage(), []);
        }
    }

    public function tracking(TrackingTripRequest $request){
        try {
            $data = $request->all();
            $trip = Feedback::where('id', $data['id'])->first();
            if($trip){
//                $logs = LogTrip::where('trip_id', $trip->id)->orderBy('created_at', 'DESC')->get();
                $logs = LogTrip::select('code','type', 'trip_id', 'status', 'message', 'created_at')
                    ->whereNotNull('code')
                    ->where('trip_id', $trip->id)
                    ->where('status', 'success')
                    ->where('show_tracking', 1)
                    ->orderBy('created_at', 'DESC')
                    ->get();
                return $this->responseApi(StatusCode::SUCCESS, 'Lấy dữ liệu thành công', $logs);
            }else {
                return $this->responseApi(StatusCode::UNKNOWN_ERROR, 'Chuyến không tồn tại', []);
            }
        }catch (\Exception $e){
            return $this->responseApi(StatusCode::UNKNOWN_ERROR, $e->getMessage(), []);
        }
    }

    public function transaction(TransactionListRequest $request){
        try {
            $data = $request->all();
            $tripList = Config::where('user_id', $data['user_id'])->whereBetween('created_at', [$data['datetime_from'], $data['datetime_to']]);
            if(isset($data['type'])){
                if(!in_array($data['type'], [0,1,2])){
                    return $this->responseApi(StatusCode::VALIDATOR, 'Dữ liệu không hợp lệ', new MessageBag(['type' => 'Type không tồn tại']));
                }else {
                    $tripList = $tripList->where('type', $data['type']);
                }
            }
            $tripList = $tripList->orderBy('created_at', 'DESC')->paginate(20);
            return $this->responseApi(StatusCode::SUCCESS, 'Lấy dữ liệu thành công', $tripList);
        }catch (\Exception $e){
            return $this->responseApi(StatusCode::UNKNOWN_ERROR, $e->getMessage(), []);
        }
    }

}

