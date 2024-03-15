<?php

use Illuminate\Support\Str;
use App\Models\Album;
use App\Models\CatNotice;
use App\Models\Notice;
use App\Models\Menu;

if (! function_exists('getAlbumById')) {
    function getAlbumById($id){
        return Album::query()
            ->with('images')
            ->where('id', $id)
            ->first();
    }
}

if (! function_exists('getListNoticeHot')) {
    function getListNoticeHot(){
        return Notice::query()
            ->where('is_hot', Notice::IS_HOT)
            ->where('status', Notice::ACTIVE)
            ->limit(6)
            ->get();
    }
}

if (! function_exists('getNoticeByCategoryId')) {
    function getNoticeByCategoryId($id){
        return CatNotice::query()
            ->with(['notices' => function ($query) {
            $query->limit(5);
        }])->where('id', $id)->first();
    }
}

if (! function_exists('getCategoryById')) {
    function getCategoryById($id){
        return CatNotice::query()->where('id', $id)->first();
    }
}

if (! function_exists('getCatNoticeByParent')) {
    function getCatNoticeByParent($parentId){
        return CatNotice::query()
            ->where('parent', $parentId)
            ->orderBy('created_at', 'desc')
            ->get();
    }
}

if (! function_exists('listCatNoticeParent')) {
    function listCatNoticeParent(){
        return CatNotice::query()
            ->where('parent', 0)
            ->orderBy('created_at', 'desc')
            ->get();
    }
}

if (! function_exists('listCatNotice')) {
    function listCatNotice(){
        return CatNotice::query()
            ->orderBy('created_at', 'desc')
            ->get();
    }
}
if (! function_exists('getMenuByParent')) {
    function getMenuByParent($parentId){
        return Menu::query()
            ->where('parent', $parentId)
            ->orderBy('sort', 'asc')
            ->get();
    }
}

if (! function_exists('listMenuParent')) {
    function listMenuParent(){
        return Menu::query()
            ->where('parent', 0)
            ->orderBy('sort', 'asc')
            ->get();
    }
}
if (! function_exists('str_slug')) {
    /**
     * Generate a URL friendly "slug" from a given string.
     *
     * @param  string  $title
     * @param  string  $separator
     * @param  string  $language
     * @return string
     */
    function str_slug($title, $separator = '-', $language = 'en')
    {
        return Str::slug($title, $separator, $language);
    }
}

if (! function_exists('generate_random_string')) {
    /**
     * @param  integer  $length
     * @return string
     */
    function generate_random_string($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}

if (! function_exists('strip_unicode')) {
    function strip_unicode($str){
        if (!$str) return false;
        $unicode = array(
            'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ|Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
            'd'=>'đ|Đ',
            'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ|É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
            'i'=>'í|ì|ỉ|ĩ|ị|Í|Ì|Ỉ|Ĩ|Ị',
            'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ|Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
            'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự|Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
            'y'=>'ý|ỳ|ỷ|ỹ|ỵ|Ý|Ỳ|Ỷ|Ỹ|Ỵ'
        );
        foreach($unicode as $nonUnicode=>$uni){
            $str = preg_replace("/($uni)/i",$nonUnicode,$str);
            return $str;
        }
    }
}

if (! function_exists('showUploadFile')) {
    function showUploadFile($elementName, $inputName, $value){
        $idElement = "'".$elementName."'";
        $onClick = 'onclick="selectFileWithCKFinder('.$idElement.')"';
        $imageUrl = !empty($value) ? $value : '/images/upload.png';
       return "<div class='input-upload' id='".$elementName."' ".$onClick.">
                <label for='file'>
                    <span class='file-button'>
                        <img src='".$imageUrl."' alt='upload image' id='".$elementName."_replace' width='100%'>
                    </span>
                    <span class='hover-bg'>
                        <img src='/images/upload-white.png' alt='upload image'>
                    </span>
                    <input type='hidden' value='".$value."' name='".$inputName."' id='".$elementName."_url'>
                </label>
            </div>";
    }
}

if (! function_exists('showEditor')) {
    function showEditor($elementName, $inputName, $value){
        $idElement = "'".$elementName."'";
        $script = '<script> CKEDITOR.replace('.$idElement.') </script>';
        return "<textarea id='".$elementName."' class='form-control' style='height: 600px' name='".$inputName."' >".$value."</textarea>".$script;
    }
}
?>
