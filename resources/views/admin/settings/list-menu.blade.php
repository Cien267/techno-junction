@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.setting.save-list-menu') }}"  method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ $data->id ?? "" }}">
                        <div class="form-group col-md-12">
                            <div class="form-group">
                                <label><b>Tên menu (*)</b></label>
                                <input type="text" class="form-control @error('name') parsley-error @enderror" placeholder="Nhập tên menu" name="name" value="{{ $data->name ?? old('name') }}">
                                @error('name') <div class="parsley-required">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <div class="form-group">
                                <label><b>Thuộc về chuyên mục (*)</b></label>
                                <select class="form-control" name="parent">
                                    <option value="0">Chuyên mục cha</option>
                                    <?php
                                    $listMenuParent = listMenuParent();
                                    if(!empty($listMenuParent)){
                                        foreach ($listMenuParent as $menu){
                                            if(!empty($data->parent) && $data->parent == $menu->id){
                                                $selected = 'selected';
                                            }else{
                                                $selected = '';
                                            }
                                            echo '<option value="'.$menu->id.'" '.$selected.'>'.$menu->name.'</option>';
                                        }
                                    }?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <div class="form-group">
                                <label><b>Đường dẫn (*)</b></label>
                                <input type="text" class="form-control @error('url') parsley-error @enderror" name="url"  value="{{ $data->url ?? old('url') }}" placeholder="Đường dẫn">
                                @error('url') <div class="parsley-required">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <div class="form-group">
                                <label><b>Sắp xếp (*)</b></label>
                                <input type="text" class="form-control @error('sort') parsley-error @enderror" name="sort" value="{{ $data->sort ?? old('sort') }}" placeholder="Sắp xếp vị trí">
                                @error('sort') <div class="parsley-required">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="form-group col-md-2">
                            <div class="form-group">
                                <button style="margin-top: 26px;" class="btn btn-primary btndf_button" id="submit" type="submit">Lưu</button>
                            </div>
                        </div>
                    </form>
                </div><!--end card-body-->
            </div><!--end card-->
        </div> <!-- end col -->
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <table class="table table-hover" >
                        <thead>
                        <tr>
                            <th>Tên menu</th>
                            <th>Url</th>
                            <th>Sort</th>
                            <th>Lựa chọn</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            $listMenuParent = listMenuParent();
                            if(!empty($listMenuParent)){
                            foreach ($listMenuParent as $key => $menu){
                        ?>
                        <tr>
                            <td >{{ $menu->name }}</td>
                            <td style="word-break: break-all;"><a href="{{ $menu->url }}">{{ $menu->url }}</a></td>
                            <td >{{ $menu->sort }}</td>
                            <td >
                                <a href="{{ route('admin.setting.list-menu', $menu->id) }}"><span class="btn btn-primary btndf_button" style="margin-right:15px;">Sửa</span></a>
                                <a href="{{ route('admin.setting.delete-menu', $menu->id) }}" onclick="return confirm('Bạn chắc chắn muốn xóa, Thao tác sẽ xóa cả menu con ? ');"><span class="btn btn-default btndf_button">Xóa</span></a>
                            </td>

                        </tr>
                        <?php
                            $getMenuByParent = getMenuByParent($menu->id);
                            if(!empty($getMenuByParent)){
                            foreach ($getMenuByParent as $child){
                        ?>
                        <tr>
                            <td ><img src="/images/bg-list-item.png">&nbsp;&nbsp;&nbsp;&nbsp;{{ $child->name }}</td>
                            <td style="word-break: break-all;"><a href="{{ $child->url }}">{{ $child->url }}</a></td>
                            <td >{{ $child->sort }}</td>
                            <td >
                                <a href="{{ route('admin.setting.list-menu', $child->id) }}"><span class="btn btn-primary btndf_button" style="margin-right:15px;">Sửa</span></a>
                                <a href="{{ route('admin.setting.delete-menu', $child->id) }}" onclick="return confirm('Bạn chắc chắn muốn xóa ? ');"><span class="btn btn-default btndf_button">Xóa</span></a>
                            </td>

                        </tr>
                        <?php       }
                                }
                            }
                        }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection