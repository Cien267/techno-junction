<?php

namespace App\Http\Middleware;

use Closure;
use JWTAuth;
use Exception;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;
use App\Enums\StatusCode;
use App\Enums\VersionApp;

class JwtMiddleware extends BaseMiddleware
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        try {
            $user = JWTAuth::parseToken()->authenticate();
            if($user){
                $os = $request->header('os');
                $version = $request->header('version');
                if(
                    ($os == VersionApp::IOS && !in_array($version, VersionApp::ALLOW_IOS)) ||
                    ($os == VersionApp::ANDROID && !in_array($version, VersionApp::ALLOW_ANDROID))
                ){
                    return response()->json(['code' => StatusCode::UPDATE_APP_VERSION, 'msg' => 'Đã có phiên bản mới, vui lòng cập nhật', 'data' => []], StatusCode::AUTHORIZATION);
                }
                $request->merge([
                    'user_id' => $user->id ?? '',
                    'user_phone' => $user->phone ?? '',
                    'user_status' => $user->status ?? 0,
                    'user_car_type_id' => $user->car_type_id ?? '',
                    'user_group_id'=> $user->group_id ?? 0,
                ]);
            }
        } catch (Exception $e) {
            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException){
                return response()->json(['code' => StatusCode::AUTHORIZATION, 'msg' => 'Token is Invalid', 'data' => []], StatusCode::AUTHORIZATION);
            }else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException){
                return response()->json(['code' => StatusCode::AUTHORIZATION, 'msg' => 'Token is Expired', 'data' => []], StatusCode::AUTHORIZATION);
            }else{
                return response()->json(['code' => StatusCode::AUTHORIZATION, 'msg' => 'Authorization Token not found', 'data' => []], StatusCode::AUTHORIZATION);
            }
        }
        return $next($request);
    }
}