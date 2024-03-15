<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Predis\Client as PredisClient;
use App\Base\ServiceFactory\LogServiceFactory;

class LogQueue extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:log-queue';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    private $queue;
    private $keyQueue;
    private $limit = 150;
    public function __construct()
    {
        $this->queue = new PredisClient(config('database.redis.redis_cache'), ['prefix' => env('REDIS_QUEUE_PREFIX' . ':', 'carpool_queue:')]);
        $this->keyQueue = 'queue-log';
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */

    public function handle()
    {
        $this->info('--START--');
        $countData = $this->queue->llen($this->keyQueue);
        if($countData > 0){
            $dataArr = [];
            for ($i = 0; $i < $countData; $i++) {
                $queue = json_decode($this->queue->rpop($this->keyQueue), true);
                if(!empty($queue)){
                    if(!empty($queue['type'])){
                        //Tìm vị trí lưu trong mảng - 1 mảng gồm nhiều nhất {$this->limit} phần tử
                        $findKeyArray = $this->findKeyArray($dataArr, $queue['type']);
                        $dataArr[$queue['type']][$findKeyArray][]= $queue;
                    }
                }
            }
            if(!empty($dataArr)){
                foreach($dataArr as $type => $data){
                    $service = LogServiceFactory::create($type);
                    if(!empty($data)){
                        foreach($data as $item){
                            $service->insertLog($item);
                            sleep(2);
                        }
                    }

                }
            }
        }
        $this->info('--END--');
    }

    private function findKeyArray($data, $type){
        if(empty($data[$type])) return 0;
        $keyFind = -1;
        foreach ($data[$type] as $key => $row){
            if(count($row) < $this->limit){
                $keyFind = $key; break;
            }elseif(count($row) == $this->limit){
                $keyFind = $key + 1;
            }
        }
        return ($keyFind == -1) ? 0 : $keyFind;
    }
}
