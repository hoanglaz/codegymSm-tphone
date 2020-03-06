@extends('themes.rova.layouts.design')
@section('title',"PARADOR Việt Nam - Tin tức cập nhật mới nhất về sàn gỗ cao cấp")
@section('description',"Cùng với nhu cầu và đời sống con người tăng cao Sàn gỗ đã dần thay thế sàn nhà truyền thống, 1 trong những sàn gỗ tốt nhất thị trường hiện nay - Parador đang dần thống trị thị trường sàn gỗ cao cấp tại Việt Nam")

@section('content')

    <!-- BREADCRUMBS AREA START -->
    <div class="breadcrumbs-area bread-bg-1 bg-opacity-black-70">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="breadcrumbs">
                        <h2 class="breadcrumbs-title">
                            @if(isset($tag))
                                Thẻ Tag: {{ $tag->name }}
                                @elseif(isset($category))
                                Danh mục: {{ $category->name }}
                                @else
                                Tin tức PARADOR
                                @endif
                        </h2>
                        <ul class="breadcrumbs-list">
                            <li><a href="{{ route('web.index') }}">Trang chủ</a></li>
                            <li>Tin tức</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BREADCRUMBS AREA END -->

    <!-- Start page content -->
    <div id="page-content" class="page-wrapper">

        <!-- BLOG AREA START -->
        <div class="blog-area pt-115 pb-60">
            <div class="container">
                <div class="row">
                    <!-- blog-item -->
                    @if(!isset($posts[0])) <h3>Sàn gỗ Parador hiện không có bài viết liên quan ! </h3>
                        @endif
                    @foreach($posts as $key => $val)
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <article class="blog-item bg-gray">
                            <div class="blog-image">
                                <a href="{{ route('web.post',$val->url) }}"><img src="{{ asset($val->image) }}" alt="{{ $val->title }}"></a>
                            </div>
                            <div class="blog-info">
                                <div class="post-title-time">
                                    <h5><a href="{{ route('web.post',$val->url) }}">{{ $val->title }}</a></h5>
                                    <p>{{ date_format($val->created_at,'d-m-Y / h A') }}</p>
                                </div>
                                <p>{{ $val->des }}</p>
                                <a class="read-more" href="{{ route('web.post',$val->url) }}">Chi tiết</a>
                            </div>
                        </article>
                    </div>
                    @endforeach
                    <!-- pagination-area -->
                    <div class="col-xs-12">
                        <div class="pagination-area mb-60">
                            {{ $posts->links('themes.rova.paginate.list') }}

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- BLOG AREA END -->

        @include('themes.rova.layouts.subscribe')
    </div>
    <!-- End page content -->
@endsection
