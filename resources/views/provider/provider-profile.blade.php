@extends('layouts.provider')
@section('content')
            <div class="widget-title">
                <h4>Account Settings</h4>
            </div>
            <h6 class="user-title">Profile Picture</h6>
            <div class="pro-picture">
                <div class="pro-img">
                    <img src="{{asset('frontend/images/avatar-02.jpg')}}" alt="user">
                </div>
                <div class="pro-info">
                    <div class="d-flex">
                        <div class="img-upload">
                            <i class="feather-upload-cloud me-1"></i>Upload
                            <input type="file">
                        </div>
                        <a  class="btn btn-remove"  data-toggle="modal" data-target="#del-account">Remove</a>
                    </div>
                    <p>*image size should be at least 320px big,and less then 500kb. Allowed files .png and .jpg.</p>
                </div>
            </div>
            <h6 class="user-title">General Information</h6>
            <div class="general-info">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-form-label">Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" placeholder="Enter Your Name">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-form-label">User Name</label>
                            <input type="text" class="form-control" placeholder="Enter Your User Name">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-form-label">Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" placeholder="Enter Email Address">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-form-label">Mobile Number <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" placeholder="Enter Mobile Number">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-form-label">Gender</label>
                            <select class="select select2-hidden-accessible" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                <option data-select2-id="3">Select Gender</option>
                                <option>Male</option>
                                <option>Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-form-label">Date of birth</label>
                            <div class="form-icon">
                                <input type="text" class="form-control datetimepicker" placeholder="DD/MM/YYYY">
                                <span class="cus-icon"><i class="feather-calendar"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="col-form-label d-block">Your Bio <span class="brief-bio float-end">Brief description for your profile. URLs are hyperlinked.</span></label>
                            <textarea class="form-control" rows="5" placeholder="Add a Short Bio....."></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <h6 class="user-title">Address </h6>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="col-form-label">Address</label>
                        <input type="text" class="form-control" placeholder="Enter Your Address">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-form-label">Country</label>
                        <input type="text" class="form-control" placeholder="Enter Your Country">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-form-label">State</label>
                        <input type="email" class="form-control" placeholder="Enter Your State">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-form-label">City</label>
                        <input type="text" class="form-control" placeholder="Enter Your City">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-form-label">Postal Code</label>
                        <input type="text" class="form-control" placeholder="Enter Your Postal Code">
                    </div>
                </div>

            </div>
            <div class="acc-submit">
                <a href="#" class="btn btn-secondary">Hủy</a>
                <a href="#" class="btn btn-primary">Lưu thay đổi</a>
            </div>
    <!-- /Delete Account -->
    <!-- Cursor -->
@endsection

<!-- Delete Account -->
<div class="modal fade custom-modal" id="del-account">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-bottom-0 justify-content-between">
                <h5 class="modal-title">Delete Account</h5>
                <button type="button" class="close-btn" data-bs-dismiss="modal" aria-label="Close"><i class="feather-x"></i></button>
            </div>
            <div class="modal-body pt-0">
                <div class="write-review">
                    <form action="login.html">
                        <p>Are you sure you want to delete this account? To delete your account, type your password.</p>
                        <div class="form-group">
                            <label class="col-form-label">Password</label>
                            <div class="pass-group">
                                <input type="password" class="form-control pass-input" placeholder="*************">
                                <span class="toggle-password feather-eye-off"></span>
                            </div>
                        </div>
                        <div class="modal-submit text-end">
                            <a href="#" class="btn btn-secondary me-2" data-bs-dismiss="modal">Cancel</a>
                            <button type="submit" class="btn btn-danger">Delete Account</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

