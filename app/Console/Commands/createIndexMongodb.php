<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Mongo\LogTrip;

class createIndexMongodb extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:create-index-mongo-db {type}';

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
    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $this->info('--START--');
        try {
            $argument = $this->validateInput();
            if($argument['type'] == 'log_trip'){
                $logTrip = new LogTrip();
                $logTrip->raw(function($collection) {
                    $collection->createIndex(['code' => 1]);
                    $collection->createIndex(['parent_code' => 1]);
                    $collection->createIndex(['trip_id' => 1]);
                    $collection->createIndex(['status' => 1]);
                    $collection->createIndex(['show_tracking' => 1]);
                    $collection->createIndex(['created_at' => 1]);
                    return $collection;
                });
            };
        }catch (\Exception $ex) {
            echo $ex->getMessage().'-'.$ex->getFile().'-'.$ex->getLine();
        }
        $this->info('--END--');
    }

    private function validateInput(){
        $type = $this->argument('type');
        if (!$type) {
            exit('Thiếu parram {type}');
        }
        if(!in_array($type, ['log_trip'])){
            exit('{type} không tồn tại');
        }
        return $this->arguments();
    }
}
