<?php

namespace App\Services\User;

use App\Base\Interfaces\BaseServiceInterface;
use App\Enums\UserType;
use App\Enums\ModelType;
use App\Enums\TransactionType;
use App\Services\BaseService;
use App\Enums\UserStatusType;
use App\Models\User;
use App\Models\Setting;

class UserService extends BaseService implements BaseServiceInterface
{

    public function __construct()
    {
//        $this->servicePath = '\App\Services\Trip';
//        $this->collection = new LogTrip();
    }

    public function changeTransaction($type, $userId, $value){
        $user = User::select('id', 'money', 'point', 'reputation')->where('id', $userId)->first();
        if($type == TransactionType::TYPE_MONEY){
            $user->money = $value;
        }else if($type == TransactionType::TYPE_POINT){
            $user->point = $value;
        }else if($type == TransactionType::TYPE_REPUTATION){
            $user->reputation = $value;
        }
        $user->save();
    }

    public function getCoordinates($regionId)
    {
       $region = Setting::where('model_id', $regionId)->where('model_type', ModelType::REGION)->first();
       if($region){
            $regionCoordinates = Setting::where('name', $region->name)->where('model_type', ModelType::COORDINATES_REGION)->first();
            if($regionCoordinates){
                $latLong = explode(',', $regionCoordinates->model_id);
                if(count($latLong) == 2){
                    return [
                        'lat_region' => $latLong[0],
                        'long_region' => $latLong[1],
                    ];
                }
            }
        }

        return [
            'lat_region' => null,
            'long_region' => null,
        ];
    }




}