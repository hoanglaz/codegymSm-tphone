<?php
$logo = \App\Entities\Course::all();
?>
<div class="header">
        <section class="top-link clearfix">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="nav navbar-nav topmenu-contact pull-left">
                            <li><i class="fa fa-phone"></i> <span>Hotline:0908 77 00 95</span></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right topmenu  hidden-xs hidden-sm">
                            <li class="order-check"><a href="kiem-tra-don-hang.html"><i class="fa fa-pencil-square-o"></i> Kiểm tra đơn hàng</a></li>
                            <li class="order-cart"><a href="gio-hang.html"><i class="fa fa-shopping-cart"></i> Giỏ hàng</a></li>
                            <li class="account-login"><a href="dang-nhap.html"><i class="fa fa-sign-in"></i> Đăng nhập </a></li>
                            <li class="account-register"><a href="dang-ky.html"><i class="fa fa-key"></i> Đăng ký </a></li>
                        </ul>
                        <div class="show-mobile hidden-lg hidden-md">
                            <div class="quick-user">
                                <div class="quickaccess-toggle">
                                    <i class="fa fa-user"></i>
                                </div>
                                <div class="inner-toggle">
                                    <ul class="login links">
                                        <li>
                                            <a href="dang-ky.html"><i class="fa fa-sign-in"></i> Đăng ký</a>
                                        </li>
                                        <li>
                                            <a href="dang-nhap.html"><i class="fa fa-key"></i> Đăng nhập</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="quick-access">
                                <div class="quickaccess-toggle">
                                    <i class="fa fa-list"></i>
                                </div>
                                <div class="inner-toggle">
                                    <ul class="links">
                                        <li><a id="mobile-wishlist-total" href="kiem-tra-don-hang.html" class="wishlist"><i class="fa fa-pencil-square-o"></i> Kiểm tra đơn hàng</a></li>
                                        <li><a href="gio-hang.html" class="shoppingcart"><i class="fa fa-shopping-cart"></i> Giỏ hàng</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    
        <section class="navigation-menu clearfix">
            <div class="container">
                <div class="row">
                    <div class="col-md-2">
                        <a href="index.html"> <img src="{{ asset('theme/beptu/Uploads/shop263/images/logo.png') }}" class="img-responsive"></a>
                    </div>
                    <div class="col-md-10 ">
                        <nav class="navbar nav-menu">
                            <div class="navbar-header">
                                <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#mobile-menu" aria-controls="mobile-menu" aria-expanded="false">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                            <nav id="mobile-menu" class="mobile-menu collapse navbar-collapse">
                                <ul class='menu nav navbar-nav'><li class="level0"><a class='' href='/'><span>Trang chủ</span></a></li>
                                    <li class="level0"><a class='' href="{{ Route('web.about.us') }}"><span>Giới thiệu</span></a></li>
                                    <!-- <li class="level0"><a class='' href='san-pham.html'><span>Sản phẩm</span></a></li> -->
                                    <li class="level0"><a class='' href="{{ Route('web.blog') }}"><span>Chiến lược kinh doanh</span></a></li>
                                    <li class="level0"><a class='' href="{{ Route('web.phat_phap') }}"><span>Áp dụng phật pháp</span></a></li>
                                    <li class="level0"><a class='' href="{{ Route('web.client') }}"><span>Chương trình khuyến mãi</span></a></li>
                                    <li class="level0"><a class='' href="{{ Route('web.tri_an') }}"><span>Tri ân khách hàng</span></a></li>
                                </ul >
                            </nav>
                        </nav>
                    </div>
                </div>
            </div>

        </section>
        <script type="text/javascript">
            $(document).ready(function () {
                var str = location.href.toLowerCase();
                $("ul.menu li a").each(function () {
                    if (str.indexOf(this.href.toLowerCase()) >= 0) {
                        $("ul.menu li").removeClass("active");
                        $(this).parent().addClass("active");
                    }
                });
            });
        </script>

        <script src="{{ asset('theme/beptu/app/services/moduleServices.js') }}"></script>
        <script src="{{ asset('theme/beptu/app/controllers/moduleController.js') }}"></script>
        <!--Begin-->
        <link href="{{ asset('theme/beptu/Scripts/flexSlider/flexslider.css') }}" rel="stylesheet" type="text/css" />
        <script src="{{ asset('theme/beptu/Scripts/flexSlider/jquery.flexslider-min.js') }}" type="text/javascript"></script>
        <div class="flexslider slideshow-content" id="bannerheaderhome" >
            <ul class="slides">
            @foreach($logo as $key=>$val)
                <li>
                    <a title="item.Name" href="notfoundfba4.html">
                        <img style="width: 1349px;height: 421px;" alt="ok1" ng-src="{{$val->image }}" />
                    </a>
                </li>
            @endforeach
            </ul>
        </div>
        <script type="text/javascript">
            $(document).ready(function () {
                $('#bannerheaderhome').flexslider({
                    directionNav: true,
                    controlNav: false,
                    animation: "slide",
                    itemHeigh: 270,
                    itemMargin: 0,
                    animationSpeed: 700,
                    slideshowSpeed: 3000
                });
            });
        </script>
        <!--End-->
    
    </div>