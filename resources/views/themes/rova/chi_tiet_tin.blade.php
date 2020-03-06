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
                        window.AdvSlides = [{"Id":732,"ShopId":263,"AdvType":2,"AdvTypeName":"Chạy ngang","Name":"1",
                            "Image":"{{ asset('theme/beptu/Uploads/shop263/images/adv1.jpg')}}",
                            "ImageThumbnai":"{{ asset('theme/beptu/Uploads/shop263/_thumbs/images/adv1.jpg')}}",
                            "Link":"#","IsVideo":false,"Index":1,"Inactive":false,"Timestamp":"AAAAAAAWfP4="},
                            {"Id":733,"ShopId":263,"AdvType":2,"AdvTypeName":"Chạy ngang","Name":"2",
                                "Image":"{{ asset('theme/beptu/Uploads/shop263/images/adv2.jpg')}}",
                                "ImageThumbnai":"{{ asset('theme/beptu/Uploads/shop263/_thumbs/images/adv2.jpg')}}","Link":"#","IsVideo":false,
                                "Index":2,"Inactive":false,"Timestamp":"AAAAAAAWfP8="},
                            {"Id":734,"ShopId":263,"AdvType":2,
                                "AdvTypeName":"Chạy ngang","Name":"3",
                                "Image":"{{ asset('theme/beptu/Uploads/shop263/images/adv3.png')}}",
                                "ImageThumbnai":"{{ asset('theme/beptu/Uploads/shop263/_thumbs/images/adv3.png')}}","Link":"#","IsVideo":false,
                                "Index":3,"Inactive":false,"Timestamp":"AAAAAAAWfQE="},
                            {"Id":735,"ShopId":263,"AdvType":2,"AdvTypeName":"Chạy ngang","Name":"4",
                                "Image":"{{ asset('theme/beptu/Uploads/shop263/images/adv4.png')}}",
                                "ImageThumbnai":"{{ asset('theme/beptu/Uploads/shop263/_thumbs/images/adv4.png')}}",
                                "Link":"#","IsVideo":false,"Index":4,"Inactive":false,"Timestamp":"AAAAAAAWfQI="}];
                    </script>
                    <link href="{{ asset('theme/beptu/Scripts/owl-carousel/owl.carousel.css') }}" rel="stylesheet" />
                    <link href="{{ asset('theme/beptu/Scripts/owl-carousel/owl.theme.css') }}" rel="stylesheet" />
                    <script src="{{ asset('theme/beptu/Scripts/owl-carousel/owl.carousel.min.js') }}"></script>
                    <script src="{{ asset('theme/beptu/app/services/productServices.js') }}"></script>
                    <script src="{{ asset('theme/beptu/app/controllers/productController.js') }}"></script>
                    <!--Begin-->
                  
                    <script type="text/javascript">
                        $(document).ready(function () {
                            var owlproductslide2 = $("#product-new-slide");
                            owlproductslide2.owlCarousel({
                                autoPlay: true,
                                autoPlay: 5000,
                                items: 4,
                                slideSpeed: 1000,
                                pagination: false,
                                itemsDesktop: [1200, 4],
                                itemsDesktopSmall: [980, 3],
                                itemsTablet: [767, 2],
                                itemsMobile: [480, 1]
                            });
                            $(".product-slide .nextlogo").click(function () {
                                owlproductslide2.trigger('owl.next');
                            })
                            $(".product-slide .prevlogo").click(function () {
                                owlproductslide2.trigger('owl.prev');
                            })
                        });
                    </script>
                    <!--End-->
                    <script type="text/javascript">
                        window.ProductNewSlides = [{"Id":8556,"ShopId":263,"ProductGroupId":null,
                            "ProductGroupCode":null,"ProductGroupName":null,"ProductTypeId":null,
                            "ProductTypeName":null,"UnitId":null,"UnitName":null,"Code":"nissan-navara-np300",
                            "Serial":"","Name":"Nissan Navara Np300","CreatedDate":"2016-02-14T23:22:00",
                            "UpdatedDate":"2016-02-14T23:22:00","DealDate":"0001-01-01T00:00:00",
                            "SKU":"","Barcode":"","Image":"{{ asset('theme/beptu/Uploads/shop263/images/product.png')}}",
                            "ImageThumbnai":"{{ asset('theme/beptu/Uploads/shop263/_thumbs/images/product.png')}}","Summary":"",
                            "Content":null,"MetaTitle":"","MetaKeyword":"","MetaDescription":"",
                            "Price":2000000000.0000,"StrPrice":"2.000.000.000","PriceOld":0.0000,
                            "StrPriceOld":"0","PriceDiscount":0.0000,"StrDiscountPrice":"0","PricePriority":0.0000,
                            "StrPricePriority":"0","PriceHasVAT":false,"Percent":0.0,"StrPercent":"0","IsTrackingInventory":false,
                            "Quantity":0,"VariantQuantity":0,"VariantCount":0,"TrackingInventoryText":"---","Weight":0,
                            "IsShipping":true,"AllowPurchaseWhenSoldOut":false,"IsVariant":false,"IsBest":true,
                            "IsHot":true,"IsNew":true,"IsPromotion":false,"PromotionContent":null,"Warranty":null,
                            "AllowOrder":false,"ShowHome":false,"CountView":0,"Index":0,"Inactive":false,
                            "Timestamp":"AAAAAAAWfQM=","ModelShared_ProductImage":null,"ModelShared_ProductTab":null,
                            "ModelShared_ProductTag":null,"ModelShared_ProductOption":null,"ModelShared_ProductVariant":null,
                            "ModelShared_ProductOtherGroup":null},{"Id":8557,"ShopId":263,"ProductGroupId":null,
                            "ProductGroupCode":null,"ProductGroupName":null,"ProductTypeId":null,"ProductTypeName":null,
                            "UnitId":null,"UnitName":null,"Code":"ford-escape","Serial":"","Name":"Ford Escape",
                            "CreatedDate":"2016-02-14T23:32:00","UpdatedDate":"2016-02-14T23:32:00",
                            "DealDate":"0001-01-01T00:00:00","SKU":"","Barcode":"",
                            "Image":"{{ asset('theme/beptu/Uploads/shop263/images/product1.png')}}",
                            "ImageThumbnai":"{{ asset('theme/beptu/Uploads/shop263/_thumbs/images/product1.png') }}",
                            "Summary":"","Content":null,"MetaTitle":"","MetaKeyword":"",
                            "MetaDescription":"","Price":15000000.0000,"StrPrice":"15.000.000",
                            "PriceOld":0.0000,"StrPriceOld":"0","PriceDiscount":20000000.0000,
                            "StrDiscountPrice":"20.000.000","PricePriority":0.0000,"StrPricePriority":"0",
                            "PriceHasVAT":false,"Percent":0.0,"StrPercent":"0","IsTrackingInventory":false,
                            "Quantity":0,"VariantQuantity":0,"VariantCount":0,"TrackingInventoryText":"---",
                            "Weight":0,"IsShipping":true,"AllowPurchaseWhenSoldOut":false,"IsVariant":false,
                            "IsBest":true,"IsHot":true,"IsNew":true,"IsPromotion":true,"PromotionContent":null,
                            "Warranty":null,"AllowOrder":false,"ShowHome":false,"CountView":0,"Index":0,"Inactive":false,
                            "Timestamp":"AAAAAAAWfRY=","ModelShared_ProductImage":null,"ModelShared_ProductTab":null,
                            "ModelShared_ProductTag":null,"ModelShared_ProductOption":null,"ModelShared_ProductVariant":null,
                            "ModelShared_ProductOtherGroup":null},{"Id":8561,"ShopId":263,"ProductGroupId":null,"ProductGroupCode":null,
                            "ProductGroupName":null,"ProductTypeId":null,"ProductTypeName":null,"UnitId":null,
                            "UnitName":null,"Code":"bmw-520i","Serial":"","Name":"Bmw 520i","CreatedDate":"2016-02-14T23:43:00",
                            "UpdatedDate":"2016-02-14T23:43:00","DealDate":"0001-01-01T00:00:00","SKU":"","Barcode":"",
                            "Image":"Uploads/shop263/images/product6.png",
                            "ImageThumbnai":"Uploads/shop263/_thumbs/images/product6.png","Summary":"",
                            "Content":null,"MetaTitle":"","MetaKeyword":"","MetaDescription":"",
                            "Price":2100000.0000,"StrPrice":"2.100.000","PriceOld":0.0000,"StrPriceOld":"0",
                            "PriceDiscount":0.0000,"StrDiscountPrice":"0","PricePriority":0.0000,"StrPricePriority":"0",
                            "PriceHasVAT":false,"Percent":0.0,"StrPercent":"0","IsTrackingInventory":false,
                            "Quantity":0,"VariantQuantity":0,"VariantCount":0,"TrackingInventoryText":"---","Weight":0,
                            "IsShipping":true,"AllowPurchaseWhenSoldOut":false,"IsVariant":false,"IsBest":true,"IsHot":true,
                            "IsNew":true,"IsPromotion":false,"PromotionContent":null,"Warranty":null,"AllowOrder":false,
                            "ShowHome":false,"CountView":0,"Index":4,"Inactive":false,"Timestamp":"AAAAAAAWfU0=",
                            "ModelShared_ProductImage":null,"ModelShared_ProductTab":null,"ModelShared_ProductTag":null,
                            "ModelShared_ProductOption":null,"ModelShared_ProductVariant":null,"ModelShared_ProductOtherGroup":null},
                            {"Id":8562,"ShopId":263,"ProductGroupId":null,"ProductGroupCode":null,
                                "ProductGroupName":null,"ProductTypeId":null,"ProductTypeName":null,
                                "UnitId":null,"UnitName":null,"Code":"audi-q7","Serial":"",
                                "Name":"Audi Q7","CreatedDate":"2016-02-14T23:45:00",
                                "UpdatedDate":"2016-02-14T23:45:00","DealDate":"0001-01-01T00:00:00",
                                "SKU":"","Barcode":"","Image":"Uploads/shop263/images/product7.png",
                                "ImageThumbnai":"Uploads/shop263/_thumbs/images/product7.png",
                                "Summary":"","Content":null,"MetaTitle":"","MetaKeyword":"",
                                "MetaDescription":"","Price":2500000.0000,"StrPrice":"2.500.000",
                                "PriceOld":0.0000,"StrPriceOld":"0","PriceDiscount":0.0000,
                                "StrDiscountPrice":"0","PricePriority":0.0000,"StrPricePriority":"0",
                                "PriceHasVAT":false,"Percent":0.0,"StrPercent":"0","IsTrackingInventory":false,
                                "Quantity":0,"VariantQuantity":0,"VariantCount":0,"TrackingInventoryText":"---",
                                "Weight":0,"IsShipping":true,"AllowPurchaseWhenSoldOut":false,"IsVariant":false,
                                "IsBest":true,"IsHot":true,"IsNew":true,"IsPromotion":false,"PromotionContent":null,
                                "Warranty":null,"AllowOrder":false,"ShowHome":false,"CountView":0,"Index":5,"Inactive":false,
                                "Timestamp":"AAAAAAAWfSo=","ModelShared_ProductImage":null,"ModelShared_ProductTab":null,
                                "ModelShared_ProductTag":null,"ModelShared_ProductOption":null,"ModelShared_ProductVariant":null,
                                "ModelShared_ProductOtherGroup":null},{"Id":8563,"ShopId":263,"ProductGroupId":null,
                                "ProductGroupCode":null,"ProductGroupName":null,"ProductTypeId":null,
                                "ProductTypeName":null,"UnitId":null,"UnitName":null,"Code":"mercedes-gle-class",
                                "Serial":"","Name":"Mercedes GLE - Class","CreatedDate":"2016-02-14T23:45:00",
                                "UpdatedDate":"2016-02-14T23:45:00","DealDate":"0001-01-01T00:00:00","SKU":"","Barcode":"",
                                "Image":"Uploads/shop263/images/product8.png","ImageThumbnai":"Uploads/shop263/_thumbs/images/product8.png",
                                "Summary":"","Content":null,"MetaTitle":"","MetaKeyword":"","MetaDescription":"","Price":1800000.0000,
                                "StrPrice":"1.800.000","PriceOld":0.0000,"StrPriceOld":"0","PriceDiscount":2000000.0000,
                                "StrDiscountPrice":"2.000.000","PricePriority":0.0000,"StrPricePriority":"0",
                                "PriceHasVAT":false,"Percent":0.0,"StrPercent":"0","IsTrackingInventory":false,
                                "Quantity":0,"VariantQuantity":0,"VariantCount":0,"TrackingInventoryText":"---",
                                "Weight":0,"IsShipping":true,"AllowPurchaseWhenSoldOut":false,"IsVariant":false,
                                "IsBest":true,"IsHot":true,"IsNew":true,"IsPromotion":true,"PromotionContent":null,
                                "Warranty":null,"AllowOrder":false,"ShowHome":false,"CountView":0,"Index":6,
                                "Inactive":false,"Timestamp":"AAAAAAAWfS4=","ModelShared_ProductImage":null,
                                "ModelShared_ProductTab":null,"ModelShared_ProductTag":null,
                                "ModelShared_ProductOption":null,"ModelShared_ProductVariant":null,
                                "ModelShared_ProductOtherGroup":null}];
                    </script>
                </div>
            </div>
        </div>
    </div>


 <div class="main">
        <div class="container">
            <div class="row">
                    <div class="col-md-3">

<div class="menu-news">
    
</div>

<div class="box-news">
    <h3>
        <span>
            Tin tức nổi bật
        </span>
    </h3>
    <div class="news-content">
        <div class=" news-block clearfix">
            @foreach($tin_noi_bat as $key=>$tin)
                <div class="news-item clearfix">
                    <div class="col-md-4 col-sm-4 col-xs-4 image"><a href="{{ $tin->id }}" ><img class="img-responsive" src="{{ $tin->image }}" alt="" /></a></div>
                    <div class="col-md-8 col-sm-8 col-xs-8 news-info ">
                        <h2 class="name"><a href="{{ $tin->id }}" >{{ $tin->des }}</a></h2>
                        
                    </div>
                </div>
         @endforeach   
        </div>
    </div>
</div>
                    </div>
                    <div class="col-md-9">

<div class="breadcrumb clearfix">
    <ul>
                    <li itemtype="http://data-vocabulary.org/Breadcrumb" itemscope="" class="home">
                        <a title="Đến trang chủ" href="/"  itemprop="url"><span itemprop="title">Trang chủ</span></a>
                    </li>
                    <li class="icon-li"><strong> {{$data->title}}</strong> </li>
    </ul>
</div>
<script type="text/javascript">
    $(".link-site-more").hover(function () { $(this).find(".s-c-n").show(); }, function () { $(this).find(".s-c-n").hide(); });
</script>

<div class="news-detail">
    <div class="news-block">
        <h1>{{ $data->title }}</h1>
        <div class="date">{{ $data->created_at }}</div>
        <div class="content">
           {!! $data->content !!}
        </div>
        <div class="social-group">
<!-- AddThis Button BEGIN -->
<div class="addthis_toolbox addthis_default_style">
<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>


<a class="addthis_button_google_plusone" g:plusone:size="medium"></a>
<a class="addthis_counter addthis_pill_style addthis_nonzero"></a>
</div>
<script type="text/javascript" src="addthis_widget.js#pubid=ra-5334d6387b03b532" tppabs="http://runecom40.runtime.vn/scripts/addthis/addthis_widget.js#pubid=ra-5334d6387b03b532"></script>
<!-- AddThis Button END -->        </div>
    </div>
    
</div>
                    </div>
            </div>
        </div>
    </div>


  @include('themes.rova.giao_dien.footer')
</div>



<div style="display: none;" id="loading-mask">
    <div id="loading_mask_loader" class="loader">
        <img alt="Loading..." src="Images/ajax-loader-main.gif" />
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

