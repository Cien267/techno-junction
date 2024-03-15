<?php


namespace App\Components;
use Cache;

class CacheLog
{
    const TIME = 30;
    const CONFIGLOG ='redis_cache';

    /**
     * @param $tableName
     * @param $val
     * @return bool
     */
    public static function setToTable($tableName, $val)
    {
        //kiem tra xem bang nay da khoi tao bao gio chua
        $next_key = 0;
        $current_key = Cache::store(@self::CONFIGLOG)->get('current_key_' . $tableName);

        if (!$current_key || $current_key == NULL || empty($current_key)) {
            $current_key = 0;
        }

        $next_key = $current_key + 1;
        $mc = Cache::store(@self::CONFIGLOG)->set($tableName . $next_key, $val, self::TIME);
        Cache::store(@self::CONFIGLOG)->set('current_key_' . $tableName, $next_key, self::TIME);
        return TRUE;
    }

    /**
     * @param $tableName
     * @return array|bool
     */
    public static function getTable($tableName)
    {
        //kiem tra xem bang nay da khoi tao bao gio chua
        $current_key = Cache::store(@self::CONFIGLOG)->get('current_key_' . $tableName);
        $val_list = array();
        $val_list[] = 'Begin';

        if (!$current_key || $current_key == NULL || empty($current_key)) {
            return FALSE;
        }

        for ($i = 1; $i <= $current_key; $i++) {
            $val_list[] = Cache::store(@self::CONFIGLOG)->get($tableName . $i);
        }
        return $val_list;
    }

    /**
     * @param $tableName
     * @return array|bool
     */
    public static function delTable($tableName)
    {
        //kiem tra xem bang nay da khoi tao bao gio chua
        $current_key = Cache::store(@self::CONFIGLOG)->get('current_key_' . $tableName);
        $val_list = array();
        $val_list[] = 'Begin';

        if (!$current_key || $current_key == NULL || empty($current_key)) {
            return FALSE;
        }

        for ($i = 1; $i <= $current_key; $i++) {
            $val_list[] = Cache::store(@self::CONFIGLOG)->delete($tableName . $i);
        }
        Cache::store(@self::CONFIGLOG)->delete('current_key_' . $tableName);
        return $val_list;
    }
}
