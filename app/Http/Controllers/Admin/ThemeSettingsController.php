<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subscribe;
use Illuminate\Http\Request;

class ThemeSettingsController extends Controller
{
    public function listThemeSetting(Request $request)
    {
        $dataRequest = $request->all();
        return view('admin.themeSetting.list-subscribe', compact('listData'));
    }
}