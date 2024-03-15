@extends('layouts.admin')
@section('content')
<?php $listCatNoticeParent = listCatNoticeParent(); ?>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.notice.add-cat-notice') }}" method="POST">
                    @csrf
                    <input name="id" type="hidden" value="{{ $data->id ?? '' }}">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-12 col-form-label text-left">Tên chuyên mục (*)</label>
                                <div class="col-sm-12">
                                    <input class="form-control @error('name') parsley-error @enderror" type="text" value="{{ $data->name ?? old('name') }}" placeholder="Nhập tên chuyên mục" name="name">
                                    @error('name') <div class="parsley-required">{{ $message }}</div> @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-12 col-form-label text-left">Chuyên mục cha (*)</label>
                                <div class="col-sm-12">
                                    <select class="form-control @error('parent') parsley-error @enderror" name="parent">
                                        <option value="0">Chuyên mục gốc</option>
                                        <?php
                                        if(!empty($listCatNoticeParent)){
                                            foreach ($listCatNoticeParent as $cat){
                                                $selected = '';
                                                if(!empty($data->parent) && $data->parent == $cat->id){
                                                    $selected = 'selected';
                                                }
                                                echo '<option value="'.$cat->id.'" '.$selected.'>'.$cat->name.'</option>';
                                            }

                                        }?>
                                    </select>
                                    @error('parent') <div class="parsley-required">{{ $message }}</div> @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group row">
                                <label class="col-md-12 col-xs-12"><b>Ảnh</b></label>
                                <div class="col-sm-12">
                                    {!! showUploadFile('image', 'image', $data->image ?? '') !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group row">
                                <label for="NoticeTitle" class="col-md-12 col-xs-12 text-left"><b>Mô tả ngắn</b></label>
                                <div class="col-sm-12">
                                    <textarea name="description" rows="3" class="form-control" placeholder="Mô tả ngắn">{{ $data->description ?? old('description') }}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group row">
                                <label for="NoticeTitle" class="col-md-12 col-xs-12 text-left"><b>[SEO] title</b></label>
                                <div class="col-sm-12">
                                    <input name="seo_title" class="form-control" value="{{ $data->seo_title ?? old('seo_title') }}" placeholder="Meta seo title" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group row">
                                <label for="NoticeTitle" class="col-md-12 col-xs-12"><b>[SEO] keywords</b></label>
                                <div class="col-sm-12">
                                    <input name="seo_keywords" class="form-control" value="{{ $data->seo_keywords ?? old('seo_keywords') }}" placeholder="Meta seo keywords (keyword1,keyword2)" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group row">
                                <label for="NoticeTitle" class="col-md-12 col-xs-12"><b>[SEO] description</b></label>
                                <div class="col-sm-12">
                                    <textarea name="seo_description" rows="3" class="form-control" placeholder="Meta seo description">{{ $data->seo_description ?? old('seo_description') }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group row" style="margin-top: 33px;">
                                <button type="submit" class="btn btn-primary">Lưu</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div><!--end card-body-->
        </div><!--end card-->
    </div><!--end col-->
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table  class="table">
                        <thead class="thead-light">
                        <tr>
                            <th width="40">No.</th>
                            <th>Tên chuyên mục</th>
                            <th>Đường dẫn</th>
                            <th>Lựa chọn</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            if(!empty($listCatNoticeParent)){
                            foreach ($listCatNoticeParent as $key => $item){
                        ?>
                            <tr>
                                <td >{{ ($key + 1) }}</td>
                                <td >{{ $item->name }}</td>
                                <td style="word-break: break-all;"><a href="{{ '/category/'.$item->slug }}">{{ '/category/'.$item->slug }}</a></td>
                                <td >
                                    <a href="{{ route('admin.notice.list-cat-notice', $item->id) }}"><span class="btn btn-primary btndf_button" style="margin-right:15px;">Sửa</span></a>
                                    <a href="{{ route('admin.notice.delete-cat-notice', $item->id) }}" onclick="return confirm('Bạn chắc chắn muốn xóa, Thao tác sẽ xóa cả chuyên mục con ? ');"><span class="btn btn-default btndf_button">Xóa</span></a>
                                </td>
                            </tr>
                        <?php
                         $getCatNoticeByParent = getCatNoticeByParent($item->id);
                            if(!empty($getCatNoticeByParent)){
                            foreach ($getCatNoticeByParent as $keyChild => $child){ ?>
                                    <tr>
                                        <td >{{ ($keyChild + 1) }}</td>
                                        <td >&ensp;&ensp;&ensp;<img src="/images/bg-list-item.png">&ensp; {{ $child->name }}</td>
                                        <td style="word-break: break-all;"><a href="{{ '/category/'.$child->slug }}">{{ '/category/'.$child->slug }}</a></td>
                                        <td >
                                            <a href="{{ route('admin.notice.list-cat-notice', $child->id) }}"><span class="btn btn-primary btndf_button" style="margin-right:15px;">Sửa</span></a>
                                            <a href="{{ route('admin.notice.delete-cat-notice', $child->id) }}" onclick="return confirm('Bạn chắc chắn muốn xóa ? ');"><span class="btn btn-default btndf_button">Xóa</span></a>
                                        </td>
                                    </tr>
                         <?php           }
                                }
                            }
                        } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
