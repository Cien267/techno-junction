@extends('layouts.provider')
@section('content')
<!-- Page Header -->
<div class="page-header">
    <div class="row">
        <div class="col-md-4">
            <div class="provider-subtitle">
                <h6>Provider Dashboard</h6>
            </div>
        </div>
        <div class="col-md-8 d-flex align-items-center justify-content-md-end flex-wrap">
            <div class="review-sort me-2">
                <p>Sort</p>
                <select class="select">
                    <option>A -&gt; Z</option>
                    <option>Most Helpful</option>
                </select>
            </div>
            <div class="grid-listview">
                <ul>
                    <li>
                        <a href="javascript:void(0);">
                            <i class="feather-filter"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- /Page Header -->

<div class="row">
    <div class="col-xl-3 col-sm-6 d-flex">
        <div class="dash-card flex-fill">
            <div class="dash-header">
                <div class="dash-widget-header">
                    <div class="d-flex align-items-center">
                                    <span class="dash-widget-icon">
                                        <img src="/provider/img/pro-icon-04.svg" alt="img">
                                    </span>
                        <div class="dash-widget-info">
                            <h6>Earnings</h6>
                            <h5>$50000</h5>
                        </div>
                    </div>
                    <select>
                        <option>2023</option>
                        <option>2022</option>
                    </select>
                </div>
                <div class="dash-total">
                    <p>Total Sales: <span>85</span></p>
                    <div class="badge-success">+2.58</div>
                </div>
            </div>
            <div class="dash-widget-img">
                <img src="/provider/img/pro-chart-01.svg" class="img-fluid" alt="img">
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 col-12 d-flex">
        <div class="dash-card flex-fill">
            <div class="dash-header">
                <div class="dash-widget-header">
                    <div class="d-flex align-items-center">
                                    <span class="dash-widget-icon">
                                        <img src="/provider/img/pro-icon-03.svg" alt="img">
                                    </span>
                        <div class="dash-widget-info">
                            <h6>Bookings</h6>
                            <h5>102</h5>
                        </div>
                    </div>
                    <select>
                        <option>2023</option>
                        <option>2023</option>
                    </select>
                </div>
                <div class="dash-total">
                    <p>Over All: <span>60</span></p>
                    <div class="badge-success">+2.58</div>
                </div>
            </div>
            <div class="dash-widget-img">
                <img src="/provider/img/pro-chart-02.svg" class="img-fluid" alt="img">
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 col-12 d-flex">
        <div class="dash-card flex-fill">
            <div class="dash-header">
                <div class="dash-widget-header">
                    <div class="d-flex align-items-center">
                                    <span class="dash-widget-icon">
                                        <img src="/provider/img/pro-icon-02.svg" alt="img">
                                    </span>
                        <div class="dash-widget-info">
                            <h6>Services</h6>
                            <h5>12</h5>
                        </div>
                    </div>
                    <select>
                        <option>2023</option>
                        <option>2023</option>
                    </select>
                </div>
                <div class="dash-total">
                    <p>Providers: <span>120</span></p>
                    <div class="badge-success">+2.58</div>
                </div>
            </div>
            <div class="dash-widget-img">
                <img src="/provider/img/pro-chart-03.svg" class="img-fluid" alt="img">
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 col-12 d-flex">
        <div class="dash-card flex-fill">
            <div class="dash-header">
                <div class="dash-widget-header">
                    <div class="d-flex align-items-center">
                                    <span class="dash-widget-icon">
                                        <img src="/provider/img/pro-icon-01.svg" alt="img">
                                    </span>
                        <div class="dash-widget-info">
                            <h6>Balance</h6>
                            <h5>$200</h5>
                        </div>
                    </div>
                    <select>
                        <option>2023</option>
                        <option>2023</option>
                    </select>
                </div>
                <div class="dash-total">
                    <a href="#" class="btn btn-primary">Withdraw</a>
                </div>
            </div>
            <div class="dash-widget-img">
                <img src="/provider/img/pro-chart-04.svg" class="img-fluid" alt="img">
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6 d-flex flex-column">

        <!-- Current Plan -->
        <h6 class="subhead-title">Current Plan</h6>
        <div class="card flex-fill">
            <div class="card-body">
                <div class="plan-info">
                    <div class="plan-term">
                        <h5>Standard</h5>
                        <p>Our most popular plan for small teams.</p>
                        <h6><span>Renew Date:</span> Jan 22, 2023</h6>
                    </div>
                    <div class="plan-price">
                        <h4>$291</h4>
                        <p>per user/Year</p>
                    </div>
                </div>
                <div class="plan-btns">
                    <a href="#" class="btn btn-danger-light">Cancel Subscription</a>
                    <a href="provider-subscription.html" class="btn btn-secondary-outline">Upgrade</a>
                </div>
            </div>
        </div>
        <!-- /Current Plan -->

    </div>
    <div class="col-md-6 d-flex flex-column">

        <!-- Payments -->
        <h6 class="subhead-title">Payment</h6>
        <div class="card flex-fill">
            <div class="card-body pay-next">
                <div class="plan-info">
                    <div class="plan-term">
                        <h5>Last Payment</h5>
                        <h6>January 22, 2023</h6>
                    </div>
                    <div class="plan-price">
                        <a href="#" class="btn btn-light-success">Active</a>
                    </div>
                </div>
                <div class="plan-info">
                    <div class="plan-term">
                        <h5>Next Payment</h5>
                        <h6>January 22, 2023</h6>
                    </div>
                    <div class="plan-price">
                        <a href="#" class="btn btn-primary">Manage Payment</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Payments -->

    </div>
    <div class="col-md-12">
        <h6 class="subhead-title">Recent Booking</h6>

        <!-- Booking List -->
        <div class="booking-list">
            <div class="booking-widget">
                <div class="booking-img">
                    <a href="../services/service-details.html">
                        <img src="/provider/img/service-08.jpg" alt="User Image">
                    </a>
                    <div class="fav-item">
                        <a href="javascript:void(0)" class="fav-icon">
                            <i class="feather-heart"></i>
                        </a>
                    </div>
                </div>
                <div class="booking-det-info">
                    <h3>
                        <a href="../services/service-details.html">Computer Services  </a><span class="badge badge-danger">Cancelled</span>
                    </h3>
                    <ul class="booking-details">
                        <li>
                            <span class="book-item">Booking Date</span> : 27 Sep 2023, 17:00-18:00
                        </li>
                        <li>
                            <span class="book-item">Amount</span> : $100.00 <span class="badge-grey">COD</span>
                        </li>
                        <li>
                            <span class="book-item">Location</span> : Newyork, USA
                        </li>
                        <li>
                            <span class="book-item">Customer</span> :
                            <div class="user-book">
                                <div class="avatar avatar-xs">
                                    <img class="avatar-img rounded-circle" alt="User Image" src="/provider/img/avatar-02.jpg">
                                </div>
                                John Doe
                            </div>
                            <p><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="60090e060f200a0f080e040f054e030f0d">[email&nbsp;protected]</a></p>
                            <p>+1 888 888 8888</p>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="booking-action">
                <a href="booking.html" class="btn btn-secondary">Reschedule</a>
            </div>
        </div>
        <!-- /Booking List -->

        <!-- Booking List -->
        <div class="booking-list">
            <div class="booking-widget">
                <div class="booking-img">
                    <a href="../services/service-details.html">
                        <img src="/provider/img/service-18.jpg" alt="User Image">
                    </a>
                    <div class="fav-item">
                        <a href="javascript:void(0)" class="fav-icon">
                            <i class="feather-heart"></i>
                        </a>
                    </div>
                </div>
                <div class="booking-det-info">
                    <h3>
                        <a href="../services/service-details.html">Car Repair Services</a>  <span class="badge badge-success">Completed</span>
                    </h3>
                    <ul class="booking-details">
                        <li>
                            <span class="book-item">Booking Date</span> : 23 Sep 2023, 10:00-11:00
                        </li>
                        <li><span class="book-item">Amount</span> : $50.00 <span class="badge-grey">COD</span></li>
                        <li><span class="book-item">Location</span> : Alabama, USA</li>
                        <li>
                            <span class="book-item">Customer</span> :
                            <div class="user-book">
                                <div class="avatar avatar-xs">
                                    <img class="avatar-img rounded-circle" alt="User Image" src="/provider/img/avatar-03.jpg">
                                </div>
                                John Smith
                            </div>
                            <p><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="ff96919990bf959097918c92968b97d19c9092">[email&nbsp;protected]</a></p>
                            <p>+1 607-276-5393</p>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="booking-action">
                <a href="booking.html" class="btn btn-primary">Rebook</a>
                <a href="javascript:void(0);" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#add-review"><i class="feather-plus-circle"></i> Add Review</a>
                <div class="view-action">
                    <div class="rating">
                        <i class="fas fa-star filled"></i>
                        <i class="fas fa-star filled"></i>
                        <i class="fas fa-star filled"></i>
                        <i class="fas fa-star filled"></i>
                        <i class="fas fa-star filled"></i>
                    </div>
                    <a href="../services/service-details.html" class="view-btn">View Details</a>
                </div>
            </div>
        </div>
        <!-- /Booking List -->

        <!-- Booking List -->
        <div class="booking-list">
            <div class="booking-widget">
                <div class="booking-img">
                    <a href="../services/service-details.html">
                        <img src="/provider/img/service-07.jpg" alt="User Image">
                    </a>
                    <div class="fav-item">
                        <a href="javascript:void(0)" class="fav-icon">
                            <i class="feather-heart"></i>
                        </a>
                    </div>
                </div>
                <div class="booking-det-info">
                    <h3>
                        <a href="../services/service-details.html">Interior Designing</a>  <span class="badge badge-info">Inprogress</span>
                    </h3>
                    <ul class="booking-details">
                        <li>
                            <span class="book-item">Booking Date</span> : 27 Sep 2023, 17:00-18:00
                        </li>
                        <li><span class="book-item">Amount</span> : $50.00 <span class="badge-grey">COD</span></li>
                        <li><span class="book-item">Location</span> : Washington, DC, USA</li>
                        <li>
                            <span class="book-item">Customer</span> :
                            <div class="user-book">
                                <div class="avatar avatar-xs">
                                    <img class="avatar-img rounded-circle" alt="User Image" src="/provider/img/avatar-06.jpg">
                                </div>
                                Quentin
                            </div>
                            <p><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="d0b9beb6bf90a1a5b5bea4b9befeb3bfbd">[email&nbsp;protected]</a></p>
                            <p>+1 601-810-9218</p>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="booking-action">
                <a href="provider-chat.html" class="btn btn-primary"><i class="feather-message-square"></i> Chat</a>
                <a href="javascript:void(0);" class="btn btn-secondary">Cancel</a>
            </div>
        </div>
        <!-- /Booking List -->

        <!-- Booking List -->
        <div class="booking-list">
            <div class="booking-widget">
                <div class="booking-img">
                    <a href="../services/service-details.html">
                        <img src="/provider/img/service-13.jpg" alt="User Image">
                    </a>
                    <div class="fav-item">
                        <a href="javascript:void(0)" class="fav-icon">
                            <i class="feather-heart"></i>
                        </a>
                    </div>
                </div>
                <div class="booking-det-info">
                    <h3>
                        <a href="../services/service-details.html">House Cleaning Services</a> <span class="badge badge-warning">Pending</span>
                    </h3>
                    <ul class="booking-details">
                        <li>
                            <span class="book-item">Booking Date</span> : 27 Sep 2023, 17:00-18:00
                        </li>
                        <li><span class="book-item">Amount</span> : $375.00 <span class="badge-grey">COD</span></li>
                        <li><span class="book-item">Location</span> : Virginia, USA</li>
                        <li>
                            <span class="book-item">Customer</span> :
                            <div class="user-book">
                                <div class="avatar avatar-xs">
                                    <img class="avatar-img rounded-circle" alt="User Image" src="/provider/img/avatar-02.jpg">
                                </div>
                                Johnson
                            </div>
                            <p><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="1e777078715e747176706d7170307d7173">[email&nbsp;protected]</a></p>
                            <p>+1 312-328-3970</p>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="booking-action">
                <a href="provider-chat.html" class="btn btn-primary"><i class="feather-message-square"></i> Chat</a>
                <a href="javascript:void(0);" class="btn btn-secondary">Cancel</a>
            </div>
        </div>
        <!-- /Booking List -->

        <div class="view-history">
            <a href="provider-booking.html" class="btn btn-primary">View All History</a>
        </div>

    </div>


</div>
@endsection
