<?php

namespace App\Mongo;
use Jenssegers\Mongodb\Eloquent\Model as Moloquent;

class LogUser extends Moloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'log_user';
    public $timestamps = false;

    protected $guarded = [];

    public function __construct($prefix = false)
    {
        if (!$prefix) {
            $this->collection = 'log_user';
        } else {
            $this->collection = $prefix . '_log_user';
        }
    }
}
