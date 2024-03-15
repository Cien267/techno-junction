<?php

namespace App\Http\Controllers\Api;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class ApiController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function responseApi($code = 200, $msg = 'Thành công', $data = [], $httpStatusCode = ''){
        $httpStatusCode = !empty($httpStatusCode) ? $httpStatusCode :  $code;
        return response()->json([
                'code' => $code,
                'msg' => $msg,
                'data' => $data
            ], $httpStatusCode
        );
    }
}
