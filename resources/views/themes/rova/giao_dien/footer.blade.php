
<?php
$logo = \App\Entities\Envent::all();
?>
 <div class="partner">

        <link href="{{ asset('theme/beptu/Scripts/owl-carousel/owl.carousel.css') }}" rel="stylesheet" />
        <link href="{{ asset('theme/beptu/Scripts/owl-carousel/owl.theme.css') }}" rel="stylesheet" />
        <script src="{{ asset('theme/beptu/Scripts/owl-carousel/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('theme/beptu/app/services/moduleServices.js') }}"></script>
        <script src="{{ asset('theme/beptu/app/controllers/moduleController.js') }}"></script>
        <!--Begin-->
        <div class="partner-content owl-carousel" >
            <h3 class="title">Đối tác</h3>
            <div class="partner-block">
                @foreach($logo as $key=>$val)
                <div class="partner-item" >
                    <a href="" target="_blank" title="">
                        <img src="{{ $val->image }}" alt="" class="img-responsive" />
                    </a>
                </div> 
                @endforeach
            </div>
            <div class="controls boxprevnext">
                <a class="prev prevlogo"><i class="fa fa-angle-left"></i></a>
                <a class="next nextlogo"><i class="fa fa-angle-right"></i></a>
            </div>
        </div>
        <script type="text/javascript">
            $(document).ready(function () {
                var owl = $(".partner-block");
                owl.owlCarousel({
                    autoPlay: true,
                    autoPlay: 5000,
                    items: 6,
                    slideSpeed: 1000,
                    pagination: false,
                    itemsDesktop: [1200, 6],
                    itemsDesktopSmall: [980, 5],
                    itemsTablet: [767, 4],
                    itemsMobile: [480, 2]
                });
                $(".partner-content .nextlogo").click(function () {
                    owl.trigger('owl.next');
                });
                $(".partner-content .prevlogo").click(function () {
                    owl.trigger('owl.prev');
                });
            });
        </script>
        <!--End-->
             
    </div>


    <div class="footer">

        <div class="footer-content clearfix">
            <div class="container">
                <div class="row">
                    <div class="footer-box col-md-3 col-sm-12 col-xs-12">
                        <div class="item">
                            <h3>
                                <span>Giới thiệu</span>
                            </h3>
                        </div>
                        <ul>
                            <li>
                                <a href="gioi-thieu.html">
                                    Về ch&#250;ng t&#244;i
                                </a>
                            </li>
                            <li>
                                <a href="content/linh-vuc-hoat-dong.html">
                                    Lĩnh vực hoạt động
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="footer-box col-md-3 col-sm-12 col-xs-12">
                        <div class="item">
                            <h3>
                                <span>Trợ gi&#250;p</span>
                            </h3>
                        </div>
                        <ul>
                            <li>
                                <a href="content/huong-dan-thanh-toan.html">
                                    Hướng dẫn thanh to&#225;n
                                </a>
                            </li>
                            <li>
                                <a href="content/quy-dinh-doi-tra.html">
                                    Quy định đổi trả
                                </a>
                            </li>
                            <li>
                                <a href="content/chinh-sach-ban-hang.html">
                                    Ch&#237;nh s&#225;ch b&#225;n h&#224;ng
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="footer-box box-address col-md-3 col-sm-12 col-xs-12">
                        <div class="item">
                            <h3>
                                <span>Thông tin công ty</span>
                            </h3>
                            <div class="box-address-content">
                                <b>C&#212;NG TY TNHH PH&#193;T TRIỂN C&#212;NG NGHỆ RUNTIME</b>
                                <p><i class="fa fa-map-marker"></i> 5/12A Quang Trung, P.14, Q.G&#242; Vấp, Tp.HCM</p>
                                <p>
                                    <i class="fa fa-envelope"></i>
                                    <a href="mailto:info@runtime.vn">info@runtime.vn</a>
                                </p>
                                <p>
                                    <i class="fa fa-phone"></i>
                                    Phone: ####
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="footer-box box-social col-md-3 col-sm-12 col-xs-12">
                        <div class="item">
                            <h3>
                                <span>Facebook</span>
                            </h3>
                            <div class="fb-like-box" data-href="https://www.facebook.com/runtime.vn" data-width="289"
                                 data-height="190" data-colorscheme="dark" data-show-faces="true" data-header="false"
                                 data-stream="false" data-show-border="false">
                            </div>
                            <div class="social-icon">
                                <ul>
                                    <li><a target="_blank"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href="https://www.facebook.com/runtime.vn" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                    <li><a target="_blank"><i class="fa fa-youtube"></i></a></li>
                                    <li><a target="_blank"><i class="fa fa-twitter "></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
