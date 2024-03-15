<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Predis\Client as PredisClient;
use App\Base\ServiceFactory\LogServiceFactory;

class ScanCoordinate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:scan-coordinate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    public function handle()
    {
        $this->info('--START--');
        $data = $this->curlGoogleMap('Trường THPT AN PHÚ, Huyện An Phú, An Giang');
        if($data && $data->status == 'OK'){
            if(!empty($data->results) && !empty($data->results[0]->geometry->location->lat) && !empty($data->results[0]->geometry->location->lng)){
                $lat = $data->results[0]->geometry->location->lat;
                $lng = $data->results[0]->geometry->location->lng;
                dd($lat, $lng);
            }
        }
        $this->info('--END--');
    }

    public function curlGoogleMap($address){
        $address = str_replace([' ',','], ['+',''],strip_unicode($address));
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://maps.googleapis.com/maps/api/geocode/json?address='.$address.'&sensor=false&language=vi&region=vi&key=AIzaSyCgD6Qj8nkymi7P3grRKjGe9xhELa-pDxI',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        return json_decode($response);
    }


}
