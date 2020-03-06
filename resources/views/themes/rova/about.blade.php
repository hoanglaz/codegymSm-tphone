@extends('themes.rova.layouts.design')
@section('title',"Giới thiệu - Sàn gỗ Châu Âu cao cấp Parador")
@section('description',"PARADOR hiện lần gỗ tốt nhất và cao cấp trên thị trương Việt Nam, Với chất lượng vượt trội và khả năng thích ứng với môi trương nhiệt đới của Việt Nam rất tốt")

@section('content')

    <!-- BREADCRUMBS AREA START -->
    <div class="breadcrumbs-area bread-bg-1 bg-opacity-black-70">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="breadcrumbs">
                        <h2 class="breadcrumbs-title">Giới thiệu Sàn gỗ Đức Parador</h2>
                        <ul class="breadcrumbs-list">
                            <li><a href="{{ route('web.index') }}">Parador</a></li>
                            <li>Giới thiệu</li>
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
                    <div class="col-sm-6 col-sm-push-6 col-xs-12">
                        <div class="section-title mb-30">
                            <h3>Bạn đã biết gì về</h3>
                            <h2>sàn gỗ PARADOR</h2>
                        </div>
                        <div class="about-sheltek-info">
                            <p><span data-placement="top" data-toggle="tooltip" data-original-title="The name you can trust" class="tooltip-content">Parador</span> Hãng nội thất nổi tiếng của Đức với nhiều năm phát triển và thế mạnh về dòng sản phẩm sàn gỗ cao cấp, Hiện nay trên thị trường sàn gỗ tại Việt Nam có duy nhất Chúng tôi là đại lý phân phối độc quyền của Parador</p>
                            <p>Chúng tôi mang đến cho khách hàng sản phẩm chất lương nhất với sự trải nghiệm mới mẻ mà sản phẩm Châu Âu mang đến cho khách hàng</p>
                            <p>Ngôi nhà của bạn sẽ hoàn toàn đổi mới với công nghệ sàn gỗ hiện đại bậc nhất Châu Âu hiện nay. </p>
                            <p>Bạn có thể tìm hiểu thêm về Parador tại trang web chính thức được phân phối độc quyền
                                tại:
                            </p>
                            <p>Website: <a href="https://paradorvietnam.com/gioi-thieu/" ref="nofollow"
                                           target="_blank">Paradorvietnam.com</a></p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-sm-pull-6 col-xs-12">
                        <div class="about-image">
                            <img src="{{ asset('theme/rova/images/about/3.jpg') }}" alt="giới thị paradorvn">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ABOUT SHELTEK AREA END -->

        <!-- SERVICES AREA START -->
        <div class="services-area pt-30">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row mb-0 pb-0">
                            <div class="col-md-10 text-left">
                                <h2>Sàn gỗ bán chạy nhất</h2>
                            </div>
                            <div class="col-md-2 text-right">
                                <a href="{{ route('web.products') }}" target="_blank"><span>Xem tất cả <i class="fa fa-hand-o-right" aria-hidden="true"></i></span></a>
                            </div>
                        </div>
                        <hr class="pt-0 mt-0">
                    </div>
                </div>
                <div class="row">
                    <div class="service-carousel">
                        <!-- service-item -->

                        @foreach($products as $key => $val)
                            <div class="col-md-12">
                                <div class="service-item">
                                    <div class="service-item-image">
                                        <a href="{{ route('web.product',$val->url) }}"><img src="{{asset($val->image)}}" alt="Sàn gỗ đẹp {{ $val->title }}"></a>
                                    </div>
                                    <div class="service-item-info">
                                        <h5><a href="{{ route('web.product',$val->url) }}">{{ $val->title }}</a></h5>
                                        <p>Chi phí: <b>{{ $val->price_pre }} VNĐ </b></p>
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
                            <h3>Độc quyền</h3>
                            <h2 class="h1">PARADOR</h2>
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
                                <img src="{{ asset('theme/rova/images/others/booking.png') }}" alt="san go doc quyen duc">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- BOOKING AREA END -->

        <!-- OUR AGENTS AREA START -->
        <div class="our-agents-area pt-60 pb-55">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title-2 text-center">
                            <h2>Show room trên toàn quốc</h2>
                            <p>Parador hiện đã có mặt trên khắp toàn quốc, với thương hiệu sàn gỗ cao cấp đạt được nhiều giải thưởng quốc tế, chúng tôi tự hào là nhà cung cấp chính thức đại diện cho Parador phân phối sản phẩm sàn gỗ tại Việt Nam.</p>
                        </div>
                    </div>
                </div>
                <div class="our-agents">
                    <div class="row">
                        <div class="agents-carousel">
                            <!-- single-agent -->
                            <?php $item3 = [1,2,3,4,5]; ?>
                            @foreach($members as $key => $val)
                                <div class="col-md-12">
                                    <div class="single-agent">
                                        <div class="agent-image">
                                            <img src="{{ asset($val->image)}}" alt="dai ly phan phoi san go doc quyen {{ $val->name }}">
                                        </div>
                                        <div class="agent-info">
                                            <div class="agent-name">
                                                <h5><a href="#!">{{ $val->name }}</a></h5>
                                                <p>{{ $val->address }}</p>
                                            </div>
                                        </div>
                                        <div class="agent-info-hover">
                                            <div class="agent-name">
                                                <h5><a href="agent-details.html">{{ $val->name }}</a></h5>
                                                <p>{{ $val->address }}</p>
                                            </div>
                                            <ul class="agent-address">
                                                <li><img src="{{ asset('theme/rova/images/icons/phone-2.png')}}" alt="parado hotline">{{ $val->fullname }} </li>
                                                <li><img src="{{ asset('theme/rova/images/icons/mail-close.png')}}" alt="parado hotmail">{{ $val->email }} </li>
                                            </ul>
                                            <ul class="social-media">
                                                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                                <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                                <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- OUR AGENTS AREA END -->

        <!-- TESTIMONIAL AREA START -->
        <div class="testimonial-area pb-60">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="testimonial">
                            <div class="row">
                                <div class="col-md-8 col-sm-9">
                                    <div class="section-title mb-30">
                                        <h3>Cảm nhận</h3>
                                        <h2 class="h1">Khách Hàng Parador</h2>
                                    </div>
                                    <div class="testimonial-carousel dots-right-btm">
                                        <!-- testimonial-item -->
                                        <div class="testimonial-item">
                                            <div class="testimonial-brief">
                                                <p><span data-placement="top" data-toggle="tooltip" data-original-title="The name you can trust" class="tooltip-content">PARADOR</span> là sản phẩm sàn gỗ tốt nhất mà tôi từng dùng, mùi thơm dịu nhẹ và rất thân thiện với con người, màu sắc đa dạng và khá dễ dàng chọn được màu ưu thích của tôi. Sau kho dùng một thời gian độ sàn nhà tôi vẫn như mới rất dễ vệ sinh cũng như don dẹp, ...</p>
                                            </div>
                                            <h6>Hoang scalet, <span>CEO</span></h6>
                                        </div>
                                        <!-- testimonial-item -->
                                        <div class="testimonial-item">
                                            <div class="testimonial-brief">
                                                <p><span data-placement="top" data-toggle="tooltip" data-original-title="The name you can trust" class="tooltip-content">PARADOR</span> là sản phẩm sàn gỗ tốt nhất mà tôi từng dùng, mùi thơm dịu nhẹ và rất thân thiện với con người, màu sắc đa dạng và khá dễ dàng chọn được màu ưu thích của tôi. Sau kho dùng một thời gian độ sàn nhà tôi vẫn như mới rất dễ vệ sinh cũng như don dẹp, ...</p>
                                            </div>
                                            <h6>Hoang scalet, <span>CEO</span></h6>
                                        </div>
                                        <!-- testimonial-item -->
                                        <div class="testimonial-item">
                                            <div class="testimonial-brief">
                                                <p><span data-placement="top" data-toggle="tooltip" data-original-title="The name you can trust" class="tooltip-content">PARADOR</span> là sản phẩm sàn gỗ tốt nhất mà tôi từng dùng, mùi thơm dịu nhẹ và rất thân thiện với con người, màu sắc đa dạng và khá dễ dàng chọn được màu ưu thích của tôi. Sau kho dùng một thời gian độ sàn nhà tôi vẫn như mới rất dễ vệ sinh cũng như don dẹp, ...</p>
                                            </div>
                                            <h6>Hoang scalet, <span>CEO</span></h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-3">
                                    <div class="testimonial-image">
                                        <img src="{{ asset('theme/rova/images/others/testimonial.jpg') }}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- TESTIMONIAL AREA END -->


        @include('themes.rova.layouts.subscribe')

    </section>
    <!-- End page content -->

@endsection
