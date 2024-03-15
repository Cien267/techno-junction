@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <form action="{{ route('admin.subscribe.list-subscribe') }}" method="GET">
            <div class="row">
                <div class="col-lg-3 float-left" style="padding-left: 0px !important;">
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-12 col-form-label text-left"><b>Ngày tạo từ ngày</b></label>
                        <div class="col-sm-12">
                            <input type="date" name="date_from" value="{{ request()->get('date_from') ?? '' }}" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 float-left" style="padding-left: 0px !important;">
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-12 col-form-label text-left"><b>~ Đến ngày</b></label>
                        <div class="col-sm-12">
                            <input type="date" name="date_to" value="{{ request()->get('date_to') ?? '' }}" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 float-left" style="padding-left: 0px !important;">
                    <div class="form-group row">
                        <button type="submit" class="btn btn-primary" style="margin-top:35px">Tìm kiếm</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="thead-light">
                        <tr>
                            <th>STT</th>
                            <th>Email</th>
                            <th>Số điện thoại</th>
                            <th>Ngày tạo</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if(!empty($listData)){
                            foreach ($listData as $key => $item){ ?>
                                <tr>
                                    <td >{{ ($key + 1) }}</td>
                                    <td >{{ $item->email }}</td>
                                    <td >{{ $item->phone }}</td>
                                    <td >{{ date('d/m/Y H:i', strtotime($item->created)) }}</td>
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