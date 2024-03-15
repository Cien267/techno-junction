<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ImageAlbum;
use Illuminate\Http\Request;
use App\Models\Album;
use App\Http\Requests\Admin\CreateAlbumRequest;
use App\Http\Requests\Admin\CreateImageAlbumRequest;

class AlbumsController extends Controller
{
    public function listAlbum(Request $request, $id = null)
    {
        $titleLayout = "Quản lý Album";
        $listData = Album::query()->paginate(15)->appends(request()->all());
        $data = Album::query()->where('id', $id)->first();
        return view('admin.album.list-album', compact('listData', 'titleLayout', 'data'));
    }

    public function saveAlbum(CreateAlbumRequest $request)
    {
        $dataRequest = $request->all();
        $dataRequest['slug'] = str_slug($dataRequest['name']);
        try {
            unset($dataRequest['_token']);
            if(!empty($dataRequest['id'])){
                $notice = Album::query()->where('id', $dataRequest['id'])->first();
                if($notice){
                    unset($dataRequest['id']);
                    Album::query()->where('id', $notice->id)->update($dataRequest);
                }else {
                    return back()->with('error', 'Không tìm thấy bản ghi');
                }
            }else {
                unset($dataRequest['id']);
                Album::create($dataRequest);
            }
            return redirect()->route('admin.album.list-album')->with('success', 'Lưu dữ liệu thành công.');
        }catch (Exception $e){
            $msgErr = $e->getMessage().'-'.$e->getFile().'-'.$e->getLine();
            return back()->with('error', 'Có lỗi xảy ra: '.$msgErr);
        }
    }

    public function deleteAlbum(Request $request, $id)
    {
        try {
            if(!empty($id)){
                $notice = Album::query()->where('id', $id)->first();
                if($notice){
                    $notice->delete();
                    return redirect()->route('admin.album.list-album')->with('success', 'Xóa dữ liệu thành công.');
                }else {
                    return back()->with('error', 'Không tìm thấy bản ghi');
                }
            }
        }catch (Exception $e){
            $msgErr = $e->getMessage().'-'.$e->getFile().'-'.$e->getLine();
            return back()->with('error', 'Có lỗi xảy ra: '.$msgErr);
        }
    }

    public function listImage(Request $request, $albumId, $id = null)
    {

        $titleLayout = "Quản lý Ảnh Album";
        $album = Album::query()->where('id', $albumId)->first();
        $data = ImageAlbum::query()->where('id', $id)->first();
        $listData = ImageAlbum::query()->where('album_id', $albumId)->get();
        return view('admin.album.list-image', compact('listData', 'titleLayout', 'album', 'listData', 'data'));
    }

    public function saveImage(CreateImageAlbumRequest $request)
    {
        $dataRequest = $request->all();
        try {
            unset($dataRequest['_token']);
            if (!empty($dataRequest['id'])) {
                $imageAlbum = ImageAlbum::query()->where('id', $dataRequest['id'])->first();
                if ($imageAlbum) {
                    unset($dataRequest['id']);
                    ImageAlbum::query()->where('id', $imageAlbum->id)->update($dataRequest);
                } else {
                    return back()->with('error', 'Không tìm thấy bản ghi');
                }
            } else {
                unset($dataRequest['id']);
                ImageAlbum::create($dataRequest);
            }
            return redirect()->route('admin.album.list-image', $dataRequest['album_id'])->with('success', 'Lưu dữ liệu thành công.');
        }catch (Exception $e){
            $msgErr = $e->getMessage().'-'.$e->getFile().'-'.$e->getLine();
            return back()->with('error', 'Có lỗi xảy ra: '.$msgErr);
        }
    }

    public function deleteImage(Request $request, $id)
    {
        try {
            if(!empty($id)){
                $imageAlbum = ImageAlbum::query()->where('id', $id)->first();
                if($imageAlbum){
                    $imageAlbum->delete();
                    return redirect()->route('admin.album.list-image',$imageAlbum->album_id)->with('success', 'Xóa dữ liệu thành công.');
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