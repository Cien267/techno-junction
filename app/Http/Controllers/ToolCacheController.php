<?php

namespace App\Http\Controllers;
use App\Components\CacheLog;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ToolCacheController extends Controller
{

    public function __construct() {

    }

    public function getCache($getTable){
        $response = CacheLog::getTable($getTable);
        return response()->json($response);
    }

    public function delCache($getTable){
        CacheLog::delTable($getTable);
    }

    public function getCacheByTag(Request $request)
    {
        $tag = $request->input('tag');
        $keyCache = $request->input('keyCache');

        $listTag = [
            '' => '',
        ];

        if (!empty($tag)) {
            $dataCache = Cache::tags($tag)->get($keyCache);
        } else {
            $dataCache = Cache::get($keyCache);
        }
        $data = [
            'dataCache' => $dataCache,
            'listTag' => $listTag
        ];
        return view('adminlte.setting.getCacheByTag', $data);
    }
}


