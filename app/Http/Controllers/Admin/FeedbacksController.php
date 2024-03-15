<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Feedback;
use App\Http\Requests\Admin\CreateFeedbackRequest;

class FeedbacksController extends Controller
{
    public function listFeedback(Request $request, $id = null)
    {
        $data = Feedback::query()->where('id', $id)->first();
        $listData = Feedback::query()->get();
        return view('admin.feedbacks.list-feedback', compact('data', 'listData'));
    }

    public function saveFeedback(CreateFeedbackRequest $request){
        $dataRequest = $request->all();
        try {
            unset($dataRequest['_token']);
            if(!empty($dataRequest['id'])){
                $notice = Feedback::query()->where('id', $dataRequest['id'])->first();
                if($notice){
                    unset($dataRequest['id']);
                    Feedback::query()->where('id', $notice->id)->update($dataRequest);
                }else {
                    return back()->with('error', 'Không tìm thấy bản ghi');
                }
            }else {
                unset($dataRequest['id']);
                Feedback::create($dataRequest);
            }
            return redirect()->route('admin.feedback.list-feedback')->with('success', 'Lưu dữ liệu thành công.');
        }catch (Exception $e){
            $msgErr = $e->getMessage().'-'.$e->getFile().'-'.$e->getLine();
            return back()->with('error', 'Có lỗi xảy ra: '.$msgErr);
        }
    }

    public function deleteFeedback(Request $request, $id){
        try {
            if(!empty($id)){
                $feedback = Feedback::query()->where('id', $id)->first();
                if($feedback){
                    $feedback->delete();
                    return redirect()->route('admin.feedback.list-feedback')->with('success', 'Xóa dữ liệu thành công.');
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