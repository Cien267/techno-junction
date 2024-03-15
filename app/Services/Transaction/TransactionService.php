<?php

namespace App\Services\Transaction;

use App\Base\Interfaces\BaseServiceInterface;
use App\Enums\LogType;
use App\Enums\UserType;
use App\Mongo\LogTrip;
use App\Services\BaseService;
use App\Enums\TripDefine;
use App\Enums\TransactionType;
use App\Models\Transaction;
use App\Models\User;
use App\Services\Log\LogService;
use App\Services\User\UserService;

class TransactionService extends BaseService implements BaseServiceInterface
{
    private $logId;
    private $logType;
    private $logRequest;
    public function __construct()
    {
//        $this->servicePath = '\App\Services\Trip';
//        $this->collection = new LogTrip();
    }

    public function setLogId($logId){
        $this->logId = $logId;
    }

    public function setLogType($logType){
        $this->logType = $logType;
    }

    public function setLogRequest($logRequest){
        $this->logRequest = $logRequest;
    }

    public function createLogTransaction($data){
        $data['show_tracking'] = 0;
        $logService = new LogService();
        $logService->setCode(null);
        $logService->setParentCode($this->logId);
        $logService->setType($this->logType);
        $logService->setTypeRequest($this->logRequest);
        $logService->pushLog($data);
    }

    public function changeCancelTrip($driver, $trip){
        if($driver->id == $trip->driver_sell_id){
            // Lxe bán : Chỉ cho hủy khi chuyến chưa được lái xe nào mua, trừ uy tín lái xe bán
            $reputation = TripDefine::REPUTATION_CANCEL_TRIP_DRIVER_SELL;
            $this->createTransaction(TransactionType::TYPE_REPUTATION, $driver->id, $trip->id, $driver->reputation, -$reputation, TransactionType::NOTE_CANCEL_MINUS_REPUTATION);
        }else if($driver->id == $trip->driver_buy_id){
            // Lxe mua : Chỉ cho hủy khi chuyến chưa được xác nhận, Hoàn tiền + điểm, trừ uy tín
            $totalFee = $trip->money_discount + $trip->service_fee;
            $point = $trip->point;
            $reputation = TripDefine::REPUTATION_CANCEL_TRIP_DRIVER_BUY;
            $this->createTransaction(TransactionType::TYPE_MONEY, $driver->id, $trip->id, $driver->money, $totalFee, TransactionType::NOTE_REFUND_MINUS_MONEY);
            $this->createTransaction(TransactionType::TYPE_POINT, $driver->id, $trip->id, $driver->point, $point, TransactionType::NOTE_REFUND_MINUS_POINT);
            $this->createTransaction(TransactionType::TYPE_REPUTATION, $driver->id, $trip->id, $driver->reputation, -$reputation, TransactionType::NOTE_CANCEL_MINUS_REPUTATION);
        }
    }

    public function changeBuyTrip($driverBuy, $trip){
        // Lái xe mua : Trừ tiền cắt + fee dịch vụ, Trừ điểm
        $totalFee = $trip->money_discount + $trip->service_fee;
        $point = $trip->point;
        $this->createTransaction(TransactionType::TYPE_MONEY, $driverBuy->id, $trip->id, $driverBuy->money, -$totalFee, TransactionType::NOTE_BUY_MINUS_MONEY);
        $this->createTransaction(TransactionType::TYPE_POINT, $driverBuy->id, $trip->id, $driverBuy->point, -$point, TransactionType::NOTE_BUY_MINUS_POINT);

        // Lái xe bán : Cộng điểm
        if(!empty($trip->driver_sell_id)){
            $driverSell = User::where('id', $trip->driver_sell_id)->first();
            if($driverSell){
                $this->createTransaction(TransactionType::TYPE_POINT, $driverSell->id, $trip->id, $driverSell->point, $point, TransactionType::NOTE_SELL_PLUS_POINT);
            }
        }
    }

    public function changeConfirmTrip($driverBuy, $trip){
        // Lái xe bán + lái xe mua : Cộng uy tín
        $reputation = TripDefine::REPUTATION_CONFIRM_TRIP;
        $this->createTransaction(TransactionType::TYPE_REPUTATION, $driverBuy->id, $trip->id, $driverBuy->reputation, $reputation, TransactionType::NOTE_CONFIRM_PLUS_REPUTATION);
        if(!empty($trip->driver_sell_id)){
            $driverSell = User::where('id', $trip->driver_sell_id)->first();
            if($driverSell){
                $this->createTransaction(TransactionType::TYPE_REPUTATION, $driverSell->id, $trip->id, $driverSell->reputation, $reputation, TransactionType::NOTE_SELL_PLUS_REPUTATION);
            }
        }
    }

    public function changeCreateSellPoint($driver, $sellPoint){
        $this->createTransaction(TransactionType::TYPE_POINT, $driver->id, null, $driver->point, -$sellPoint->point, TransactionType::NOTE_SELL_POINT_MINUS_POINT);
    }

    public function changeCancelSellPoint($driver, $sellPoint){
        $this->createTransaction(TransactionType::TYPE_POINT, $driver->id, null, $driver->point, $sellPoint->point, TransactionType::NOTE_CANCEL_SELL_POINT_PLUS_POINT);
    }

    public function changeBuySellPoint($driverBuy, $sellPoint){
        // Lái xe mua : cộng điểm, trừ tiền
        $totalMoney = $sellPoint->point * $sellPoint->money;
        $this->createTransaction(TransactionType::TYPE_POINT, $driverBuy->id, null, $driverBuy->point, $sellPoint->point, TransactionType::NOTE_SELL_POINT_PLUS_POINT);
        $this->createTransaction(TransactionType::TYPE_MONEY, $driverBuy->id, null, $driverBuy->money, -$totalMoney, TransactionType::NOTE_SELL_POINT_MINUS_MONEY);
        // Lái xe bán : cộng tiền
        $driverSell = User::where('id', $sellPoint->user_id)->first();
        $this->createTransaction(TransactionType::TYPE_MONEY, $driverSell->id, null, $driverSell->money, $totalMoney, TransactionType::NOTE_SELL_POINT_PLUS_MONEY);
    }

    public function createTransaction($type, $userId, $tripId, $beforeValue, $value, $note){
        if($value != 0){
            $afterValue = $beforeValue + $value;

            // Uy tín max luôn là 100
            if($type == TransactionType::TYPE_REPUTATION && $afterValue >= 100 ){
                $afterValue = TripDefine::REPUTATION_DEFAULT;
            }
            $data = [
                'type' => $type,
                'user_id' => $userId,
                'trip_id' => $tripId,
                'before_value' => $beforeValue,
                'value' => $value,
                'after_value' => $afterValue,
                'note' => $note
            ];
            $transaction = Transaction::create($data);
            if($transaction){
                $this->createLogTransaction($data);
                $userService = new UserService();
                $userService->changeTransaction($type, $userId, $afterValue);
            }
        }
    }



}