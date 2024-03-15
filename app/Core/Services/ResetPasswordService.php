<?php

namespace App\Core\Services;

use App\Models\User;
use App\Services\Mail\MailService;
use Illuminate\Support\Str;

class ResetPasswordService
{
    /**
     * @var MailService
     */
    private $mailService;

    public function __construct(MailService $mailService)
    {
        $this->mailService = $mailService;
    }

    public function getUserByEmail($mail)
    {
        return User::query()->where('email', $mail)->first();
    }

    public function sendMailResetPw($mail)
    {
        $user = User::query()->where('email', $mail)->first();
        if (!$user) return null;
        $token = Str::random(16);
        $user->token_reset_password = $token;
        $user->save();
        $this->mailService->resetPwWithEmail($token, $mail);
        return $user;
    }

    public function updateNewPassword($userId, $newPw)
    {
        $newPw = bcrypt($newPw);
        User::query()->where('id', $userId)
            ->update([
                'password' => $newPw,
                'token_reset_password' => null,
            ]);
    }
}
