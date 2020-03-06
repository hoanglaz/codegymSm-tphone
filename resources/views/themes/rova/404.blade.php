@extends('themes.rova.layouts.design')
@section('title',"Lỗi tìm kiếm trang 404")
@section('description',"Parador Việt Nam hiện không thể truy cập đến đường dẫn hiện tại")

@section('content')
    <!-- Start page content -->
    <section id="page-content" class="page-wrapper">

        <!-- ERROR AREA START -->
        <div class="error-area ">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="error-content ">
                            <h2>404</h2>
                            <h3>Không tìm thấy trang!</h3>
                            <h4>Cảnh báo! Có vẻ như trang không được tình thấy.</h4>
                            <p>Chúng thôi không thể tìm thấy trang bạn cần truy cập <br>
                                Hãy đảm bảo url truy cập hiên tại là đúng</p>
                            <a class="go-home" href="{{ route('web.index') }}">Về trang chủ</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ERROR AREA END -->
        @include('themes.rova.layouts.subscribe')
    </section>
    <!-- End page content -->

@endsection

