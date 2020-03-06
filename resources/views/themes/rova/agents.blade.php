@extends('themes.rova.layouts.design')
@section('title',"Danh sách các địa lý phân phối và show room độc quyền trên toàn quốc")
@section('description',"PARADOR - Sàn gỗ đức độc quyền tại Việt Nam")

@section('content')

    <!-- BREADCRUMBS AREA START -->
    <div class="breadcrumbs-area bread-bg-1 bg-opacity-black-70">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="breadcrumbs">
                        <h2 class="breadcrumbs-title">Đại lý ủy quyền - Show room</h2>
                        <ul class="breadcrumbs-list">
                            <li><a href="{{ route('web.index') }}">Paradorvn</a></li>
                            <li>Show Room Parador</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BREADCRUMBS AREA END -->

    <!-- Start page content -->
    <section id="page-content" class="page-wrapper">

        <!-- OUR AGENTS AREA START -->
        <div class="our-agents-area  pt-115 pb-60">
            <div class="container">
                <div class="our-agents">
                    <div class="row">
                        <div class="agents-carousel=2">
                            @foreach($members as $key => $val)
                            <!-- single-agent -->
                            <div class="col-md-3 col-sm-4 col-xs-12">
                                <div class="single-agent">
                                    <div class="agent-image">
                                        <img src="{{ asset($val->image) }}" alt="dai ly doc quyen parador {{ $val->name }}">
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
                                            <li><img src="{{ asset('theme/rova/images/icons/phone-2.png') }}" alt="">{{ $val->fullname }}</li>
                                            <li><img src="{{ asset('theme/rova/images/icons/mail-close.png') }}" alt="">{{ $val->email }}</li>
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
                            <!-- single-agent -->
                           @endforeach
                            <!-- pagination-area -->
                            <div class="col-xs-12">
                                <div class="pagination-area mb-60">
                                    {{ $members->links('themes.rova.paginate.list') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- OUR AGENTS AREA END -->

        <!-- SUBSCRIBE AREA START -->
  @include('themes.rova.layouts.subscribe')
        <!-- SUBSCRIBE AREA END -->
    </section>
    <!-- End page content -->

@endsection
