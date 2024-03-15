<?php
namespace App\Base\ServiceFactory;

use App\Enums\LogType;
use App\Services\Trip\TripService;

class LogServiceFactory
{
    public static function create($type)
    {
        switch ($type) {
            case LogType::TYPE_CREATE_TRIP;
                return new TripService();
            default:
                return new TripService();
        }
    }
}
