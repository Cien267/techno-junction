<?php

namespace App\Traits;

trait AuthTrait
{
    private $authenticationFail = "authentication_failed";
    private $userInactive = "inactive_user";
    private $userNotPound = "user_not_found";
    private $defaultMess = "Có lỗi xảy ra vui lòng thử lại.";
    private $tokenNotMatch = "token_not_match";
    private $userIsChangedPw = "user_is_changed_pw";

    /**
     * @throws \Exception
     */
    private function checkAuth($user)
    {
        if (!$user->user_status) {
            throw new \Exception($this->userInactive);
        }
    }

    /**
     * @throws \Exception
     */
    private function checkUserByToken($user, $token = null)
    {
        if (!$user) {
            throw new \Exception($this->userNotPound);
        }
        if ($token === null) {
            return;
        }
        if ($token !== $user->token_reset_password) {
            throw new \Exception($this->tokenNotMatch);
        }
        if (!$user->token_reset_password) {
            throw new \Exception($this->userIsChangedPw);
        }
    }

    /**
     * @throws \Exception
     */
    private function checkUserActive($user, $token)
    {
        if (empty($user) ||
            (!$user->user_status && $user->token_active !== $token)) {
            throw new \Exception('Token không hợp lệ hoặc đã hết hạn.');
        }

        if ($user->user_status) {
            throw new \Exception('Tài khoản đã được kích hoạt.');
        }
    }

    private function userIsProvider($user)
    {
        if (empty($user)) {
            return false;
        }

        return $user->isProvider();
    }

    private function isCustomer($user)
    {
        if (empty($user)) {
            return false;
        }

        return $user->isUser();
    }

    private function mappingMessErr($mess): string
    {
        switch ($mess) {
            case $this->authenticationFail:
                return "Tài khoản hoặc mật khẩu không chính xác.";
            case $this->userInactive:
                return "Tài khoản chưa được kích hoạt";
            case $this->userNotPound:
                return "Tài khoản không tồn tại";
            case $this->tokenNotMatch:
                return "Link đã hết hạn hoặc không hợp lệ";
            case $this->userIsChangedPw:
                return "Tài khoản đã được đổi mật khẩu";
            default:
                return $this->defaultMess;
        }
    }
}
