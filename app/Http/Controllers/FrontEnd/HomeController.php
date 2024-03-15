<?php

namespace App\Http\Controllers\FrontEnd;
use App\Core\Services\ResetPasswordService;
use App\Http\Controllers\FrontEndController;
use App\Models\Notice;
use App\Models\User;
use App\Traits\AuthTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends FrontEndController
{
    use AuthTrait;


    /**
     * @var ResetPasswordService
     */
    private $resetPasswordService;

    public function __construct(ResetPasswordService $resetPasswordService) {
        $this->resetPasswordService = $resetPasswordService;
        parent::__construct();
    }

    public function index(){
        return view('frontend.index');
    }

    /**
     * @throws \Exception
     */
    public function resetPassword(Request $request)
    {
        try {
            $dataReq = $request->only('_token', "email");
            $user = $this->resetPasswordService->getUserByEmail($dataReq["email"] ?? '');
            $this->checkUserByToken($user, ($dataReq["_token"] ?? ''));
            return view('frontend.reset-password', compact('dataReq'));

        }catch (\Exception $exception) {
            return redirect()->route('user.get-login')
                ->with('error', $this->mappingMessErr($exception->getMessage()));
        }
    }

    public function resetPasswordPost(Request $request): RedirectResponse
    {
        try {
            $dataReq = $request->only('token', "email", "password");
            $user = $this->resetPasswordService->getUserByEmail($dataReq["email"] ?? '');
            $this->checkUserByToken($user, ($dataReq["token"] ?? ''));
            $this->resetPasswordService->updateNewPassword($user->id, $dataReq['password']);

            return redirect()->route('user.get-login')->with('success', "Đổi mật khẩu thành công");

        }catch (\Exception $exception) {
            return back()->with('error', $this->mappingMessErr($exception->getMessage()));
        }
    }

    public function loginPost(Request $request): RedirectResponse
    {
        try {
            $data = $request->only('username', 'password');

            if (!auth()->guard('web')->attempt($data)) {
                throw new \Exception($this->authenticationFail);
            }

            $user = auth()->guard('web')->user();
            $this->checkAuth($user);

            if ($this->userIsProvider($user)) {
                return redirect()->route('provider.dashboard');
            }

            if ($this->isCustomer($user)) {
                return redirect()->route('customer.dashboard');
            }

            return redirect()->route('home.index');
        }catch (\Exception $exception) {
            $message = $exception->getMessage();

            if ($message == $this->userInactive) {
                auth()->guard('web')->logout();
            }

            return back()->with(['error' => $this->mappingMessErr($message)]);
        }
    }

    public function sendMailResetPassword(Request $request): RedirectResponse
    {
        try {
            DB::beginTransaction();
            $mail = $request->input("email");
            $user = $this->resetPasswordService->sendMailResetPw($mail);
            $this->checkUserByToken($user);
            DB::commit();
            return back()->with('success', "Vui lòng kiểm tra email để đặt lại mật khẩu.");
        }catch (\Exception $exception) {
            DB::rollBack();
            return back()->with('error', $this->mappingMessErr($exception->getMessage()));
        }
    }

    public function forgotPassword()
    {
        return view('frontend.password-recovery');
    }

    public function logout(): RedirectResponse
    {
        auth()->guard('web')->logout();
        return redirect()->route('home.index');
    }

    public function profile(): RedirectResponse
    {
        $user = auth()->guard('web')->user();

        if ($this->isCustomer($user)) {
            return redirect()->route('customer.profile');
        }

        if ($this->userIsProvider($user)) {
            return redirect()->route('provider.profile');
        }

        return redirect()->route('home.index');
    }

    public function activeAccount(Request $request): RedirectResponse
    {
        try {
            $token = $request->get('_token');
            list($token, $userId) = explode("_", $token);
            $user = User::query()->where('id', $userId)->first();
            $this->checkUserActive($user, $token);
            $user->user_status = User::STATUS_ACTIVE;
            $user->token_active = null;
            $user->save();

            return redirect()->route('user.get-login')->with('success', "Tài khoản của bạn đã đươc kích hoạt.");
        }catch (\Exception $exp) {
            return redirect()->route('user.get-login')->with('error', $exp->getMessage());
        }
    }


    public function category(Request $request, $slug){
//        $category = CatNotice::query()->where('slug', $slug)->first();
//        $notices = $category->notices()->paginate(5);
//        return view('frontend.category', compact('category', 'notices'));

        return view('frontend.category');
    }

    public function notice(Request $request, $slug){
//        $notice = Notice::query()->with('cat_notices')->where('slug', $slug)->first();
//        $categoryIds = $notice->cat_notices->pluck('id')->toArray();
//        $notice->update(['views' => ($notice->views + 1)]);
//        $listOtherNotice = Notice::query()
//            ->where('status', Notice::ACTIVE)
//            ->whereHas('cat_notices', function ($query) use ($categoryIds) {
//                $query->whereIn('cat_notice_id', $categoryIds);
//            })
//            ->where('id', '<>', $notice->id)
//            ->orderByDesc('created_at')
//            ->limit(6)
//            ->get();
//        return view('frontend.notice', compact('notice', 'listOtherNotice'));
        return view('frontend.notice');
    }

    public function newNotice(){
        $notices = Notice::query()
            ->where('status', Notice::ACTIVE)
            ->orderByDesc('created_at')
            ->paginate(5);
        return view('frontend.new-notice', compact('notices'));
    }

    public function news(Request $request, $slug){
//        $notice = NoticeStatic::query()->where('slug', $slug)->first();
//        return view('frontend.news', compact('notice'));
        return view('frontend.news');
    }

    public function search(Request $request){
        $requestData = $request->all();
        $key = !empty($requestData['key']) ? $requestData['key'] : '';
        $list = Notice::query()
            ->where('status', Notice::ACTIVE);
        if(!empty($key)){
            $list = $list->where('title', 'like', '%'.$key.'%');
        }
        $notices = $list->orderByDesc('created_at')->paginate(5);
        return view('frontend.search', compact('notices', 'key'));
    }

    public function tags(){

        return view('errors.404');
    }

    public function signup(){

        return view('frontend.signup');
    }

    public function login(){

        auth()->guard('web')->logout();
        auth()->guard('admin')->logout();

        return view('frontend.login');
    }

    public function detailProvider(){

        return view('frontend.detail-provider');
    }

    public function providers(){

        return view('frontend.provider');
    }

    public function detailPhotographer(){

        return view('frontend.detail-photographer');
    }

    public function photographers(){

        return view('frontend.photographer');
    }

    public function booking(){

        return view('frontend.booking');
    }

    public function bookingPayment(){

        return view('frontend.booking-payment');
    }

    public function bookingDone(){

        return view('frontend.booking-done');
    }
}
