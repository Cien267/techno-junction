<?php

namespace App\Http\Controllers\Provider;

use App\Core\Services\SignupService;
use App\Enums\UserType;
use App\Http\Controllers\Controller;
use App\Http\Requests\SignupRequest;
use App\Services\Mail\MailService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class ProviderController extends Controller
{
    private $mailService;
    /**
     * @var SignupService
     */
    private $signupService;

    public function __construct(SignupService $signupService)
    {
        $this->signupService = $signupService;
    }

    public function dashboard()
    {
        return view('provider.dashboard');
    }

    public function getSignup()
    {
        return view('provider.provider-signup');
    }

    public function signup(SignupRequest $request): RedirectResponse
    {
        try {
            DB::beginTransaction();
            $credentials = $request->only('username', 'email', 'password', 'phone', 'provider_type');
            $credentials['user_type'] = UserType::PROVIDER;
            $this->signupService->createUser($credentials);

            DB::commit();

            return redirect()->route('provider.get-signup')->with('success', 'Vui lòng kiểm tra email để kích hoạt tài khoản.');

        } catch (\Exception $exception) {
            DB::rollBack();
            return back()->with('error', 'Có lỗi xảy ra vui lòng  thử lại.');
        }
    }

    public function profile()
    {
        return view("provider.provider-profile");
    }

}
