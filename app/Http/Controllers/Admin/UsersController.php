<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Admin;
use App\Enums\UserStatus;

class UsersController extends Controller
{
    public function getLogin(){
        return view('admin.user.login');
    }

    public function postLogin(Request $request)
    {
        $this->validate($request, ['username' => 'required', 'password' => 'required']);
        if(
            auth()->guard('admin')->attempt([
                'username' => $request->input('username'),
                'password' => $request->input('password'),
            ])
        ){
            $user = auth()->guard('admin')->user();
            if($user->status == UserStatus::LOCK) return back()->with('error','Tài khoản đang bị khóa.');
            Admin::query()->update(['last_login' => date('Y-m-d H:i:s')]);
            return redirect()->route('admin.notice.list-notice')->with('success', 'Đăng nhập thành công.');
        }else {
            return back()->with('error','Sai tài khoản hoặc mật khẩu.');
        }
    }

    public function logout(Request $request)
    {
        auth()->guard('admin')->logout();
        Session::flush();
        Session::put('success', 'Đăng xuất thành công');
        return redirect(route('admin.get-login'));
    }
}
