@extends('layouts.frontend')
@section('content')
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="home-banner">
                <div class="row align-items-center w-100">
                    <div class="col-lg-7 col-md-10 mx-auto">
                        <div class="section-search aos" data-aos="fade-up">
                            <h1>Nhà cái đến từ Việt Nam</h1>
                            <p>Tìm kiếm hàng trăm studios, photographers phong cách</p>
                            <div id="header-search-bar"></div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="banner-imgs">
                            <div class="banner-1 shape-1">
                                <img class="img-fluid" alt="banner" src="frontend/images/banner1.png">
                            </div>
                            <div class="banner-2 shape-3">
                                <img class="img-fluid" alt="banner" src="frontend/images/banner2.png">
                            </div>
                            <div class="banner-3 shape-3">
                                <img class="img-fluid" alt="banner" src="frontend/images/banner3.png">
                            </div>
                            <div class="banner-4 shape-2">
                                <img class="img-responsive" alt="banner" src="frontend/images/banner4.png">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Hero Section -->

    <!-- Feature Section -->
    <section class="feature-section">
        <div class="container">
            <div class="section-heading">
                <div class="row align-items-center">
                    <div class="col-md-6 aos" data-aos="fade-up">
                        <h2>Featured Categories</h2>
                        <p>What do you need to find?</p>
                    </div>
                    <div class="col-md-6 text-md-end aos" data-aos="fade-up">
                        <a href="categories.html" class="btn btn-primary btn-view">View All<i class="feather-arrow-right-circle"></i></a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-3">
                    <a href="services/service-details.html" class="feature-box aos" data-aos="fade-up">
                        <div class="feature-icon">
								<span>
									<img src="frontend/images/feature-icon-01.svg" alt="img">
								</span>
                        </div>
                        <h5>Construction</h5>
                        <div class="feature-overlay">
                            <img src="frontend/images/service-02.jpg" alt="img">
                        </div>
                    </a>
                </div>
                <div class="col-md-6 col-lg-3">
                    <a href="services/service-details.html" class="feature-box aos" data-aos="fade-up">
                        <div class="feature-icon">
								<span>
									<img src="frontend/images/feature-icon-02.svg" alt="img">
								</span>
                        </div>
                        <h5>Car Wash</h5>
                        <div class="feature-overlay">
                            <img src="frontend/images/feature.jpg" alt="img">
                        </div>
                    </a>
                </div>
                <div class="col-md-6 col-lg-3">
                    <a href="services/service-details.html" class="feature-box aos" data-aos="fade-up">
                        <div class="feature-icon">
								<span>
									<img src="frontend/images/feature-icon-03.svg" alt="img">
								</span>
                        </div>
                        <h5>Electrical</h5>
                        <div class="feature-overlay">
                            <img src="frontend/images/service-01.jpg" alt="img">
                        </div>
                    </a>
                </div>
                <div class="col-md-6 col-lg-3">
                    <a href="services/service-details.html" class="feature-box aos" data-aos="fade-up">
                        <div class="feature-icon">
								<span>
									<img src="frontend/images/feature-icon-04.svg" alt="img">
								</span>
                        </div>
                        <h5>Cleaning</h5>
                        <div class="feature-overlay">
                            <img src="frontend/images/service-09.jpg" alt="img">
                        </div>
                    </a>
                </div>
                <div class="col-md-6 col-lg-3">
                    <a href="services/service-details.html" class="feature-box aos" data-aos="fade-up">
                        <div class="feature-icon">
								<span>
									<img src="frontend/images/feature-icon-05.svg" alt="img">
								</span>
                        </div>
                        <h5>Interior</h5>
                        <div class="feature-overlay">
                            <img src="frontend/images/service-07.jpg" alt="img">
                        </div>
                    </a>
                </div>
                <div class="col-md-6 col-lg-3">
                    <a href="services/service-details.html" class="feature-box aos" data-aos="fade-up">
                        <div class="feature-icon">
								<span>
									<img src="frontend/images/feature-icon-06.svg" alt="img">
								</span>
                        </div>
                        <h5>Carpentry</h5>
                        <div class="feature-overlay">
                            <img src="frontend/images/service-03.jpg" alt="img">
                        </div>
                    </a>
                </div>
                <div class="col-md-6 col-lg-3">
                    <a href="services/service-details.html" class="feature-box aos" data-aos="fade-up">
                        <div class="feature-icon">
								<span>
									<img src="frontend/images/feature-icon-07.svg" alt="img">
								</span>
                        </div>
                        <h5>Computer</h5>
                        <div class="feature-overlay">
                            <img src="frontend/images/service-06.jpg" alt="img">
                        </div>
                    </a>
                </div>
                <div class="col-md-6 col-lg-3">
                    <a href="services/service-details.html" class="feature-box aos" data-aos="fade-up">
                        <div class="feature-icon">
								<span>
									<img src="frontend/images/feature-icon-08.svg" alt="img">
								</span>
                        </div>
                        <h5>Plumbing</h5>
                        <div class="feature-overlay">
                            <img src="frontend/images/service-11.jpg" alt="img">
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- /Feature Section -->

    <!-- Service Section -->
        <div id="list-services-by-category" data-route="{{ route('frontend.detail-provider', 123) }}"></div>
    <!-- /Service Section -->

    <!-- Providers Section -->
    <section class="providers-section">
        <div class="container">
            <div class="section-heading">
                <div class="row align-items-center">
                    <div class="col-md-6 aos" data-aos="fade-up">
                        <h2>Top Providers</h2>
                        <p>Meet Our Experts</p>
                    </div>
                    <div class="col-md-6 text-md-end aos" data-aos="fade-up">
                        <a href="provider/providers.html" class="btn btn-primary btn-view">View All<i class="feather-arrow-right-circle"></i></a>
                    </div>
                </div>
            </div>
            <div class="row  aos" data-aos="fade-up">
                <div class="col-lg-3 col-sm-6">
                    <div class="providerset">
                        <div class="providerset-img">
                            <a href="provider/provider-details.html">
                                <img src="frontend/images/provider-11.jpg" alt="img">
                            </a>
                        </div>
                        <div class="providerset-content">
                            <div class="providerset-price">
                                <div class="providerset-name">
                                    <h4><a href="provider/provider-details.html">John Smith</a><i class="fa fa-check-circle" aria-hidden="true"></i></h4>
                                    <span>Electrician</span>
                                </div>
                                <div class="providerset-prices">
                                    <h6>$20.00<span>/hr</span></h6>
                                </div>
                            </div>
                            <div class="provider-rating">
                                <div class="rating">
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fa-solid fa-star-half-stroke filled"></i><span>(320)</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="providerset">
                        <div class="providerset-img">
                            <a href="provider/provider-details.html">
                                <img src="frontend/images/provider-12.jpg" alt="img">
                            </a>
                        </div>
                        <div class="providerset-content">
                            <div class="providerset-price">
                                <div class="providerset-name">
                                    <h4><a href="provider/provider-details.html">Michael</a><i class="fa fa-check-circle" aria-hidden="true"></i></h4>
                                    <span>Carpenter</span>
                                </div>
                                <div class="providerset-prices">
                                    <h6>$50.00<span>/hr</span></h6>
                                </div>
                            </div>
                            <div class="provider-rating">
                                <div class="rating">
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fa-solid fa-star-half-stroke filled"></i><span>(228)</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="providerset">
                        <div class="providerset-img">
                            <a href="provider/provider-details.html">
                                <img src="frontend/images/provider-13.jpg" alt="img">
                            </a>
                        </div>
                        <div class="providerset-content">
                            <div class="providerset-price">
                                <div class="providerset-name">
                                    <h4><a href="provider/provider-details.html">Antoinette</a><i class="fa fa-check-circle" aria-hidden="true"></i></h4>
                                    <span>Cleaner</span>
                                </div>
                                <div class="providerset-prices">
                                    <h6>$25.00<span>/hr</span></h6>
                                </div>
                            </div>
                            <div class="provider-rating">
                                <div class="rating">
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fa-solid fa-star-half-stroke filled"></i><span>(130)</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="providerset">
                        <div class="providerset-img">
                            <a href="provider/provider-details.html">
                                <img src="frontend/images/provider-14.jpg" alt="img">
                            </a>
                        </div>
                        <div class="providerset-content">
                            <div class="providerset-price">
                                <div class="providerset-name">
                                    <h4><a href="provider/provider-details.html">Thompson</a><i class="fa fa-check-circle" aria-hidden="true"></i></h4>
                                    <span>Mechanic</span>
                                </div>
                                <div class="providerset-prices">
                                    <h6>$25.00<span>/hr</span></h6>
                                </div>
                            </div>
                            <div class="provider-rating">
                                <div class="rating">
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fa-solid fa-star-half-stroke filled"></i><span>(95)</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Providers Section -->

    <!-- Work Section -->
    <section class="work-section pt-0">
        <div class="container">
            <div class="row  aos" data-aos="fade-up">
                <div class="col-md-12">
                    <div class="offer-paths">
                        <div class="offer-pathimg">
                            <img src="frontend/images/offer.png" alt="img">
                        </div>
                        <div class="offer-path-content">
                            <h3>We Are Offering 14 Days Free Trial</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore minim veniam, quis nostrud exercitation ullamco magna aliqua. </p>
                            <a href="free-trial.html" class="btn btn-primary btn-views">Try 14 Days Free Trial<i class="feather-arrow-right-circle"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="section-heading aos" data-aos="fade-up">
                        <h2>How It Works</h2>
                        <p>Aliquam lorem ante, dapibus in, viverra quis</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="work-box aos" data-aos="fade-up">
                        <div class="work-icon">
								<span>
									<img src="frontend/images/work-icon.svg" alt="img">
								</span>
                        </div>
                        <h5>Choose What To Do</h5>
                        <p>Lorem ipsum dolor amet, consectetur adipiscing  tempor labore et dolore magna aliqua.</p>
                        <h4>01</h4>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="work-box aos" data-aos="fade-up">
                        <div class="work-icon">
								<span>
									<img src="frontend/images/find-icon.svg" alt="img">
								</span>
                        </div>
                        <h5>Find What You Want</h5>
                        <p>Lorem ipsum dolor amet, consectetur adipiscing  tempor labore et dolore magna aliqua.</p>
                        <h4>02</h4>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="work-box aos" data-aos="fade-up">
                        <div class="work-icon">
								<span>
									<img src="frontend/images/place-icon.svg" alt="img">
								</span>
                        </div>
                        <h5>Amazing Places</h5>
                        <p>Lorem ipsum dolor amet, consectetur adipiscing  tempor labore et dolore magna aliqua.</p>
                        <h4>03</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Work Section -->
    <!-- Client Section -->
    <section class="client-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="section-heading aos" data-aos="fade-up">
                        <h2>What our client says</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur elit</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="owl-carousel testimonial-slider">

                        <div class="client-widget aos" data-aos="fade-up">
                            <div class="client-img">
                                <a href="#">
                                    <img class="img-fluid" alt="Image" src="frontend/images/avatar-01.jpg">
                                </a>
                            </div>
                            <div class="client-content">
                                <div class="rating">
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi </p>
                                <h5>Sophie Moore</h5>
                                <h6>Director</h6>
                            </div>
                        </div>
                        <div class="client-widget aos" data-aos="fade-up">
                            <div class="client-img">
                                <a href="#">
                                    <img class="img-fluid" alt="Image" src="frontend/images/avatar-02.jpg">
                                </a>
                            </div>
                            <div class="client-content">
                                <div class="rating">
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi </p>
                                <h5>Mike Hussy</h5>
                                <h6>Lead</h6>
                            </div>
                        </div>
                        <div class="client-widget aos" data-aos="fade-up">
                            <div class="client-img">
                                <a href="#">
                                    <img class="img-fluid" alt="Image" src="frontend/images/avatar-03.jpg">
                                </a>
                            </div>
                            <div class="client-content">
                                <div class="rating">
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi </p>
                                <h5>John Doe</h5>
                                <h6>CEO</h6>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Client Section -->

    <!-- Blog Section -->
    <section class="blog-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center aos" data-aos="fade-up">
                    <div class="section-heading">
                        <h2>Latest Blog</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur elit</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-between">
                <div class="col-lg-4 col-md-6 d-flex">
                    <div class="blog flex-fill aos" data-aos="fade-up">
                        <div class="blog-image">
                            <a href="blog-details.html"><img class="img-fluid" src="frontend/images/blog-01.jpg" alt="Post Image"></a>
                        </div>
                        <div class="blog-content">
                            <ul class="blog-item">
                                <li><i class="feather-calendar"></i>09 Aug 2023</li>
                                <li>
                                    <div class="post-author">
                                        <a href="#"><i class="feather-user"></i><span>Hal Lewis</span></a>
                                    </div>
                                </li>
                            </ul>
                            <h3 class="blog-title">
                                <a href="blog-details.html">How to Choose a Electrical ServiceProvider?</a>
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 d-flex">
                    <div class="blog flex-fill aos" data-aos="fade-up">
                        <div class="blog-image">
                            <a href="blog-details.html"><img class="img-fluid" src="frontend/images/blog-02.jpg" alt="Post Image"></a>
                        </div>
                        <div class="blog-content">
                            <ul class="blog-item">
                                <li><i class="feather-calendar"></i>09 Aug 2023</li>
                                <li>
                                    <div class="post-author">
                                        <a href="#"><i class="feather-user"></i><span>JohnDoe</span></a>
                                    </div>
                                </li>
                            </ul>
                            <h3 class="blog-title">
                                <a href="blog-details.html">Lorem ipsum dolor sit amet, consectetur adipiscing elit</a>
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 d-flex">
                    <div class="blog flex-fill aos" data-aos="fade-up">
                        <div class="blog-image">
                            <a href="blog-details.html"><img class="img-fluid" src="frontend/images/blog-03.jpg" alt="Post Image"></a>
                        </div>
                        <div class="blog-content">
                            <ul class="blog-item">
                                <li><i class="feather-calendar"></i>09 Aug 2023</li>
                                <li>
                                    <div class="post-author">
                                        <a href="#"><i class="feather-user"></i><span>Greg Avery</span></a>
                                    </div>
                                </li>
                            </ul>
                            <h3 class="blog-title">
                                <a href="blog-details.html">Construction Service Scams: How to Avoid Them</a>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Blog Section -->

    <!-- Partners Section -->
    <section class="blog-section pt-0">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center aos " data-aos="fade-up">
                    <div class="section-heading">
                        <h2>Our Partners</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur elit</p>
                    </div>
                </div>
                <div class="owl-carousel partners-slider aos " data-aos="fade-up">
                    <div class="partner-img">
                        <img src="frontend/images/partner1.svg" alt="img">
                    </div>
                    <div class="partner-img">
                        <img src="frontend/images/partner2.svg" alt="img">
                    </div>
                    <div class="partner-img">
                        <img src="frontend/images/partner3.svg" alt="img">
                    </div>
                    <div class="partner-img">
                        <img src="frontend/images/partner4.svg" alt="img">
                    </div>
                    <div class="partner-img">
                        <img src="frontend/images/partner5.svg" alt="img">
                    </div>
                    <div class="partner-img">
                        <img src="frontend/images/partner6.svg" alt="img">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Partners Section -->

    <!-- App Section -->
    <section class="app-section">
        <div class="container">
            <div class="app-sec">
                <div class="row">
                    <div class="col-lg-6 col-12">
                        <div class="col-md-12">
                            <div class="heading aos" data-aos="fade-up">
                                <h2>Download Our App</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                <h6>Scan the QR code to get the app now</h6>
                                <div class="scan-img">
                                    <img src="frontend/images/scan-img.png" class="img-fluid" alt="img">
                                </div>
                            </div>
                        </div>
                        <div class="downlaod-btn aos" data-aos="fade-up">
                            <a href="javascript:void(0);">
                                <img src="frontend/images/googleplay.svg" alt="img">
                            </a>
                            <a href="javascript:void(0);">
                                <img src="frontend/images/appstore.svg" alt="img">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="appimg-set aos" data-aos="fade-up">
                            <img src="frontend/images/app-img.png" class="img-fluid" alt="img">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /App Section -->

@endsection
