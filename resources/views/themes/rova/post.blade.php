@extends('themes.rova.layouts.design')
@if(is_null($post->meta_title) && is_null($post->meta_des))
    @section('title',$post->title.'- Sàn gỗ Parador')
@section('description',$post->des)
@else
    @section('title',$post->meta_title.'- Sàn gỗ Parador')
@section('description',$post->meta_des)
@endif
@section('image',asset($post->image))
@section('content')


    <!-- BREADCRUMBS AREA START -->
    <div class="breadcrumbs-area bread-bg-1 bg-opacity-black-70">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="breadcrumbs">
                        <h2 class="breadcrumbs-title">{{ $post->title }}</h2>
                        <ul class="breadcrumbs-list">
                            <li><a href="{{ route('web.index') }}">Parador</a></li>
                            <li><a href="{{ route('web.blog') }}">Tin tức</a></li>
                            <li>Chi tiết</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BREADCRUMBS AREA END -->
    @if(isset(Auth::user()->name))
        <div class="">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="">
                            <span>Xin chào: <strong>{{ Auth::user()->name }}</strong></span>
                            <span>| Chức năng dành cho quản trị viên: <a href="{{route('posts.edit',$post->id)}}" class="btn btn-primary">Sửa bài viết</a></span>
                            <span><a class="btn btn-default" href="{{route('dashboard')}}">Quản trị</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <!-- Start page content -->
    <section id="page-content" class="page-wrapper">

        <!-- BLOG AREA START -->
        <div class="blog-area pt-115 pb-120">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-xs-12">
                        <div class="blog-details-area">
                            <!-- blog-details-image -->
                           {{-- <div class="blog-details-image text-center">
                                <img class="img-fluid" src="{{ asset($post->image) }}" alt="{{ $post->title }}">
                            </div>--}}
                            <!-- blog-details-title-time -->
                            <div class="blog-details-title-time">
                                <h5>{{ $post->title }}</h5>
                                <p>{{ date_format($post->created_at,'d-m-Y, h A') }}</p>
                            </div>
                            <!-- blog-details-desctiption -->
                            <div class="blog-details-desctiption mb-60">
                                {!! $post->content !!}
                            </div>
                            <!-- blog-details-share-tags -->
                            <div class="blog-details-share-tags clearfix mb-75">
                                <div class="blog-details-tags f-left">
                                    <ul>
                                        <li>Tags :</li>
                                        @foreach($post->tags as $key => $val)
                                        <li><a href="{{ route('web.tags',$val->url) }}">@if($key == 0) @else , @endif {{ $val->name }}</a></li>
                                        @endforeach

                                    </ul>
                                </div>
                                <div class="blog-details-share f-right">
                                    <ul class="social-media">
                                        <li>Share:</li>
                                        <li><a href="#!"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                        <li><a href="#!"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                        <li><a href="#!"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                        <li><a href="#!"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- blog-details-author-post -->
                            <div class="blog-details-author-post clearfix line-bottom pb-30 mb-115">
                                <div class="blog-details-author-image">
                                    <a href="#!"><img src="{{ asset('theme/rova/images/avatar/2.jpg') }}" alt="admin parador"></a>
                                </div>
                                <div class="blog-details-author-desc">
                                    <div class="blog-details-author-name">
                                        <h6><a href="#!">Sàn Gỗ Đức Cao Cấp Parador</a></h6>
                                        <p class="">Quản trị Parador</p>
                                    </div>
                                    <p> <strong>PARADOR</strong> tự hào là công ty đi đầu về nội thất. Chúng tôi luôn mang đến cho khách hàng sự thoải mái nhất.</p>
                                </div>
                            </div>
                            <!-- pro-details-feedback -->
                            <div class="pro-details-feedback mb-100">
                                <h5>{{ count($comments) }} Bình luận</h5>
                                <!-- media -->
                                @foreach($comments as $key => $val)
                                <div class="media">
                                    <a class="media-left" href="#">
                                        <img src="{{ asset('theme/rova/images/avatar/1.jpg') }}" alt="">
                                    </a>
                                    <div class="media-body">
                                        <h6 class="media-heading"><a href="#!">{{ $val->name }}</a></h6>
                                        <p><span>{{ date_format($val->created_at,'d-m-Y / h A') }}</span>{{ $val->content }}</p>

                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <!-- blog-details-reply -->
                            <div class="blog-details-reply leave-review">
                                <h5>Bình luận bài viết</h5>
                                <label id="cmt-note" class="form-control hidden"></label>
                                <form action="#">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="text" name="name" placeholder="Your name" id="cmt-name">
                                        </div>
                                        <div class="col-md-6">
                                            <input type="email" name="email" placeholder="Email" id="cmt-email">
                                        </div>
                                    </div>
                                    <textarea placeholder="Write here" id="cmt-content"></textarea>
                                    <button type="reset" class="submit-btn-1" onclick="sendCommnet();">Gửi Bình luận</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <!-- widget-search -->
                       {{-- <aside class="widget widget-search mb-30">
                            <form action="#">
                                <input type="text" name="search" placeholder="Search...">
                                <button type="button" class=""><i class="fa fa-search" aria-hidden="true"></i></button>
                            </form>
                        </aside>--}}
                        <!-- widget-categories -->
                        <aside class="widget widget-categories mb-50">
                            <h5>Categories</h5>
                            <ul class="widget-categories-list">
                                @foreach($categories as $k => $val)
                                <li><a href="{{ route('web.categories',$val->url) }}">{{ $val->name }} <span>{{ $val->posts->count() }}</span></a></li>
                                @endforeach
                            </ul>
                        </aside>
                        <!-- widget-recent-post -->
                        <aside class="widget widget-recent-post mb-50">
                            <h5>Bài viết gần đây</h5>
                            <div class="row">
                                <!-- blog-item -->
                                @foreach($posts as $k => $val)
                                    <div class="col-md-12 col-sm-6 col-xs-12">
                                        <article class="recent-post-item">
                                            <div class="recent-post-image">
                                                <a href="{{ route('web.post',$val->url) }}"><img src="{{ asset($val->image) }}" alt="{{ $val->title }}"></a>
                                            </div>
                                            <div class="recent-post-info">
                                                <div class="recent-post-title-time">
                                                    <h5><a href="{{ route('web.post',$val->url) }}">{{ $val->title }}</a></h5>
                                                    <p>{{ date_format($val->created_at,'d-m-Y / h A') }}</p>
                                                </div>
                                                <p>{{ $val->des }}</p>
                                            </div>
                                        </article>
                                    </div>
                                @endforeach
                            </div>
                        </aside>

                    </div>
                </div>
            </div>
        </div>
        <!-- BLOG AREA END -->

        @include('themes.rova.layouts.subscribe')
    </section>
    <!-- End page content -->
@stop
@section('js')
    <script>

        function postData(url = '', data = {}) {
            // Default options are marked with *
            return fetch(url, {
                method: 'POST', // *GET, POST, PUT, DELETE, etc.
                mode: 'cors', // no-cors, cors, *same-origin
                cache: 'no-cache', // *default, no-cache, reload, force-cache, only-if-cached
                credentials: 'same-origin', // include, *same-origin, omit
                headers: {
                    'Content-Type': 'application/json',
                    // 'Content-Type': 'application/x-www-form-urlencoded',
                },
                redirect: 'follow', // manual, *follow, error
                referrer: 'no-referrer', // no-referrer, *client
                body: JSON.stringify(data), // body data type must match "Content-Type" header
            })
                .then(response => response.json()); // parses JSON response into native JavaScript objects
        }
        var url = "{{ route('webapi.contact') }}";
        function sendCommnet() {
            var send1 = {name: $('#cmt-name').val(),
                email: $('#cmt-email').val(),
                content: $('#cmt-content').val(),
                id: "{{$post->id}}",
                type: "post",
            };
            //alert(JSON.stringify(send1));
            postData(url, send1)
                .then(function (data1) {
                    // console.log(data1.status);
                    if (data1.status) {
                        $("#cmt-note").removeClass('hidden').addClass("alert-success").html(data1.note);
                    }else {
                        $("#cmt-note").removeClass('hidden').addClass("alert-warning").html(data1.note);
                    }
                }) // JSON-string from `response.json()` call
                .catch(error => console.error(error));

        }

    </script>
@endsection
