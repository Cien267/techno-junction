<?php

namespace App\Core\Services;

use App\Models\User;
use App\Services\Mail\MailService;
use Illuminate\Support\Str;

class SignupService
{
    /**
     * @var MailService
     */
    private $mailService;

    public function __construct(MailService $mailService)
    {
        $this->mailService = $mailService;
    }

    public function createUser($credentials)
    {
        $token = Str::random(32);
        $credentials['user_status'] = User::STATUS_INACTIVE;
        $credentials['token_active'] = $token;
        $credentials['password'] = bcrypt($credentials['password']);
        $user = User::query()->create($credentials);

        $token = "{$token}_{$user->id}";
        // verify  by email
        $this->mailService->signupWithEmail($token, $credentials['email']);
    }
}
