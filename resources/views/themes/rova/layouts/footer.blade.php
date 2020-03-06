<!-- Start footer area -->
<footer id="footer" class="footer-area bg-2 bg-opacity-black-90">
    <div class="footer-top pt-60 pb-30">
        <div class="container">
            <div class="row">
                <!-- footer-address -->
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="footer-widget">
                        <h6 class="footer-titel">Sàn gỗ PARADOR</h6>
                        <ul class="footer-address">
                            <li>
                                <div class="address-icon">
                                    <img src="{{ asset('theme/rova/images/icons/location-2.png') }}" alt="san go duc parado">
                                </div>
                                <div class="address-info">
                                    <span>{{$parador['address']->value}}</span>
                                    <span>Sàn gỗ parador phân phối độc quyền</span>
                                </div>
                            </li>
                            <li>
                                <div class="address-icon">
                                    <img src="{{ asset('theme/rova/images/icons/phone-3.png')}}" alt="sam go cao cap duc">
                                </div>
                                <div class="address-info">
                                    <span>Telephone : <a href="tel:{{$parador['phone']->value}}">{{$parador['phone']->value}}</a></span>
                                    <span>Hỗ trợ 24/7</span>
                                </div>
                            </li>
                            <li>
                                <div class="address-icon">
                                    <img src="{{ asset('theme/rova/images/icons/world.png')}}" alt="san go cao cap gia goc">
                                </div>
                                <div class="address-info">
                                    <span>Email : <a href="mail:{{$parador['email']->value}}">{{$parador['email']->value}}</a></span>
                                    <span>Báo giá sản phẩm tốt nhất cho khách hàng </span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- footer-latest-news -->
                <div class="col-lg-6 col-md-5 hidden-sm col-xs-12">
                    <div class="footer-widget middle">
                        <h6 class="footer-titel">Bài viết mới</h6>
                        <ul class="footer-latest-news">
                            @foreach($prelate as $k => $val)
                            <li>
                                <div class="latest-news-image">
                                    <a href="{{ route('web.post',$val->url) }}"><img src="{{ asset('theme/rova/images/blog/1.jpg')}}" alt=""></a>
                                </div>
                                <div class="latest-news-info">
                                    <h6><a href="{{ route('web.post',$val->url) }}">{{ $val->title }}</a></h6>
                                    <p>{{ $val->des }}</p>
                                </div>
                            </li>
                           @endforeach
                        </ul>
                    </div>
                </div>
                <!-- footer-contact -->
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <div class="footer-widget">
                        <h6 class="footer-titel">Mạng xã hội</h6>
                        <div class="footer-contact">
                            <iframe src="#" width="340" height="250" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="copyright text-center">
                        <p>Copyright &copy; 2019 <a href="{{ route('web.index') }}"><b>PARADOR</b></a>.Chuyên Sàn Gỗ Cao Cấp Đức Độc Quyền Tại Việt Nam.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- End footer area -->