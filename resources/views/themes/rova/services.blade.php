@extends('themes.rova.layouts.design')
@section('title',"Dịch vụ cung cấp sàn gỗ cao cấp Châu Âu")
@section('description',"Với sự xuất hiên của sàn gỗ cao cấp Châu Âu PARADOR tại Việt Nam thì mội chủ hộ đều có thêm một lữa chọn hợp lý trang trí căn hộ của mình trở lên đẹp hơn")

@section('content')
    <!-- BREADCRUMBS AREA START -->
    <div class="breadcrumbs-area bread-bg-1 bg-opacity-black-70">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="breadcrumbs">
                        <h2 class="breadcrumbs-title">Service</h2>
                        <ul class="breadcrumbs-list">
                            <li><a href="index.html">Home</a></li>
                            <li>Service</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BREADCRUMBS AREA END -->

    <!-- Start page content -->
    <section id="page-content" class="page-wrapper">

        <!-- ABOUT SHELTEK AREA START -->
        <div class="about-sheltek-area ptb-115">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-xs-12">
                        <div class="section-title mb-30">
                            <h3>Hệ thống Showroom </h3>
                            <h2>Toàn quốc</h2>
                        </div>
                        <div class="about-sheltek-info">
                            <p><span data-placement="top" data-toggle="tooltip" data-original-title="The name you can trust" class="tooltip-content">PARADOR</span>
                                Hiện tại có đến 18 showroom trên toàn quốc và vẫn đang tiếp tục mở rộng đến các tỉnh thành phố của Việt Nam</p>
                            <div class="author-quote">
                                <p>Đưa đến sản phẩm cho người tiêu dùng nhanh nhất và có những trải nghiệm mới mẻ ngay tức thì</p>
                                <p>Hệ thống của hàng showroom, các đại lý độc quyền trên toàn quốc.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xs-12">
                        <div class="about-image">
                            <img src="{{ asset('theme/rova/images/about/4.jpg') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ABOUT SHELTEK AREA END -->

        <!-- SERVICES AREA START -->
        <div class="services-area pb-60">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title-2 text-center">
                            <h2>Showroom Parador</h2>
                            <p>18 show rôm trải rộng khắp toàn quốc</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="service-carousel">
                        <!-- service-item -->
                        <?php $item = [1,2,3,4,5,6]?>
                        @foreach($item as $k =>$val)
                        <div class="col-md-12">
                            <div class="service-item">
                                <div class="service-item-image">
                                    <a href="#"><img src="{{ asset('theme/rova/images/service/1.jpg') }}" alt=""></a>
                                </div>
                                <div class="service-item-info">
                                    <h5><a href="#">Sale Property</a></h5>
                                    <p>Property sale best theme for litdo eiusmod tempor dolor sit amet, conse tetur adiping eiusmo</p>
                                </div>
                            </div>
                        </div>
                       @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- SERVICES AREA END -->

        <!-- BOOKING AREA START -->
        <div class="booking-area bg-1 call-to-bg plr-140 pt-75">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3 col-sm-4 col-xs-12">
                        <div class="section-title text-white">
                            <h3>SOME</h3>
                            <h2 class="h1">FUN FACTOR</h2>
                        </div>
                    </div>
                    <div class="col-md-9 col-sm-8 col-xs-12">
                        <div class="booking-conternt  clearfix">
                            <div class="counter-content">
                                <!-- counter-item -->
                                <div class="counter-item">
                                    <h2>
                                        <i class="fa fa-home" aria-hidden="true"></i>
                                        <span class="counter">999</span>
                                    </h2>
                                    <p>Complete Project</p>
                                </div>
                                <!-- counter-item -->
                                <div class="counter-item">
                                    <h2>
                                        <i class="fa fa-key" aria-hidden="true"></i>
                                        <span class="counter">555</span>
                                    </h2>
                                    <p>Property Sold</p>
                                </div>
                                <!-- counter-item -->
                                <div class="counter-item">
                                    <h2>
                                        <i class="fa fa-smile-o" aria-hidden="true"></i>
                                        <span class="counter">350</span>
                                    </h2>
                                    <p>Happy Clients</p>
                                </div>
                                <!-- counter-item -->
                                <div class="counter-item">
                                    <h2>
                                        <i class="fa fa-trophy" aria-hidden="true"></i>
                                        <span class="counter">100</span>
                                    </h2>
                                    <p>Awards Win</p>
                                </div>
                            </div>
                            <div class="booking-imgae">
                                <img src="{{ asset('theme/rova/images/others/booking.png')}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- BOOKING AREA END -->
        <!-- TESTIMONIAL AREA START -->
    @include('themes.rova.layouts.testimonial')
        <!-- TESTIMONIAL AREA END -->


        <!-- SUBSCRIBE AREA START -->
       @include('themes.rova.layouts.subscribe')
        <!-- SUBSCRIBE AREA END -->
    </section>
    <!-- End page content -->

@endsection
