<!-- HEADER AREA START -->
<header class="header-area header-wrapper">
    <div class="header-top-bar " style="background-color: #000000">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="logo">
                        <a href="{{ route('web.index') }}">
                            <img src="{{ asset($logo->data) }}" alt="logo paradorvn">
                        </a>
                    </div>
                </div>
                <div class="col-md-6 hidden-sm hidden-xs">
                    <div class="company-info clearfix">
                        <div class="company-info-item">
                            <div class="header-icon">
                                <img src="{{ asset('theme/rova/images/icons/phone.png')}}" alt="hotline parador">
                            </div>
                            <div class="header-info">
                                <h6 class="text-white"><a href="tel:{{$parador['phone']->value}}">{{$parador['phone']->value}}</a></h6>
                                <p class="text-white">Chúng tôi mở cửa 9am - 10pm</p>
                            </div>
                        </div>
                        <div class="company-info-item">
                            <div class="header-icon">
                                <img src="{{ asset('theme/rova/images/icons/mail-open.png') }}" alt="hotmail parador">
                            </div>
                            <div class="header-info">
                                <h6 class="text-white"><a href="mailto:{{$parador['email']->value}}">{{$parador['email']->value}}</a></h6>
                                <p>Hỗ Trợ 24/7</p>
                            </div>
                        </div>
                    </div>
                </div>
               <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="header-search clearfix">
                        <div class="address-icon">
                            <img src="{{ asset('theme/rova/images/icons/location-2.png') }}" alt="Parador viet nam">
                        </div>
                        <div class="address-info">
                            <h6 class="text-white">{{$parador['address']->value}}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="sticky-header" class="header-middle-area  transparent-header hidden-xs">
        <div class="container">
            <div class="full-width-mega-drop-menu">
                <div class="row">
                    <div class="col-md-12">
                        <div class="sticky-logo" >
                            <a href="{{ route('web.index') }}">
                                <img src="{{ asset($logo->data) }}" alt="parador viet nam">
                            </a>
                        </div>
                        <nav id="primary-menu">
                            <ul class="main-menu text-center">
                                @foreach($menus as $key => $val)
                                    @if($val->parent_id == 0)
                                        <li>
                                            <a target="{{$val->target}}" href="{{ $val->url }}" @if(url()->current() == $val->url) style="color: #0a5e7e; font-weight: bold" @endif >{{ $val->title }}</a>
                                            @foreach($menus as $key_sub => $val_sub)
                                                @if($val_sub->parent_id == $val->id)
                                                    <ul class="drop-menu">
                                                        @foreach($menus as $key_1 => $val_1)
                                                            @if($val_1->parent_id == $val->id)
                                                                <li><a target="{{$val_1->target}}" href="{{$val_1->url}}">{{$val_1->title}}</a></li>
                                                            @endif
                                                        @endforeach
                                                    </ul>
                                                    @break(isset($val_sub))
                                                @endif
                                            @endforeach
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- HEADER AREA END -->

<!-- MOBILE MENU AREA START -->
<div class="mobile-menu-area hidden-sm hidden-md hidden-lg">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="mobile-menu">
                    <nav id="dropdown">
                        <ul>
                            @foreach($menus as $key => $val)
                                @if($val->parent_id == 0)
                                    <li>
                                        <a target="{{$val->target}}" href="{{ $val->url }}" @if(url()->current() == $val->url) style="color: #0a5e7e; font-weight: bold" @endif >{{ $val->title }}</a>
                                        @foreach($menus as $key_sub => $val_sub)
                                            @if($val_sub->parent_id == $val->id)
                                                <ul class="sub-menu">
                                                    @foreach($menus as $key_1 => $val_1)
                                                        @if($val_1->parent_id == $val->id)
                                                            <li><a target="{{$val_1->target}}" href="{{$val_1->url}}">{{$val_1->title}}</a></li>
                                                        @endif
                                                    @endforeach
                                                </ul>
                                                @break(isset($val_sub))
                                            @endif
                                        @endforeach
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- MOBILE MENU AREA END -->