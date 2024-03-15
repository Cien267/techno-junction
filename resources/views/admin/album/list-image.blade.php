@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-lg-5">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.album.save-image') }}"  method="post" accept-charset="utf-8">
                    @csrf
                    <input type="hidden" name="album_id" value="{{ $album->id ?? '' }}">
                    <input type="hidden" name="id" value="{{ $data->id ?? '' }}">
                    <div class="form-group col-md-12">
                        <label>Ảnh</label>
                        <div class="input text">
                            {!! showUploadFile('image', 'image', $data->image ?? '') !!}
                        </div>
                        @error('image') <div class="parsley-required">{{ $message }}</div> @enderror
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group col-md-12">
                        <label>Tên ảnh</label>
                        <div class="input text">
                            <input name="title" value="{{ $data->id ?? '' }}" type="text" class="form-control @error('title') parsley-error @enderror">
                            @error('title') <div class="parsley-required">{{ $message }}</div> @enderror
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group col-md-12">
                        <label>Đường dẫn link tới</label>
                        <div class="input text">
                            <textarea class="form-control" rows="4" name="description">{{ $data->id ?? '' }}</textarea>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group col-md-12">
                        <label></label>
                        <button style="margin-top: 26px;" class="btn btn-primary btndf_button" id="submit" type="submit">Lưu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-7">
        <div class="card">
            <div class="card-body">
                <table class="table table-hover" >
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên ảnh</th>
                        <th>Ảnh</th>
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
                        <td>{{ $item->title }}</td>
                        <td style="word-break: break-all;"><img src="{{ $item->image }}" style="width: 70px;height: 70px;"></td>
                        <td style="width: 29%;">
                            <a class="mr-2" href="{{ route('admin.album.list-image', [$album->id, $item->id]) }}"><i class="fas fa-edit text-info font-16"></i></a>
                            <a href="{{ route('admin.album.delete-image', $item->id) }}" onclick="return confirm('Bạn chắc chắn muốn xóa ?');"><i class="fas fa-trash-alt text-danger font-16"></i></a>
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