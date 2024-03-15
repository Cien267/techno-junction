<?php
namespace App\Base\Interfaces;

interface BaseCacheInterface
{
    /**
     * @param $key
     * @return mixed
     */
    public static function getData($key);

    /**
     * Tao moi cache theo key
     * @param $key
     * @return mixed
     */
    public static function createData($key);

    /**
     * Remove cache by key
     * @param $key
     * @return mixed
     */
    public static function removeData($key) ;
}