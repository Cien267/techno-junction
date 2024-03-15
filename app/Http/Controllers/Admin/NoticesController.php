<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\CatNoticeRequest;
use App\Http\Requests\Admin\CreateNoticeRequest;
use App\Http\Requests\Admin\CreateNoticeStaticRequest;
use App\Models\Notice;
use App\Models\CatNotice;
use App\Models\CatNoticeNotice;
use App\Models\NoticeStatic;


class NoticesController extends Controller
{
    public function listNotice(Request $request){
        $titleLayout = "Danh sách bài viết";
        $requestData = $request->all();
        $list = Notice::query();
        if(!empty($requestData['title'])){
            $list = $list->where('title', 'LIKE', '%'.$requestData['title'].'%');
        }

        if(!empty($requestData['cat_notice_id'])){
            $catNoticeId = $requestData['cat_notice_id'];
            $list = $list->whereHas('cat_notices', function($q) use($catNoticeId) {
                $q->where('cat_notices.id', $catNoticeId);
            });
        }
        if(!empty($requestData['status'])){
            $list = $list->where('status', $requestData['status']);
        }
        if(!empty($requestData['is_hot'])){
            $list = $list->where('is_hot', $requestData['is_hot']);
        }
        $listData = $list->orderBy('created_at', 'desc')->paginate(15)->appends(request()->all());
        return view('admin.notice.list-notice', compact('listData', 'titleLayout'));
    }

    public function addNotice(Request $request, $idNotice = null){
        $titleLayout = "Thêm/sửa bài viết";
        $data = Notice::query()->where('id', $idNotice)->first();
        return view('admin.notice.add-notice', compact('data', 'titleLayout'));
    }

    public function saveNotice(CreateNoticeRequest $request){
        $dataRequest = $request->all();
        $catNoticeIds = $dataRequest['cat_notice_id'] ?? [];
        $tags = $dataRequest['tags'] ?? '';
        $tagImplode = [];
        $tagsData = '';
        if(!empty($tags)){
            $tagExp = explode(',', str_replace(['[',']'], ['',''], $tags));
            if(!empty($tagExp)){
                foreach ($tagExp as $ex){
                    $tagImplode []= '['.$ex.']';
                }
                $tagsData = implode(',', $tagImplode);
            }
        }
        $dataRequest['tags'] = $tagsData;
        $dataRequest['slug'] = str_slug($dataRequest['title']);
        unset($dataRequest['cat_notice_id']);
        try {
            unset($dataRequest['_token']);
            if(!empty($dataRequest['id'])){
                $notice = Notice::query()->where('id', $dataRequest['id'])->first();
                if($notice){
                    unset($dataRequest['id']);
                    Notice::query()->where('id', $notice->id)->update($dataRequest);
                }else {
                    return back()->with('error', 'Không tìm thấy bản ghi');
                }
            }else {
                unset($dataRequest['id']);
                $notice = Notice::create($dataRequest);
            }
            CatNoticeNotice::query()->where('notice_id', $notice->id)->delete();
            if(!empty($catNoticeIds)){
                foreach ($catNoticeIds as $catNoticeId){
                    CatNoticeNotice::create([
                        'cat_notice_id' => $catNoticeId,
                        'notice_id' => $notice->id,
                    ]);
                }
            }
            return redirect()->route('admin.notice.list-notice')->with('success', 'Lưu dữ liệu thành công.');
        }catch (Exception $e){
            $msgErr = $e->getMessage().'-'.$e->getFile().'-'.$e->getLine();
            return back()->with('error', 'Có lỗi xảy ra: '.$msgErr);
        }
    }

    public function deleteNotice(Request $request, $id){
        try {
            if(!empty($id)){
                $notice = Notice::query()->where('id', $id)->first();
                if($notice){
                    $notice->delete();
                    return redirect()->route('admin.notice.list-notice')->with('success', 'Xóa dữ liệu thành công.');
                }else {
                    return back()->with('error', 'Không tìm thấy bản ghi');
                }
            }
        }catch (Exception $e){
            $msgErr = $e->getMessage().'-'.$e->getFile().'-'.$e->getLine();
            return back()->with('error', 'Có lỗi xảy ra: '.$msgErr);
        }
    }

    public function listCatNotice(Request $request, $id = null){
        $titleLayout = "Chuyên mục tin tức";
        $data = CatNotice::query()->where('id', $id)->first();
        return view('admin.notice.list-cat-notice', compact('data', 'titleLayout'));
    }

    public function addCatNotice(CatNoticeRequest $request){
        try {
            $dataRequest = $request->all();
            unset($dataRequest['_token']);
            $dataRequest['slug'] = str_slug($dataRequest['name']);
            if(!empty($dataRequest['id'])){
                $catNotice = CatNotice::query()->where('id', $dataRequest['id'])->first();
                if($catNotice){
                    unset($dataRequest['id']);
                    CatNotice::where('id', $catNotice->id)->update($dataRequest);
                }else {
                    return back()->with('error', 'Không tìm thấy bản ghi');
                }
            }else {
                unset($dataRequest['id']);
                CatNotice::create($dataRequest);
            }
            return redirect()->route('admin.notice.list-cat-notice')->with('success', 'Lưu dữ liệu thành công.');
        }catch (Exception $e){
            $msgErr = $e->getMessage().'-'.$e->getFile().'-'.$e->getLine();
            return back()->with('error', 'Có lỗi xảy ra: '.$msgErr);
        }
    }

    public function deleteCatNotice($id){
        try {
            if(!empty($id)){
                $catNotice = CatNotice::query()->where('id', $id)->first();
                if($catNotice){
                    if ($catNotice->parent == 0){
                        CatNotice::query()->where('parent', $id)->delete();
                    }
                    $catNotice->delete();
                    return redirect()->route('admin.notice.list-cat-notice')->with('success', 'Xóa dữ liệu thành công.');
                }else {
                    return back()->with('error', 'Không tìm thấy bản ghi');
                }
            }
        }catch (Exception $e){
            $msgErr = $e->getMessage().'-'.$e->getFile().'-'.$e->getLine();
            return back()->with('error', 'Có lỗi xảy ra: '.$msgErr);
        }
    }

    public function listNews(Request $request){
        $titleLayout = "Danh sách bài viết tĩnh";
        $requestData = $request->all();
        $list = NoticeStatic::query();
        if(!empty($requestData['title'])){
            $list = $list->where('title', 'LIKE', '%'.$requestData['title'].'%');
        }
        $listData = $list->orderBy('created_at', 'desc')->paginate(15)->appends(request()->all());
        return view('admin.notice.list-news', compact('listData', 'titleLayout'));
    }

    public function addNews(Request $request, $idNotice = null){
        $titleLayout = "Thêm/sửa tin tức";
        $data = NoticeStatic::query()->where('id', $idNotice)->first();
        return view('admin.notice.add-news', compact('data', 'titleLayout'));
    }

    public function saveNews(CreateNoticeStaticRequest $request){
        $dataRequest = $request->all();
        try {
            unset($dataRequest['_token']);
            $dataRequest['slug'] = str_slug($dataRequest['title']);
            if(!empty($dataRequest['id'])){
                $notice = NoticeStatic::query()->where('id', $dataRequest['id'])->first();
                if($notice){
                    unset($dataRequest['id']);
                    NoticeStatic::query()->where('id', $notice->id)->update($dataRequest);
                }else {
                    return back()->with('error', 'Không tìm thấy bản ghi');
                }
            }else {
                unset($dataRequest['id']);
                NoticeStatic::create($dataRequest);
            }
            return redirect()->route('admin.notice.list-news')->with('success', 'Lưu dữ liệu thành công.');
        }catch (Exception $e){
            $msgErr = $e->getMessage().'-'.$e->getFile().'-'.$e->getLine();
            return back()->with('error', 'Có lỗi xảy ra: '.$msgErr);
        }
    }

    public function deleteNews(Request $request, $id){
        try {
            if(!empty($id)){
                $notice = NoticeStatic::query()->where('id', $id)->first();
                if($notice){
                    $notice->delete();
                    return redirect()->route('admin.notice.list-news')->with('success', 'Xóa dữ liệu thành công.');
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
