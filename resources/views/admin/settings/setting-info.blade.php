@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <form class="form-parsley" action="{{ route('admin.setting.save-setting-info') }}" method="POST">
                    @csrf
                    <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label><b>Tên website (*)</b></label>
                            <input type="text" class="form-control @error('website') parsley-error @enderror" placeholder="MomChoice - Lựa chọn của mẹ" name="website" value="{{ $data->website ?? old('website') }}">
                            @error('website') <div class="parsley-required">{{ $message }}</div> @enderror
                        </div>
                        <div class="form-group">
                            <label><b>Tên miền (*)</b></label>
                            <input type="text"  class="form-control @error('domain') parsley-error @enderror" placeholder="http://abcxyz.vn" name="domain" value="{{ $data->domain ?? old('domain') }}">
                            @error('domain') <div class="parsley-required">{{ $message }}</div> @enderror
                        </div>
                        <div class="form-group">
                            <label><b>Tên công ty (*)</b></label>
                            <input type="text" class="form-control @error('company') parsley-error @enderror" placeholder="Nhập tên công ty" name="company" value="{{ $data->company ?? old('company') }}">
                            @error('company') <div class="parsley-required">{{ $message }}</div> @enderror
                        </div>
                        <div class="form-group">
                            <label><b>Địa chỉ (*)</b></label>
                            <input type="text" class="form-control @error('address') parsley-error @enderror" placeholder="Nhập địa chỉ công ty" name="address" value="{{ $data->address ?? old('address') }}">
                            @error('address') <div class="parsley-required">{{ $message }}</div> @enderror
                        </div>
                        <div class="form-group">
                            <label><b>[SEO] title</b></label>
                            <input type="text" class="form-control" placeholder="Nhập seo title mặc định" name="seo_title" value="{{ $data->seo_title ?? old('seo_title') }}">
                        </div>
                    </div>
                    <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label><b>Email (*)</b></label>
                            <input type="text" class="form-control @error('email') parsley-error @enderror" placeholder="Nhập emai liên hệ" name="email" value="{{ $data->email ?? old('email') }}">
                            @error('email') <div class="parsley-required">{{ $message }}</div> @enderror
                        </div>
                        <div class="form-group">
                            <label><b>Số điện thoại (*)</b></label>
                            <input type="text" class="form-control @error('phone') parsley-error @enderror" placeholder="Nhập số điện thoại liên hệ" name="phone" value="{{ $data->phone ?? old('phone') }}">
                            @error('phone') <div class="parsley-required">{{ $message }}</div> @enderror
                        </div>
                        <div class="form-group">
                            <label><b>Hotline (*)</b></label>
                            <input type="text" class="form-control @error('hotline') parsley-error @enderror" placeholder="Nhập số hotline" name="hotline" value="{{ $data->hotline ?? old('hotline') }}">
                            @error('hotline') <div class="parsley-required">{{ $message }}</div> @enderror
                        </div>
                        <div class="form-group">
                            <label><b>[SEO] keywords (keyword1,keyword2)</b></label>
                            <input type="text" class="form-control" placeholder="Nhập seo keyword mặc định" name="seo_keywords" value="{{ $data->seo_keywords ?? old('seo_keywords') }}">
                        </div>
                    </div>
                    <div class="col-md-6 float-left">
                        <label><b>[SEO] description</b></label>
                        <textarea class="form-control" placeholder="Nhập seo description mặc định" name="seo_description" rows="3">{{ $data->seo_description ?? old('seo_description') }}</textarea>
                    </div>
                    <div class="col-md-12 float-left" style="margin-top: 15px;">
                        <div class="form-group mb-0 text-center">
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Lưu</button>
                        </div>
                    </div>
                </form><!--end form-->
            </div><!--end card-body-->
        </div><!--end card-->
    </div> <!-- end col -->
</div>
@endsection