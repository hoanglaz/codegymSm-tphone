<div class="our-agents-area pt-60 pb-55">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title-2 text-center">
                    <h2>Đại lý - Show room trên toàn quốc</h2>
                    <p>Sàn gỗ Đức cao cấp PARADOR Cung cấp sản phẩm độc quyền tại Việt Nam - Sản phẩm luôn hướng tới trải nghiệm tốt nhất dành cho người dùng.</p>
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
                                    <img src="{{ asset($val->image)}}" alt="Dai ly uy quyền - {{ $val->name }}">
                                </div>
                                <div class="agent-info">
                                    <div class="agent-name">
                                        <h5><a href="#!">{{ $val->name }}</a></h5>
                                        <p>{{ $val->address }}</p>
                                    </div>
                                </div>
                                <div class="agent-info-hover">
                                    <div class="agent-name">
                                        <h5><a href="#!">{{ $val->name }}</a></h5>
                                        <p>{{ $val->address }}</p>
                                    </div>
                                    <ul class="agent-address">
                                        <li><img src="{{ asset('theme/rova/images/icons/phone-2.png')}}" alt="hotline parador"><a href="tel:{{ $val->phone }}">{{ $val->fullname }}</a></li>
                                        <li><img src="{{ asset('theme/rova/images/icons/mail-close.png')}}" alt="hot mail parador"><a href="mail:{{ $val->email }}">{{ $val->email }}</a></li>
                                    </ul>
                                    <ul class="social-media">
                                        <li><a href="#!"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                        <li><a href="#!"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                        <li><a href="#!"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                        <li><a href="#!"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
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