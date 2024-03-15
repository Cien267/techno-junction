@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.album.save-album') }}"  method="post" accept-charset="utf-8">
                    @csrf
                    <input type="hidden" name="id" value="{{ $data->id ?? '' }}">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><b>Tên album (*)</b></label>
                                <div class="input text">
                                    <input name="name" class="form-control @error('name') parsley-error @enderror" type="text" value="{{ $data->id ?? '' }}" placeholder="Nhập tên album">
                                    @error('name') <div class="parsley-required">{{ $message }}</div> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label><b>Trạng thái</b></label>
                                <div class="input text">
                                    <select name="status" class="form-control" >
                                        <option value="1" {{ isset($data->status) && $data->status == 1 ? 'selected' : '' }}>Kích hoạt</option>
                                        <option value="2" {{ isset($data->status) && $data->status == 2 ? 'selected' : '' }}>Khóa</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><b>Ảnh minh họa</b></label>
                                <div class="input text">
                                    {!! showUploadFile('image', 'image', $data->image ?? '') !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group text-center">
                                <button style="margin-top: 25px;" class="btn btn-primary btndf_button" id="submit" type="submit">Lưu</button>
                            </div>
                        </div>

                    </div>

                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <table class="table table-hover" >
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên album</th>
                        <th>Ảnh minh hoạ</th>
                        <th>Trạng thái</th>
                        <th>Thêm ảnh</th>
                        <th>Lựa chọn</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        if(!empty($listData)){
                        foreach ($listData as $key => $item){
                    ?>
                    <tr>
                        <td style="width: 7%;">{{ ($key + 1) }}</td>
                        <td style="word-break: break-all;">{{ $item->name }}</td>
                        <td><img class="img-thumbnail" src="{{ $item->image ?? '/admin/images/no-images.png' }}" style="width: 60px;"></td>
                        <td style="word-break: break-all;">
                            {!! $item->status == 1 ? "<p style='color:green;font-weight: bold;'>Kích hoạt</p>" : "<p style='color:red;font-weight: bold;'>Khóa</p>" !!}
                        </td>
                        <td style="word-break: break-all;"><a class="btn btn-sm btn-success" href="{{ route('admin.album.list-image', [$item->id]) }}">Thêm ảnh vào album</a></td>

                        <td style="width: 29%;">
                            <a class="mr-2" href="{{ route('admin.album.list-album', $item->id) }}"><i class="fas fa-edit text-info font-16"></i></a>
                            <a href="{{ route('admin.album.delete-album', $item->id) }}" onclick="return confirm('Bạn chắc chắn muốn xóa ?');"><i class="fas fa-trash-alt text-danger font-16"></i></a>
                        </td>

                    </tr>
                    <?php }
                    }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection