<?php

namespace App\Http\Controllers;

use App\Models\CatNotice;
use App\Models\Menu;
use App\Models\Notice;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class FrontEndController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct() {
        $list_menu___ = Menu::query()
            ->where('parent', Menu::MENU_PARENT)
            ->orderBy('sort', 'ASC')
            ->get()
            ->toArray();
        if(!empty($list_menu___)){
            foreach ($list_menu___ as $key => $menu){
                $menuChilds = Menu::query()
                    ->where('parent', $menu['id'])
                    ->orderBy('sort', 'ASC')
                    ->get()
                    ->toArray();
                $list_menu___[$key]['childs'] = $menuChilds;
            }
        }

        $list_category___ = CatNotice::query()
            ->where('parent', CatNotice::CATEGORY_PARENT)
            ->orderBy('id', 'DESC')
            ->get()
            ->toArray();
        if(!empty($list_category___)){
            foreach ($list_category___ as $key => $cat){
                $catChilds = CatNotice::query()
                    ->where('parent', $cat['id'])
                    ->orderBy('id', 'DESC')
                    ->get()
                    ->toArray();
                $list_category___[$key]['childs'] = $catChilds;
            }
        }

        $list_new_notice___ = Notice::query()
            ->where('status', Notice::ACTIVE)
            ->orderByDesc('created_at')
            ->limit(5)
            ->get();

        view()->share('list_menu___', $list_menu___);
        view()->share('list_category___', $list_category___);
        view()->share('list_new_notice___', $list_new_notice___);
    }
}
