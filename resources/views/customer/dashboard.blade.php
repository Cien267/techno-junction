@extends('layouts.customers')
@section('content')
<div class="widget-title">
    <h4>Dashboard</h4>
</div>

<!-- Dashboard Widget -->
<div class="row">
    <div class="col-md-6 col-lg-3">
        <div class="dash-widget">
            <div class="dash-img">
										<span class="dash-icon bg-yellow">
											<img src="/frontend/images/dash-icon-01.svg" alt="image">
										</span>
                <div class="dash-value"><img src="/frontend/images/up-icon.svg" alt="image"> +16.24%</div>
            </div>
            <div class="dash-info">
                <div class="dash-order">
                    <h6>Total Orders</h6>
                    <h5>27</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="dash-widget">
            <div class="dash-img">
										<span class="dash-icon bg-blue">
											<img src="/frontend/images/wallet-icon-01.svg" alt="image">
										</span>
                <div class="dash-value text-danger"><img src="/frontend/images/down-icon.svg" alt="image"> +18.52%</div>
            </div>
            <div class="dash-info">
                <div class="dash-order">
                    <h6>Total Spend</h6>
                    <h5>$2500</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="dash-widget">
            <div class="dash-img">
										<span class="dash-icon bg-blue">
											<img src="/frontend/images/wallet-add.svg" alt="image">
										</span>
                <div class="dash-value"><img src="/frontend/images/up-icon.svg" alt="image"> +12.10%</div>
            </div>
            <div class="dash-info">
                <div class="dash-order">
                    <h6>Wallet</h6>
                    <h5>$200</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="dash-widget">
            <div class="dash-img">
										<span class="dash-icon bg-light-danger">
											<img src="/frontend/images/wallet-amt.svg" alt="image">
										</span>
                <div class="dash-value"><img src="/frontend/images/up-icon.svg" alt="image"> +08.15%</div>
            </div>
            <div class="dash-info">
                <div class="dash-order">
                    <h6>Total Savings</h6>
                    <h5>$354</h5>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Dashboard Widget -->

<div class="row">
    <!-- Recent Booking -->
    <div class="col-lg-8 d-flex flex-column">
        <h6 class="user-title">Recent Booking</h6>
        <div class="table-responsive recent-booking flex-fill">
            <table class="table mb-0">
                <tbody>
                <tr>
                    <td>
                        <h2 class="table-avatar">
                            <a href="#" class="avatar avatar-m me-2"><img class="avatar-img rounded" src="/frontend/images/service-06.jpg" alt="User Image"></a>
                            <a href="#">Computer Repair<span><i class="feather-calendar"></i> 22 Sep 2023</span></a>
                        </h2>
                    </td>
                    <td>
                        <h2 class="table-avatar table-user">
                            <a href="#" class="avatar avatar-m me-2"><img class="avatar-img" src="/frontend/images/avatar-02.jpg" alt="User Image"></a>
                            <a href="#">
                                John Smith
                                <span><span class="__cf_email__" data-cfemail="3c565354527c59445d514c5059125f5351">[email&#160;protected]</span></span>
                            </a>
                        </h2>
                    </td>
                    <td class="text-end">
                        <a href="#" class="btn btn-light-danger">Cancel</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h2 class="table-avatar">
                            <a href="#" class="avatar avatar-m me-2"><img class="avatar-img rounded" src="/frontend/images/service-04.jpg" alt="User Image"></a>
                            <a href="#">Car Repair Services<span><i class="feather-calendar"></i> 20 Sep 2023</span></a>
                        </h2>
                    </td>
                    <td>
                        <h2 class="table-avatar table-user">
                            <a href="#" class="avatar avatar-m me-2"><img class="avatar-img" src="/frontend/images/avatar-03.jpg" alt="User Image"></a>
                            <a href="#">
                                Timothy
                                <span><span class="__cf_email__" data-cfemail="17637e7a78637f6e57726f767a677b723974787a">[email&#160;protected]</span></span>
                            </a>
                        </h2>
                    </td>
                    <td class="text-end">
                        <a href="#" class="btn btn-light-danger">Cancel</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h2 class="table-avatar">
                            <a href="#" class="avatar avatar-m me-2"><img class="avatar-img rounded" src="/frontend/images/service-07.jpg" alt="User Image"></a>
                            <a href="#">Interior Designing<span><i class="feather-calendar"></i> 19 Sep 2023</span></a>
                        </h2>
                    </td>
                    <td>
                        <h2 class="table-avatar table-user">
                            <a href="#" class="avatar avatar-m me-2"><img class="avatar-img" src="/frontend/images/avatar-06.jpg" alt="User Image"></a>
                            <a href="#">
                                Jordan
                                <span><span class="__cf_email__" data-cfemail="a9c3c6dbcdc8c7e9ccd1c8c4d9c5cc87cac6c4">[email&#160;protected]</span></span>
                            </a>
                        </h2>
                    </td>
                    <td class="text-end">
                        <a href="#" class="btn btn-light-danger">Cancel</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h2 class="table-avatar">
                            <a href="#" class="avatar avatar-m me-2"><img class="avatar-img rounded" src="/frontend/images/service-08.jpg" alt="User Image"></a>
                            <a href="#">Steam Car Wash<span><i class="feather-calendar"></i> 18 Sep 2023</span></a>
                        </h2>
                    </td>
                    <td>
                        <h2 class="table-avatar table-user">
                            <a href="#" class="avatar avatar-m me-2"><img class="avatar-img" src="/frontend/images/avatar-09.jpg" alt="User Image"></a>
                            <a href="#">
                                Armand
                                <span><span class="__cf_email__" data-cfemail="94f5e6f9f5faf0d4f1ecf5f9e4f8f1baf7fbf9">[email&#160;protected]</span></span>
                            </a>
                        </h2>
                    </td>
                    <td class="text-end">
                        <a href="#" class="btn btn-light-danger">Cancel</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h2 class="table-avatar">
                            <a href="#" class="avatar avatar-m me-2"><img class="avatar-img rounded" src="/frontend/images/service-09.jpg" alt="User Image"></a>
                            <a href="#">House Cleaning Services<span><i class="feather-calendar"></i> 17 Sep 2023</span></a>
                        </h2>
                    </td>
                    <td>
                        <h2 class="table-avatar table-user">
                            <a href="#" class="avatar avatar-m me-2"><img class="avatar-img" src="/frontend/images/avatar-10.jpg" alt="User Image"></a>
                            <a href="#">
                                Joseph
                                <span><span class="__cf_email__" data-cfemail="5a3035293f2a321a3f223b372a363f74393537">[email&#160;protected]</span></span>
                            </a>
                        </h2>
                    </td>
                    <td class="text-end">
                        <a href="#" class="btn btn-light-danger">Cancel</a>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <!-- /Recent Booking -->

    <!-- Recent Transaction -->
    <div class="col-lg-4 d-flex flex-column">
        <h6 class="user-title">Recent Transaction</h6>
        <div class="table-responsive transaction-table flex-fill">
            <table class="table mb-0">
                <tbody>
                <tr>
                    <td>
                        <div class="table-book d-flex align-items-center">
														<span class="book-img">
															<img src="/frontend/images/trans-icon-01.svg" alt="Icon">
														</span>
                            <div>
                                <h6>Service Booking</h6>
                                <p><i class="feather-calendar"></i>22 Sep 2023 <span><i class="feather-clock"></i> 10:12 AM</span></p>
                            </div>
                        </div>
                    </td>
                    <td class="text-end">
                        <h5 class="trans-amt">$280.00</h5>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="table-book d-flex align-items-center">
														<span class="book-img">
															<img src="/frontend/images/trans-icon-02.svg" alt="image">
														</span>
                            <div>
                                <h6>Service Refund</h6>
                                <p><i class="feather-calendar"></i>22 Sep 2023 <span><i class="feather-clock"></i> 10:12 AM</span></p>
                            </div>
                        </div>
                    </td>
                    <td class="text-end">
                        <h5 class="trans-amt">$100.00</h5>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="table-book d-flex align-items-center">
														<span class="book-img">
															<img src="/frontend/images/trans-icon-03.svg" alt="image">
														</span>
                            <div>
                                <h6>Wallet Topup</h6>
                                <p><i class="feather-calendar"></i>22 Sep 2023 <span><i class="feather-clock"></i> 10:12 AM</span></p>
                            </div>
                        </div>
                    </td>
                    <td class="text-end">
                        <h5 class="trans-amt">$1000.00</h5>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="table-book d-flex align-items-center">
														<span class="book-img">
															<img src="/frontend/images/trans-icon-01.svg" alt="Icon">
														</span>
                            <div>
                                <h6>Service Booking</h6>
                                <p><i class="feather-calendar"></i>22 Sep 2023 <span><i class="feather-clock"></i> 10:12 AM</span></p>
                            </div>
                        </div>
                    </td>
                    <td class="text-end">
                        <h5 class="trans-amt">$280.00</h5>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="table-book d-flex align-items-center">
														<span class="book-img">
															<img src="/frontend/images/trans-icon-01.svg" alt="Icon">
														</span>
                            <div>
                                <h6>Service Booking</h6>
                                <p><i class="feather-calendar"></i>22 Sep 2023 <span><i class="feather-clock"></i> 10:12 AM</span></p>
                            </div>
                        </div>
                    </td>
                    <td class="text-end">
                        <h5 class="trans-amt">$280.00</h5>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <!-- /Recent Transaction -->

</div>
@endsection
