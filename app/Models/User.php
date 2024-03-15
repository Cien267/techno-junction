<?php

namespace App\Models;

use App\Enums\UserType;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * @property mixed $user_type
 */
class User extends Authenticatable
{
    use Notifiable;
    protected $table = 'users';

    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password', 'user_type', 'phone', "provider_type", 'user_status', 'token_active'
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isProvider(): bool
    {
        return $this->user_type == UserType::PROVIDER;
    }

    public function isUser(): bool
    {
        return $this->user_type == UserType::USER;
    }

}
