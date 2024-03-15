@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-12">
        <form action="" method="GET">
            <div class="col-md-3 float-left" style="padding-left: 0px !important;">
                <div class="form-group">
                    <input name="title" class="form-control" value="{{ request()->get('title') ?? '' }}" placeholder="Tiêu đề bài viêt" type="text">
                </div>
            </div>
            <div class="col-md-3 float-left" style="padding-left: 0px !important;">
                <div class="form-group">
                    <select name="cat_notice_id" class="form-control">
                        <option value="">Chọn chuyên mục</option>
                        <?php
                        $listCatNotice = listCatNotice();
                        foreach ($listCatNotice as $catNotice){
                            $selected = (request()->get('cat_notice_id') == $catNotice->id) ? 'selected' : '';
                            echo '<option value="'.$catNotice->id.'" '.$selected.'>'.$catNotice->name.'</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="col-md-3 float-left" style="padding-left: 0px !important;">
                <div class="form-group">
                    <select name="status" class="form-control">
                        <option value="">Trạng thái</option>
                        <option value="1" {{ request()->get('status') == 1 ? 'selected' : '' }}>Yes</option>
                        <option value="2" {{ request()->get('status') == 2 ? 'selected' : '' }}>No</option>
                    </select>
                </div>
            </div>
            <div class="col-md-3 float-left" style="padding-left: 0px !important;">
                <div class="form-group">
                    <select name="status" class="form-control">
                        <option value="">Bài viết nổi bật</option>
                        <option value="0" {{ request()->get('is_hot') == '0' ? 'selected' : '' }}>No</option>
                        <option value="1" {{ request()->get('is_hot') == 1 ? 'selected' : '' }}>Yes</option>
                    </select>
                </div>
            </div>
            <div class="col-md-3 float-left" style="padding-left: 0px !important;">
                <div class="form-group">
                    <button class="btn btn-primary">Tìm kiếm</button>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <a href="{{ route('admin.notice.add-notice') }}" class="btn btn-primary px-4 mt-0 mb-3" ><i class="mdi mdi-plus-circle-outline mr-2"></i>Thêm mới</a>
                <div class="table-responsive">
                    <table class="table">
                        <thead class="thead-light">
                        <tr>
                            <th>STT</th>
                            <th>Ngày đăng</th>
                            <th>Tiêu đề bài viết</th>
                            <th>Chuyên mục</th>
                            <th>Ảnh</th>
                            <th>Trạng thái</th>
                            <th>Nổi bật</th>
                            <th>Lựa chọn</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if(!empty($listData)){
                            foreach ($listData as $key => $data){
                                ?>
                                <tr>
                                    <td>{{ ($key + 1) }}</td>
                                    <td>{{ $data->created_at ? date('d/m/Y H:i', strtotime($data->created_at)) : '' }}</td>
                                    <td><a href="/notice/{{ $data->slug }}" target="_blank" >{{ $data->title }}</a></td>
                                    <td>
                                        <?php if(!empty($data->cat_notices)) {
                                            foreach ($data->cat_notices as $catNotice){
                                                echo '+ '.$catNotice->name.'</br>';
                                            }
                                        }?>
                                    </td>
                                    <td>
                                        <img class="img-thumbnail" src="{{ !empty($data->image) ? $data->image : '/admin/images/no-images.png' }}" style="width: 60px;">
                                    </td>
                                    <td>
                                        {!! $data->status == 1 ? "<p style='color:green;font-weight: bold;'>Kích hoạt</p>" : "<p style='color:red;font-weight: bold;'>Khóa</p>" !!}
                                    </td>
                                    <td>
                                        {!! $data->is_hot == 1 ? "<p style='color:green;font-weight: bold;'>Yes</p>" : "<p style='color:red;font-weight: bold;'>No</p>" !!}
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.notice.add-notice', $data->id) }}"  class="mr-2"><i class="fas fa-edit text-info font-16"></i></a>
                                        <a href="{{ route('admin.notice.delete-notice', $data->id) }}" onclick="return confirm('Bạn chắc chắn muốn xóa ?');"><i class="fas fa-trash-alt text-danger font-16"></i></a>
                                    </td>
                                </tr>
                        <?php    }
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {{ $listData->links() }}
    </div>
</div>
@endsection
