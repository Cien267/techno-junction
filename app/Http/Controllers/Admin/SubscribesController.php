<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subscribe;
use Illuminate\Http\Request;

class SubscribesController extends Controller
{
    public function listSubscribe(Request $request)
    {
        $dataRequest = $request->all();
        $list = Subscribe::query();
        if(!empty($dataRequest['date_from'])){
            $dateFrom = $dataRequest['date_from'];
            $list = $list->where('created_at', '>=', $dateFrom);
        }
        if(!empty($dataRequest['date_to'])){
            $dateTo = $dataRequest['date_to'];
            $list = $list->where('created_at', '>=', $dateTo);
        }
        $listData = $list->orderBy('created_at', 'desc')->paginate(15);
        return view('admin.subscribes.list-subscribe', compact('listData'));
    }
}