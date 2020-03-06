@extends('themes.rova.layouts.design')
@section('title',"Sản phẩm sàn gỗ cao cấp Châu Âu - Parador Việt Nam")
@section('description',"Danh sách sàn phẩm - giá sàn gỗ cao cấp Đức, Với thiết kế đẹp mắt sạng trọng, Sàn gỗ Đức là lựa chọn tốt nhất dành cho mọi không gian căn hộ cao cấp")

@section('content')

    <!-- BREADCRUMBS AREA START -->
    <div class="breadcrumbs-area bread-bg-1 bg-opacity-black-70">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="breadcrumbs">
                        <h2 class="breadcrumbs-title">
                            @if(isset($category))
                                Danh mục: {{ $category->name }}
                            @else
                                Sàn gỗ Panador cao cấp
                            @endif
                        </h2>
                        <ul class="breadcrumbs-list">
                            <li><a href="{{ route('web.index') }}">Trang chủ</a></li>
                            <li>Sàn gỗ</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BREADCRUMBS AREA END -->

    <!-- Start page content -->
    <section id="page-content" class="page-wrapper">

        <!-- FEATURED FLAT AREA START -->
        <div class="featured-flat-area pt-115 pb-60">
            <div class="container">
                <div class="featured-flat">
                    <div class="row">
                        <!-- flat-item -->
                        @foreach($products as $k => $val)
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="flat-item">
                                <div class="flat-item-image">
                                    <span class="for-sale">Best Sale</span>
                                    <a href="{{ route('web.product',$val->url) }}"><img src="{{ asset($val->image) }}" alt="{{ $val->title }}"></a>
                                    <div class="flat-link">
                                        <a href="{{ route('web.product',$val->url) }}">Chi tiết</a>
                                    </div>
                                    <ul class="flat-desc">
                                        <li>
                                            <img src="{{ asset('theme/rova/images/icons/4.png') }}" alt="san go parador code">
                                            <span>{{ $val->categories[0]->name }}</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="flat-item-info">
                                    <div class="flat-title-price">
                                        <h5><a href="{{ route('web.product',$val->url) }}">{{ substr($val->title,00,30) }}...</a></h5>
                                        <span class="price">{{ $val->price_pre }} VND</span>
                                    </div>
                                    <p><img src="{{ asset('theme/rova/images/icons/location.png') }}" alt="">{{ $parador['address']->value }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <!-- pagination-area -->
                        <div class="col-xs-12">
                            <div class="pagination-area mb-60">
                                {{ $products->links('themes.rova.paginate.list') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- FEATURED FLAT AREA END -->

        <!-- SUBSCRIBE AREA START -->
       {{-- <div class="subscribe-area bg-blue call-to-bg plr-140 ptb-50">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3 col-sm-4 col-xs-12">
                        <div class="section-title text-white">
                            <h3>SUBSCRIBE</h3>
                            <h2 class="h1">NEWSLETTER</h2>
                        </div>
                    </div>
                    <div class="col-md-9 col-sm-8 col-xs-12">
                        <div class="subscribe">
                            <form action="#">
                                <input type="text" name="subscribe" placeholder="Enter yur email here...">
                                <button type="submit" value="send">Send</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>--}}
        <!-- SUBSCRIBE AREA END -->
    </section>
    <!-- End page content -->


@endsection
