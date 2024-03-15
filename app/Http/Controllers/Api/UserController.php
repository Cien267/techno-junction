<?php

namespace App\Http\Controllers\Api;
use App\Http\Requests\Admin\ChangePasswordRequest;
use Illuminate\Support\MessageBag;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\ApiController;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Enums\UserType;
use App\Enums\UserStatus;
use App\Enums\TripDefine;
use App\Enums\StatusCode;
use App\Http\Requests\Admin\LoginRequest;
use App\Http\Requests\Admin\RegisterRequest;
use App\Http\Requests\Admin\UpdateDeviceTokenRequest;
use App\Base\Cache\Users\UserCache;
use App\Services\User\UserService;
use Validator;


class UserController extends ApiController
{

    public function __construct() {

    }

    public function updateDeviceToken(UpdateDeviceTokenRequest $request)
    {
        try {
            $data = $request->all();
            $user = Admin::where('id', $data['user_id'])->first();
            $user->os = $data['os'];
            $user->device_token = $data['device_token'];
            $user->save();
            return $this->responseApi(StatusCode::SUCCESS, 'Cập nhật device token thành công', []);
        }catch (\Exception $e){
            return $this->responseApi(StatusCode::UNKNOWN_ERROR, $e->getMessage(), []);
        }


    }

    public function login(LoginRequest $request){
        $data = $request->all();
        $token = auth()->attempt([
                "phone" => $data['phone'],
                "password" => $data['password'],
                "status" => UserStatus::ACTIVE
            ]
        );
        if (!$token) {
            $user = Admin::where('phone', $data['phone'])->first();
            if(!$user){
                return $this->responseApi(StatusCode::AUTHORIZATION, 'Tài khoản chưa đăng ký', []);
            }else if($user['status'] == UserStatus::INACTIVE){
                return $this->responseApi(StatusCode::AUTHORIZATION, 'Tài khoản chưa kích hoạt', []);
            }else if($user['status'] == UserStatus::LOCK){
                return $this->responseApi(StatusCode::AUTHORIZATION, 'Tài khoản đang tạm khóa', []);
            }
        }else {
            $data =  [
                'token' => 'Bearer '.$token,
                'data' => auth()->user()
            ];
            return $this->responseApi(StatusCode::SUCCESS, 'Đăng nhập thành công', $data);
        }
    }

    public function register(RegisterRequest $request) {
        try {
            $data = $request->all();
            if($data['group_id'] == UserType::DRIVER){
                $msg = 'Đăng ký tài khoản thành công, Sau 5 phút admin sẽ liên hệ để duyệt tài khoản';
                if(empty($data['car_type_id'])){
                    return $this->responseApi(StatusCode::VALIDATOR, 'Dữ liệu không hợp lệ', new MessageBag(['car_type_id' => 'Loại xe không được trống']));
                }
                if(empty($data['model'])){
                    return $this->responseApi(StatusCode::VALIDATOR, 'Dữ liệu không hợp lệ', new MessageBag(['model' => 'Thông tin xe không được trống']));
                }
                if(empty($data['region'])){
                    return $this->responseApi(StatusCode::VALIDATOR, 'Dữ liệu không hợp lệ', new MessageBag(['region' => 'Khu vực không được trống']));
                }
                $data['reputation'] = TripDefine::REPUTATION_DEFAULT;
                $service = new UserService;
                $coordinates = $service->getCoordinates($data['region']);
                $data = array_merge($data, $coordinates);
            }else if($data['group_id'] == UserType::GUEST){
                $msg = 'Nhập mã OTP để kích hoạt tài khoản';
            }
            $data['password'] = bcrypt($request->password);
            $data['status'] = UserStatus::INACTIVE;
            Admin::create($data);
            return $this->responseApi(StatusCode::SUCCESS, $msg, []);
        }catch (\Exception $e){
            return $this->responseApi(StatusCode::UNKNOWN_ERROR, $e->getMessage(), []);
        }

    }

    public function logout() {
        try {
            auth()->logout();
            return $this->responseApi(StatusCode::SUCCESS, 'Logout thành công', []);
        }catch (\Exception $e){
            return $this->responseApi(StatusCode::UNKNOWN_ERROR, $e->getMessage(), []);
        }

    }

    public function refresh() {
        try {
            $token = auth()->refresh();
            return $this->responseApi(StatusCode::SUCCESS, 'Refresh token thành công', 'Bearer '.$token);
        }catch (\Exception $e){
            return $this->responseApi(StatusCode::UNKNOWN_ERROR, $e->getMessage(), []);
        }
    }

    public function userProfile(Request $request) {
        try {
            $data = $request->all();
            $user = Admin::where('id', $data['user_id'])->first();
            return $this->responseApi(StatusCode::SUCCESS, 'Lấy dữ liệu thành công', $user);
        }catch (\Exception $e){
            return $this->responseApi(StatusCode::UNKNOWN_ERROR, $e->getMessage(), []);
        }
    }

    public function changePassWord(ChangePasswordRequest $request) {
        try {
            $data = $request->all();
            $user = Admin::where('id', $data['user_id'])->first();
            $user->password = bcrypt($request['new_password']);
            $user->save();
            return $this->responseApi(StatusCode::SUCCESS, 'Thay đổi mật khẩu thành công', []);
        }catch (\Exception $e){
            return $this->responseApi(StatusCode::UNKNOWN_ERROR, $e->getMessage(), []);
        }
    }
}

