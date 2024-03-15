@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.feedback.save-feedback') }}"  method="post" accept-charset="utf-8">
                    @csrf
                    <input type="hidden" name="id" value="{{ $data->id ?? '' }}">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="form-group">
                                <label><b>Tên khách hàng (*)</b></label>
                                <div class="input text">
                                    <input name="full_name" class="form-control @error('full_name') parsley-error @enderror" type="text" value="{{ $data->full_name ?? '' }}" >
                                    @error('full_name') <div class="parsley-required">{{ $message }}</div> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label><b>Vị trí chức vụ</b></label>
                                <div class="input text">
                                    <input name="position" class="form-control" type="text" value="{{ $data->position ?? '' }}" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label><b>Nội dung nhận xét (*)</b></label>
                                <div class="input text">
                                    <textarea class="form-control @error('content') parsley-error @enderror" name="content" rows="3">{{ $data->content ?? '' }}</textarea>
                                </div>
                                @error('content') <div class="parsley-required">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group col-md-4 float-left">
                                <label><b>Avartar( *)</b></label>
                                {!! showUploadFile('avatar', 'avatar', $data->avatar ?? '') !!}
                                @error('avatar') <div class="parsley-required">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-12 text-center">
                            <button class="btn btn-primary btndf_button" id="submit" type="submit">Lưu</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <table class="table table-hover" style="margin-top: 40px">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>Avatar</th>
                        <th>Khách hàng</th>
                        <th>Chức vụ</th>
                        <th>Nội dung</th>
                        <th>Lựa chọn</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        if(!empty($listData)){
                        foreach ($listData as $key => $item){
                    ?>
                    <tr>
                        <td style="width: 2%;">{{ ($key+1) }}</td>
                        <td style="word-break: break-all;"><img src="{{ $item->avatar }}" style="width: 100px;height: 100px;"></td>
                        <td style="word-break: break-all;">{{ $item->full_name }}</td>
                        <td style="word-break: break-all;">{{ $item->position }}</td>
                        <td style="word-break: break-all;">{{ $item->content }}</td>
                        <td style="width: 8%;">
                            <a href="{{ route('admin.feedback.list-feedback', $item->id) }}" class="mr-2"><i class="fas fa-edit text-info font-16"></i></a>
                            <a href="{{ route('admin.feedback.delete-feedback', $item->id) }}" onclick="confirm('Are you sure');"><i class="fas fa-trash-alt text-danger font-16"></i></a>
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