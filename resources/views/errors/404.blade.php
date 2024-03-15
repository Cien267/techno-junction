400
@extends('layouts.frontend')
@section('content')
    <div id="siteContent">
        <div class="container">
            <div class="ht-mgt24" id="content-news-detail">
                <div class="col-md-9 col-xs-12 ct-news-mo">
                    <div class="ht-article-card ht-card pl-news-detail" style="text-align: center; ">
                        <image src="/frontend/img/404_img_092018.png"/>
                        <p style="font-weight: 500;margin-top: 30px">Truy cập của bạn có thể bị lỗi hoặc không tìm thấy nội dung</p>
                    </div>
                </div>
                <div class="col-md-3 col-xs-12 ht-news-leftct">
                    <div class="sliderbar-detail-news">
                        <div class="inner_title">
                            <h2 class="h2">
                                <span>danh mục tin</span>
                            </h2>
                            <span class="number"><img src="data:image/webp;base64,UklGRjwAAABXRUJQVlA4IDAAAACwAwCdASp1AAIAPm0ylkgkIqIhKBgIAIANiWkAAB8SGIWe68xdgAD+8qEchoAAAAA=" data-pagespeed-url-hash="2590301373" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"></span>
                        </div>
                        <div class="sidebar-list-cate">
                            <ul class="sidebar-category-list list-unstyled">
                                <?php
                                if(!empty($list_category___)){
                                foreach ($list_category___ as $category){ ?>
                                <li class="active">
                                    <i class="fa fa-angle-right"></i><a style="display: unset;" href="<?php echo '/category/'.$category['slug'];?>"><?php echo $category['name'];?>	</a>
                                    <?php if(!empty($category['childs'])){ ?>
                                    <ul class="sidebar-category-list list-unstyled">
                                        <a style="display: unset;" href="<?php echo '/category/'.$category['slug'];?>"></a>
                                        <?php foreach ($category['childs'] as $child){?>
                                        <li class="active">
                                            <a style="display: unset;" href="<?php echo '/category/'.$child['slug'];?>"><i class="fa fa-angle-right"></i></a><a href="<?php echo '/category/'.$child['slug'];?>"><?php echo $child['name'];?></a>
                                        </li>
                                        <?php }?>
                                    </ul>
                                    <?php } ?>
                                </li>
                                <?php    }
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xs-12 ht-left-2">
                        <div class="inner_title text-left">
                            <h2 class="h2">
                                <span>Bài viết mới nhất</span>
                            </h2>
                            <span class="number"><img src="data:image/webp;base64,UklGRjwAAABXRUJQVlA4IDAAAACwAwCdASp1AAIAPm0ylkgkIqIhKBgIAIANiWkAAB8SGIWe68xdgAD+8qEchoAAAAA="></span>
                        </div>
                        <div class="col-xs-12 sidebar-content">
                            <ul class="sidebar-news-list list-unstyled">
                                <?php
                                if(!empty($list_new_notice___)){
                                    foreach ($list_new_notice___ as $notice){
                                        echo '<li style="margin-bottom: 15px">
                                            <a href="/view/'.$notice->slug.'" class="news-thumb">
                                                <img src="'.$notice->image.'" style="background-image: url('.$notice->image.');"></a>
                                            <div class="news-detail">
                                                <h4 class="news-title"><a href="/view/'.$notice->slug.'" class="new-title">'.$notice->title.'</a></h4>
                                                    <div class="news-meta ht-oneline">
                                                        <span><i class="fa fa-clock icon1" aria-hidden="true"></i> '.date("d/m/Y", strtotime($notice->created_at)).'</span>
                                                        <span><i class="fa fa-eye icon1"></i> '.$notice->views.'</span>
                                                    </div>
                                            </div>
                                        </li>';
                                    }
                                }
                                ?>
                            </ul>
                        </div>
                        <div class="text-center">
                            <a href="/new-notice" class="btn ht-btn-green btn-cmt btn-new-left">Xem nhiều hơn <i class="fa fa-caret-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
