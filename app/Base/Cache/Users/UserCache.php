<?php

namespace App\Base\Cache\Users;

use App\Base\Cache\BaseCache;
use App\Base\Interfaces\BaseCacheInterface;
use App\Models\User;

class UserCache extends BaseCache implements BaseCacheInterface
{
    public const TAG = 'UserCache';

    public const CACHE_USER_BY_ID = 'cache_user_by_id';
    public const CACHE_USER_BY_PHONE = 'cache_user_by_phone';

    public const CONFIG_KEYS = [
        self::CACHE_USER_BY_ID => [
            'life_time' => 24 * 3600, // 1 days
            'method' => 'getDataById',
        ],
        self::CACHE_USER_BY_PHONE => [
            'life_time' => 24 * 3600, // 1 days
            'method' => 'getDataByPhone',
        ]
    ];

    // ----------------- LIST METHOD GET DATA FOR CACHE -------

    public static function getDataByPhone($phone)
    {
        $data = User::query()->where('phone', $phone)->first();
        return $data ? $data->toArray() : null;
    }

    public static function getDataById($userId)
    {
        $data = User::query()->where('id', $userId)->first();
        return $data ? $data->toArray() : null;
    }

    // -------------- LIST METHOD SHORTEN -----------------
    public static function getUserById($userId)
    {
        return self::getData(self::CACHE_USER_BY_ID, $userId);
    }

    public static function getUserByPhone($userId)
    {
        return self::getData(self::CACHE_USER_BY_PHONE, $userId);
    }
}