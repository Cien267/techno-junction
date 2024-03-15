@extends('layouts.admin')
@section('content')
    <div class="row">
        <form action="{{ route('admin.notice.save-news') }}" class="form-parsley form-horizontal form-material mb-0" role="form" novalidate="" enctype="multipart/form-data"  method="post" accept-charset="utf-8">
            @csrf
            <input type="hidden" name="id" value="{{ $data->id ?? '' }}">
            <div class="col-lg-8 mx-auto float-left">
                <div class="card dr-pro-pic">
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="NoticeTitle" class="col-md-12 col-xs-12"><b>Tiêu đề bài viết</b></label>
                                    <div class="col-sm-12">
                                        <input name="title" class="form-control @error('title') parsley-error @enderror" value="{{ $data->title ?? '' }}" placeholder="Nhập tên bài viêt" type="text">
                                        @error('title') <div class="parsley-required">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-12 col-xs-12"><b>Ảnh</b></label>
                                    <div class="col-sm-12">
                                        {!! showUploadFile('image', 'image', $data->image ?? '') !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label class="col-md-12 col-xs-12"><b>Mô tả ngắn</b></label>
                                        <textarea name="description" rows="8" class="form-control" placeholder="Nhập mô tả ngắn">{{ $data->description ?? '' }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!--end col-->
            <div class="col-lg-4 mx-auto float-left">
                <div class="card dr-pro-pic">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="NoticeTitle" class="col-md-12 col-xs-12"><b>[SEO] title</b></label>
                            <div class="col-sm-12">
                                <input name="seo_title" class="form-control" value="{{ $data->seo_title ?? '' }}" placeholder="Meta seo title" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="NoticeTitle" class="col-md-12 col-xs-12"><b>[SEO] description</b></label>
                            <div class="col-sm-12">
                                <textarea name="seo_description" rows="3" class="form-control" placeholder="Meta seo description">{{ $data->seo_description ?? '' }}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="NoticeTitle" class="col-md-12 col-xs-12"><b>[SEO] keywords</b></label>
                            <div class="col-sm-12">
                                <input name="seo_keywords" class="form-control" value="{{ $data->seo_keywords ?? '' }}" placeholder="Meta seo keywords (keyword1,keyword2)" type="text">
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-12 mx-auto float-left">
                <div class="card dr-pro-pic">
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label class="col-sm-12 col-xs-12"><b>Nội dung bài viết</b></label>
                                {!! showEditor('content', 'content', $data->content ?? '') !!}
                            </div>
                        </div>
                        <div class="form-group text-center">
                            <input class="btn btn-primary btn-sm  px-4 mt-3  mb-0" type="submit" value="Lưu">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection