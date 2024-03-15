<?php

namespace App\Mongo;
use Jenssegers\Mongodb\Eloquent\Model as Moloquent;

class LogTrip extends Moloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'log_trip';
    public $timestamps = false;

    protected $guarded = [];

    public function __construct($prefix = false)
    {
        if (!$prefix) {
            $this->collection = 'log_trip';
        } else {
            $this->collection = $prefix . '_log_trip';
        }
    }
}
