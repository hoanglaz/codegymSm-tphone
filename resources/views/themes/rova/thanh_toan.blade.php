<!DOCTYPE html>
<html class="no-js" lang="vi">
@include('themes.rova.giao_dien.head')
<body ng-app="appMain" style="">
        <div id="fb-root"></div>
        <script>
            (function (d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s); js.id = id;
                js.src = "sdk.js#xfbml=1&version=v2.6&appId=227481454296289"/*tpa=http://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.6&appId=227481454296289*/;
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
        </script>
    

<div class="wrapper">
    
@include('themes.rova.giao_dien.header')


    

    

    
    <div class="main">
        <div class="container">
            <div class="row">
                    <div class="col-md-12">

<div class="breadcrumb clearfix">
    <ul>
                    <li itemtype="http://data-vocabulary.org/Breadcrumb" itemscope="" class="home">
                        <a title="Đến trang chủ" href="index.htm" tppabs="http://runecom40.runtime.vn/" itemprop="url"><span itemprop="title">Trang chủ</span></a>
                    </li>
                    <li class="icon-li"><strong>Thanh toán</strong> </li>
    </ul>
</div>
<script type="text/javascript">
    $(".link-site-more").hover(function () { $(this).find(".s-c-n").show(); }, function () { $(this).find(".s-c-n").hide(); });
</script>
<script src="orderServices.js" tppabs="{{ asset('theme/beptu/app/services/orderServices.js') }}"></script>
<script src="orderController.js" tppabs="{{ asset('theme/beptu/app/controllers/orderController.js') }}"></script>
<div class="payment-content" >
    <h1 class="title"><span>Thanh toán</span></h1>
    <div class="steps clearfix">
        <ul class="clearfix">
            <li class="cart active col-md-2 col-xs-12 col-sm-4 col-md-offset-3 col-sm-offset-0 col-xs-offset-0"><span><i class="glyphicon glyphicon-shopping-cart"></i></span><span>Giỏ hàng của tôi</span><span class="step-number"><a>1</a></span></li>
            <li class="payment active col-md-2 col-xs-12 col-sm-4"><span><i class="glyphicon glyphicon-usd"></i></span><span>Thanh toán</span><span class="step-number"><a>2</a></span></li>
            <li class="finish col-md-2 col-xs-12 col-sm-4"><span><i class="glyphicon glyphicon-ok"></i></span><span>Hoàn tất</span><span class="step-number"><a>3</a></span></li>
        </ul>
    </div>
    <div class="payment-title text-center hidden">
        <h3>
            GIAO HÀNG TOÀN QUỐC - THANH TOÁN KHI NHẬN HÀNG - 15 NGÀY ĐỔI TRẢ MIỄN PHÍ
        </h3>
        <div>
            Nếu gặp khó khăn trong việc đặt hàng xin hãy gọi<b class="hotline"> 0908 77 00 95 </b>
            để được hỗ trợ tốt nhất.
        </div>
    </div>
    <form class="payment-block clearfix" id="checkout-container" ng-submit="checkout()">
        <div class="col-md-4 col-sm-12 col-xs-12 payment-step step2">
            <h4>1. Địa chỉ thanh toán và giao hàng</h4>
            <div class="step-preview clearfix">
                <h2 class="title">Thông tin thanh toán</h2>
                <div class="info-user" ng-if="CustomerId>0">
                    <label>Người nhận:<span></span></label>
                    <label>Điện thoại:<span></span></label>
                    <label>Email:<span></span></label>
                    <label>Địa chỉ:<span></span></label>
                    <label>Quận/Huyện:<span></span></label>
                    <label>Thành Phố:<span></span></label>
                    <div class="edit-button">
                        <a href="#modalAccount"><i class="fa fa-pencil-square-o"></i></a>
                    </div>
                </div>
                <div class="form-block" ng-if="CustomerId<=0">
                    <div class="user-login"><a href="dang-ky.html" tppabs="http://runecom40.runtime.vn/dang-ky.html">Đăng ký tài khoản mua hàng</a><a href="dang-nhap.html" tppabs="http://runecom40.runtime.vn/dang-nhap.html">Đăng nhập</a></div>
                    <label>Mua hàng không cần tài khoản</label>
                    <div class="form-group"><input class="form-control" placeholder="Họ & Tên" type="text" ng-model="$parent.CustomerName" required /></div>
                    <div class="form-group"><input class="form-control" placeholder="Số điện thoại" type="text" ng-model="$parent.CustomerPhone" required /></div>
                    <div class="form-group"><input class="form-control" placeholder="Email" type="email" ng-model="$parent.CustomerEmail" required /></div>
                    <div class="form-group"><input class="form-control" placeholder="Địa chỉ" type="text" ng-model="$parent.CustomerAddress" required /></div>
                    <div class="form-group">
                        <select class="form-control" ng-model="$parent.CustomerProvinceId"
                                ng-options="item.Id as item.Name for item in Provinces" ng-change="changeCustomerProvince()" required></select>
                    </div>
                    <div class="form-group">
                        <select class="form-control" ng-model="$parent.CustomerDistrictId"
                                ng-options="item.Id as item.Name for item in Districts" ng-change="changeCustomerDistrict()" required></select>
                    </div>
                    <textarea class="form-control" rows="4" placeholder="Ghi chú đơn hàng" ng-model="$parent.Description"></textarea>
                </div>
                <h2 class="title">Thông tin giao hàng</h2>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" ng-model="IsOtherAddress" ng-change="changeAddress()" /> Giao hàng địa chỉ khác
                    </label>
                </div>
                <div class="form-block" ng-show="IsOtherAddress==true">
                    <div class="form-group"><input class="form-control" placeholder="Họ & Tên" type="text" ng-model="DeliveryName" /></div>
                    <div class="form-group"><input class="form-control" placeholder="Số điện thoại" type="text" ng-model="DeliveryPhone" /></div>
                    <div class="form-group"><input class="form-control" placeholder="Email" type="text" ng-model="DeliveryEmail" /></div>
                    <div class="form-group"><input class="form-control" placeholder="Địa chỉ" type="text" ng-model="DeliveryAddress" /></div>
                    <div class="form-group">
                        <select class="form-control" ng-model="DeliveryProvinceId"
                                ng-options="item.Id as item.Name for item in ProvinceDeliverys" ng-change="changeDeliveryProvince()"></select>
                    </div>
                    <div class="form-group">
                        <select class="form-control" ng-model="DeliveryDistrictId"
                                ng-options="item.Id as item.Name for item in DistrictDeliverys" ng-change="changeDeliveryDistrict()"></select>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-12 col-xs-12 payment-step step3">
            <h4>2. Thanh toán và vận chuyển</h4>
            <div class="step-preview clearfix">
                <h2 class="title">Vận chuyển</h2>
                <div class="form-group ">
                    <select class="form-control" ng-model="ShippingRateId"
                            ng-options="item.Id as item.Name for item in ShippingRates" ng-change="changeShippingRate()"></select>
                </div>
                <h2 class="title">Thanh toán</h2>
                <div class="radio" ng-repeat="item in PaymentMethods">
                    <label>
                        <input type="radio" value="" name="optionsRadios"   />
                       
                    </label>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-12 col-xs-12 payment-step step1">
            <h4>3. Thông tin đơn hàng</h4>
            <div class="step-preview">
                <div class="cart-info">
                    <div class="cart-items">
                        <div class="cart-item clearfix" ng-repeat="item in OrderDetails">
                            <span class="image pull-left" style="margin-right:10px;">
                                <a href="" >
                                    <img src=""  class="img-responsive" />
                                </a>
                            </span>
                            <div class="product-info pull-left">
                                <span class="product-name">
                                    <a href="" tppabs=""></a> x <span></span>
                                </span>
                                <p class="note" ng-if="item.IsVariant==true"></p>
                            </div>
                            <span class="price"> ₫</span>
                        </div>
                    </div>
                    <div class="total-price">
                        Thành tiền  <label> ₫</label>
                    </div>
                    <div class="shiping-price">
                        Phí vận chuyển  <label> ₫</label>
                    </div>
                    <div class="btn-coupon hidden">
                        <a href="#" class="btn btn-primary"><span></span>Sử dụng mã giảm giá </a>
                    </div>
                    <div class="use-coupon hidden">
                        <div class="form-group">
                            <input placeholder="Nhập mã giảm giá" class="coupon-code form-control" />
                            <a class="btn btn-primary">Sử dụng</a>
                        </div>
                    </div>
                    <div class="total-payment">
                        Thanh toán <span> ₫</span>
                    </div>
                    <div class="button-submit">
                        <button class="btn btn-default" type="submit">Đặt hàng</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

                    </div>
            </div>
        </div>
    </div>

@include('themes.rova.giao_dien.footer')

    <script type="text/javascript">
        $(document).ready(function () {
            $(".menu-quick-select ul").hide();
            $(".menu-quick-select").hover(function () { $(".menu-quick-select ul").show(); }, function () { $(".menu-quick-select ul").hide(); });
        });
    </script>
</div>

    
    <div style="display: none;" id="loading-mask">
        <div id="loading_mask_loader" class="loader">
            <img alt="Loading..." src="ajax-loader-main.gif" tppabs="http://runecom40.runtime.vn/Images/ajax-loader-main.gif" />
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
            //$(this).attr("data-original", $(this).attr("src"));
            //$(this).attr("src", "blank.gif"/*tpa=http://runecom40.runtime.vn/Images/blank.gif*/);
        });
        $("img.lazy-img").lazyload({
            effect: "fadeIn",
            threshold: 200
        });
    });
</script>

