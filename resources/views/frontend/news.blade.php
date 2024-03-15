@extends('layouts.frontend')
@section('content')
    <!-- Breadcrumb -->
    <div class="breadcrumb-bar">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-12">
                    <h2 class="breadcrumb-title">Our Blog</h2>
                    <nav aria-label="breadcrumb" class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item" aria-current="page">Blog</li>
                            <li class="breadcrumb-item active" aria-current="page">Blog Details</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- /Breadcrumb -->

    <div class="content">
        <div class="container">

            <div class="row">
                <div class="col-lg-12 col-md-12 blog-details">

                    <div class="blog-head">
                        <div class="blog-category">
                            <ul>
                                <li><span class="cat-blog">Construction</span></li>
                            </ul>
                        </div>
                        <h3>Lorem ipsum dolor sit amet, eiusmod tempor ut labore et dolore
                            magna aliqua. </h3>
                        <div class="blog-category sin-post">
                            <ul>images
                                <li><i class="feather-calendar me-1"></i>28 Sep 2023</li>
                                <li>
                                    <div class="post-author">
                                        <a href="#"><img src="/frontend/images/avatar-02.jpg" alt="Post Author"><span>Admin</span></a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Blog Post -->
                    <div class="blog blog-list">
                        <div class="blog-image">
                            <a href="blog-details.html"><img class="img-fluid" src="/frontend/images/blog-04.jpg" alt="Post Image"></a>
                        </div>
                        <div class="blog-content">
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>
                            <p class="test-info">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>
                        </div>
                    </div>
                    <!-- /Blog Post -->

                    <div class="social-widget blog-review">
                        <h4>Tags</h4>
                        <div class="ad-widget">
                            <ul>
                                <li>
                                    <a href="javascript:void(0);">Construction</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">Car Wash</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">Appliance</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">Interior</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">Carpentry</a>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
