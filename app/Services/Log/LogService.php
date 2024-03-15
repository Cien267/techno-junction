<?php

namespace App\Services\Log;
use Carbon\Carbon;
use Predis\Client as PredisClient;

class LogService
{
    protected $queue;
    protected $keyQueue;
    protected $activeQueue;

    protected $type;
    protected $typeRequest;
    protected $parentCode;
    protected $code;

    public $logMongoCode;

    public function __construct()
    {
        $this->queue = new PredisClient(config('database.redis.redis_cache'), ['prefix' => env('REDIS_QUEUE_PREFIX' . ':', 'carpool_queue:')]);
        $this->keyQueue = 'queue-log';
        $this->logMongoCode = generate_random_string(5) . time() . generate_random_string(5);
    }

    public function setType($type)
    {
        $this->type = $type;
    }

    public function setTypeRequest($typeRequest)
    {
        $this->typeRequest = $typeRequest;
    }

    public function setParentCode($parentCode)
    {
        $this->parentCode = $parentCode;
    }

    public function setCode($code)
    {
        $this->code = $code;
    }

    public function pushLog($data)
    {
        if(!empty($this->type)){
            $datalog['code'] = $this->code;
            $datalog['type'] = $this->type;
            $datalog['type_request'] = $this->typeRequest;
            $datalog['data'] = $data;
            if (!empty($this->parentCode)) {
                $datalog['parent_code'] = $this->parentCode;
            }
            $datalog['created_at'] = Carbon::now()->format('Y-m-d H:i:s');
            return $this->queue->lpush($this->keyQueue, json_encode($datalog));
        }
    }
}
