@if(\Session::get('success'))
<div class="row">
    <div class="col-lg-12">
        <div class="alert alert-success" role="alert">
            {{ \Session::get('success') }}
        </div>
    </div>
</div>
@endif
{{ \Session::forget('success') }}
@if(\Session::get('error'))
<div class="row">
    <div class="col-lg-12">
        <div class="alert alert-danger" role="alert">
            {{ \Session::get('error') }}
        </div>
    </div>
</div>
@endif