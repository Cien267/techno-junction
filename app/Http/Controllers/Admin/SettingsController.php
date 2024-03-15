<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Dropbox\Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Setting;
use App\Models\Menu;
use App\Http\Requests\Admin\SettingInfoRequest;
use App\Http\Requests\Admin\MenuRequest;


class SettingsController extends Controller
{
    public function settingInfo()
    {
        $titleLayout = "Cài đặt chung";
        $data = Setting::first();
        return view('admin.settings.setting-info', compact('data', 'titleLayout'));
    }

    public function saveSettingInfo(SettingInfoRequest $request){
        try {
            $dataRequest = $request->all();
            unset($dataRequest['_token']);
            $setting = Setting::first();
            if($setting){
                Setting::where('id', $setting->id)->update($dataRequest);
            }else {
                Setting::create($dataRequest);
            }
            return redirect()->route('admin.setting.setting-info')->with('success', 'Lưu dữ liệu thành công.');
        }catch (Exception $e){
            $msgErr = $e->getMessage().'-'.$e->getFile().'-'.$e->getLine();
            return back()->with('error', 'Có lỗi xảy ra: '.$msgErr);
        }
    }

    public function listMenu(Request $request, $id = null){
        $titleLayout = "Quản lý menu";
        $data = Menu::query()->where('id', $id)->orderBy('sort', 'ASC')->first();
        return view('admin.settings.list-menu', compact('data', 'titleLayout'));
    }

    public function saveListMenu(MenuRequest $request){
        try {
            $dataRequest = $request->all();
            unset($dataRequest['_token']);
            if(!empty($dataRequest['id'])){
                $menu = Menu::query()->where('id', $dataRequest['id'])->first();
                if($menu){
                    unset($dataRequest['id']);
                    Menu::where('id', $menu->id)->update($dataRequest);
                }else {
                    return back()->with('error', 'Không tìm thấy bản ghi');
                }
            }else {
                unset($dataRequest['id']);
                Menu::create($dataRequest);
            }
            return redirect()->route('admin.setting.list-menu')->with('success', 'Lưu dữ liệu thành công.');
        }catch (Exception $e){
            $msgErr = $e->getMessage().'-'.$e->getFile().'-'.$e->getLine();
            return back()->with('error', 'Có lỗi xảy ra: '.$msgErr);
        }
    }

    public function deleteMenu(Request $request, $id = null){
        try {
            if(!empty($id)){
                $menu = Menu::query()->where('id', $id)->first();
                if($menu){
                    if ($menu->parent == 0){
                        Menu::query()->where('parent', $id)->delete();
                    }
                    $menu->delete();
                    return redirect()->route('admin.setting.list-menu')->with('success', 'Xóa dữ liệu thành công.');
                }else {
                    return back()->with('error', 'Không tìm thấy bản ghi');
                }
            }
        }catch (Exception $e){
            $msgErr = $e->getMessage().'-'.$e->getFile().'-'.$e->getLine();
            return back()->with('error', 'Có lỗi xảy ra: '.$msgErr);
        }
    }
}
