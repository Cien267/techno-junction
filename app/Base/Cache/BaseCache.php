<?php

namespace App\Base\Cache;

use App\Base\Interfaces\BaseCacheInterface;
use Cache;
use Log;

class BaseCache implements BaseCacheInterface
{
    /**
     * mapping key -> Data
     * [
     * 'Key' =>
     *     [
     *      'life_time' => '10', // expire after 10s
     *      'method' => 'getCacheData', // static method call get data for cache
     *      'args' => [], // arguments for method get data
     *     ]
     * ]
     */
    public const CONFIG_KEYS = [];

    // Cache Tag
    public const TAG = 'BaseCache';

    public function __construct()
    {

    }

    /**
     * create cache by key
     * @param $keyCache
     * @param mixed $args
     * @return array
     * @throws \Exception
     */
    public static function createData($keyCache, ...$args)
    {
        // Get config for keyCache
        $keyConfig = static::CONFIG_KEYS[$keyCache] ?? [];
        $methodGetData = $keyConfig['method'] ?? null;
        $expireTime = $keyConfig['life_time'] ?? 3600 * 24 * 365; // default expire after 365 days

        // validate data config
        if (!$methodGetData || !method_exists(static::class, $methodGetData)) {
            throw new \Exception("Static method $methodGetData not found");
        }
        // call method, get data for cache
        $dataCache = forward_static_call('static::' . $methodGetData, ...$args);

        try {
            // remove cache and create new
            $keyCacheSub = self::convertKeyWithArgs($keyCache, ...$args);
            static::removeData($keyCacheSub);
            if(!empty($dataCache)){
                static::store($keyCacheSub, $dataCache, $expireTime);
            }
        } catch (\Exception $exception) {
            @Log::error('BaseCache::createData: ' . $exception->getMessage());
        }
        return $dataCache;
    }

    /**
     * get cache by key
     * @param $keyCache
     * @param array $args
     * @return array|mixed
     * @throws \Exception
     */
    public static function getData($keyCache, ...$args)
    {
        $keyCacheSub = self::convertKeyWithArgs($keyCache, ...$args);
        $dataCache = Cache::store('redis_cache')->tags(static::TAG)->get($keyCacheSub);
        if (!$dataCache) {
            // create new cache
            $dataCache = static::createData($keyCache, ...$args);
        }
        return $dataCache;
    }

    /**
     * remove cache by key
     * @param $keyCache
     * @param mixed $args
     */
    public static function removeData($keyCache, ...$args)
    {
        $keyCacheSub = self::convertKeyWithArgs($keyCache, ...$args);
        Cache::store('redis_cache')->tags(static::TAG)->forget($keyCacheSub);
    }

    /**
     * Forget multi key cache by tag
     */
    public static function flushData()
    {
        Cache::store('redis_cache')->tags(static::TAG)->flush();
    }

    /**
     * Store cache redis
     * @param $key 'key cache'
     * @param $data 'data cache'
     * @param $expireTime 'time expire second'
     */
    public static function store($key, $data, $expireTime)
    {
        Cache::store('redis_cache')->tags(static::TAG)->put($key, $data, now()->addSeconds($expireTime));
    }

    /**
     * process key if has arguments, ex: cache_shop_{code} -> ('cache_shop', $code)
     * @param $key
     * @param mixed $args
     * @return string
     */
    public static function convertKeyWithArgs($key, ...$args)
    {
        foreach ($args as $arg) {
            if (is_string($arg) || is_numeric($arg)) {
                $key .= "_$arg";
            } elseif (is_array($arg)) {
                foreach ($arg as $k => $v) {
                    $append = (is_string($v) || is_numeric($v)) ? "_$k" . "_$v" : '';
                    $key .= $append;
                }
            }

        }
        return $key;
    }
}
