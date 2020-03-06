<!DOCTYPE html>
<html class="no-js" lang="vi">

<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
@include('themes.rova.giao_dien.head')
<body ng-app="appMain" style="">

<div class="wrapper page-home">
@include('themes.rova.giao_dien.header')

    <div class="adv">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <link href="{{ asset('theme/beptu/Scripts/owl-carousel/owl.carousel.css') }}" rel="stylesheet" />
                    <link href="{{ asset('theme/beptu/Scripts/owl-carousel/owl.theme.css') }}" rel="stylesheet" />
                    <script src="{{ asset('theme/beptu/Scripts/owl-carousel/owl.carousel.min.js') }}"></script>
                    <script src="{{ asset('theme/beptu/app/services/moduleServices.js') }}"></script>
                    <script src="{{ asset('theme/beptu/app/controllers/moduleController.js') }}"></script>
                    <!--Begin-->
                    <div class="adv-content row" ng-controller="moduleController" ng-init="initAdvSlideController('AdvSlides')">
                        <div class="owl-carousel">
                            <ul id="adv-content">
                                @foreach($posts as $key => $val)
                                <li ng-repeat="item in AdvSlides">
                                    <a href="notfoundfba4.html">
                                        <img ng-src="{{ asset('theme/beptu/Uploads/shop263/images/adv1.jpg')}}" alt="{{$val->title}}" class="img-responsive" /></a>
                                </li>
                                @endforeach
                            </ul>
                            <div class="controls boxprevnext">
                                <a class="prev prevlogo"><i class="fa fa-angle-left"></i></a>
                                <a class="next nextlogo"><i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <script type="text/javascript">
                        $(document).ready(function () {
                            var owladv = $(".adv-content ul");
                            owladv.owlCarousel({
                                autoPlay: true,
                                autoPlay: 5000,
                                items: 3,
                                slideSpeed: 1000,
                                pagination: false,
                                itemsDesktop: [1200, 3],
                                itemsDesktopSmall: [980, 3],
                                itemsTablet: [767, 1],
                                itemsMobile: [480, 1]
                            });
                            $(".adv-content .nextlogo").click(function () {
                                owladv.trigger('owl.next');
                            })
                            $(".adv-content .prevlogo").click(function () {
                                owladv.trigger('owl.prev');
                            })
                        });
                    </script>
                    <!--End-->
                    <script type="text/javascript">
                        window.AdvSlides = [
                            @foreach($posts as $key => $val)
                            {"Id":752,"ShopId":263,"AdvType":2,"AdvTypeName":"Chạy ngang","Name":"1",
                            "Image":"{{ asset('theme/beptu/Uploads/shop263/images/adv1.jpg')}}",
                            "ImageThumbnai":"{{ asset('theme/beptu/Uploads/shop263/_thumbs/images/adv1.jpg')}}",
                            "Link":"#","IsVideo":false,"Index":1,"Inactive":false,"Timestamp":"AAAAAAAWfP4="},
                            @endforeach

                                ];
                    </script>

                </div>
            </div>
        </div>
    </div>


    <div class="main">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <section class="product-content clearfix">
                        <h1 class="title clearfix"><span>Sản phẩm Mới</span></h1>
                        <div class="product-block product-grid row clearfix">
                            @foreach($news as $key => $val)
                                <div class="col-md-3 col-sm-3 col-xs-12 product-resize product-item-box">
                                    <div class="product-item">
                                        <div class="image image-resize">
                                            <a href="{{ route('web.product',$val->url) }}" title="Ford Escape">
                                                <img src="{{ asset($val->image)}}" class="img-responsive" />
                                            </a>
                                            <span class="promotion">Hot</span>
                                        </div>
                                        <div class="right-block">
                                            <div class="price">
                                                <span class="price-new">{{ $val->price_pre }}</span>
                                                <span class="price-old">{{ $val->price }}</span>
                                            </div>
                                            <h2 class="name">
                                                <a href="{{ route('web.product',$val->url) }}" title="Ford Escape">{{ $val->title }}</a>
                                                <span class="caret-name"></span>
                                            </h2>
                                            <div class="ratings clearfix">
                                                <div class="rating-box">
                                                    <div class="rating">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="addtocart-button clearfix">
                                                <a class="add-to-cart" href="javascript:void(0)" onclick="AddToCard(8557,1)">Mua<i class="fa fa-angle-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </section>
                    <div class="box-html">
                        <div class="static-banner clearfix">
                            <a class="image clearfix" href="#">
                                <img src="{{ asset('theme/beptu/Uploads/shop263/images/article/banner_menu-15216501.png') }}"  class="img-responsive">
                            </a>
                        </div>
                    </div>
                    <section class="product-content clearfix">
                        <h1 class="title clearfix"><span>Sản phẩm</span></h1>
                        <nav class="navbar navbar-default product-filter">
                            <ul class="display">
                                <li id="grid" class="active grid"><a href="#" title="Grid"><i class="fa fa-th-large"></i></a></li>
                                <li id="list" class="list"><a href="#" title="List"><i class="fa fa-th-list"></i></a></li>
                            </ul>
                            <div class="limit">
                                <span>Sản phẩm/trang</span>
                                <select id="lblimit" name="lblimit" class="nb_item" onchange="window.location.href = this.options[this.selectedIndex].value">
                                    <option value="?limit=10">10</option>
                                    <option selected="selected" value="?limit=12">12</option>
                                    <option value="?limit=20">20</option>
                                    <option value="?limit=50">50</option>
                                    <option value="?limit=100">100</option>
                                    <option value="?limit=250">250</option>
                                    <option value="?limit=500">500</option>
                                </select>
                            </div>
                            <div class="sort">
                                <span>Sắp xếp</span>
                                <select class="selectProductSort" id="lbsort" onchange="window.location.href = this.options[this.selectedIndex].value">
                                    <option selected="selected" value="?sort=index&amp;order=asc">Mặc định</option>
                                    <option value="?sort=price&amp;order=asc">Gi&#225; tăng dần</option>
                                    <option value="?sort=price&amp;order=desc">Gi&#225; giảm dần</option>
                                    <option value="?sort=name&amp;order=asc">T&#234;n sản phẩm: A to Z</option>
                                    <option value="?sort=name&amp;order=desc">T&#234;n sản phẩm: Z to A</option>
                                </select>
                            </div>
                        </nav>
                        <div class="product-block product-grid row clearfix">
                            @foreach($news as $key => $val)
                            <div class="col-md-3 col-sm-3 col-xs-12 product-resize product-item-box">
                                <div class="product-item">
                                    <div class="image image-resize">
                                        <a href="{{ route('web.product',$val->url) }}" title="Ford Escape">
                                            <img src="{{ asset($val->image)}}" class="img-responsive" />
                                        </a>
                                    </div>
                                    <div class="right-block">
                                        <div class="price">
                                            <span class="price-new">{{ $val->price_pre }}</span>
                                            <span class="price-old">{{ $val->price }}</span>
                                        </div>
                                        <h2 class="name">
                                            <a href="{{ route('web.product',$val->url) }}" title="Ford Escape">Ford Escape</a>
                                            <span class="caret-name"></span>
                                        </h2>
                                        <div class="ratings clearfix">
                                            <div class="rating-box">
                                                <div class="rating">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="addtocart-button clearfix">
                                            <a class="add-to-cart" href="javascript:void(0)" onclick="AddToCard(8557,1)">Mua<i class="fa fa-angle-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          @endforeach
                        </div>
                    </section>
                    <!--Template--
                    --End-->
                </div>
            </div>
        </div>
    </div>


  @include('themes.rova.giao_dien.footer')
</div>



<div style="display: none;" id="loading-mask">
    <div id="loading_mask_loader" class="loader">
        <img alt="Loading..." src="{{ asset('theme/beptu/Images/ajax-loader-main.gif    ') }}" />
        <div>
            Please wait...
        </div>
    </div>
</div>
<a class="back-to-top" href="#" style="display: inline;">
    <i class="fa fa-angle-up">
    </i>
</a>


</body>


</html>
<script type="text/javascript">
    $(".header-content").css({ "background": '' });
    $("html").addClass('');
    $(document).ready(function () {
        $("img.lazy-img").each(function () {

        });
        $("img.lazy-img").lazyload({
            effect: "fadeIn",
            threshold: 200
        });
    });
</script>

