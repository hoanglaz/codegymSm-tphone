@extends('themes.rova.layouts.design')
@section('title',"Thông tin liên hệ sàn gỗ cao cấp Parador Việt Nam")
@section('description',"Parador Việt Nam hỗ trợ khách hàng cũng như tư vấn sản phẩm phù hợp nhất cho người Việt")

@section('content')

    <!-- BREADCRUMBS AREA START -->
    <div class="breadcrumbs-area bread-bg-1 bg-opacity-black-70">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="breadcrumbs">
                        <h2 class="breadcrumbs-title">Liên hệ</h2>
                        <ul class="breadcrumbs-list">
                            <li><a href="{{ route('web.index') }}">Trang chủ</a></li>
                            <li>Liên hệ</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BREADCRUMBS AREA END -->

    <!-- Start page content -->
    <section id="page-content" class="page-wrapper">

        <!-- CONTACT AREA START -->
        <div class="contact-area pt-115 pb-115">
            <div class="container">
                <div class="row">
                    <div class="col-sm-5 col-xs-12">
                        <!-- get-in-toch -->
                        <div class="get-in-toch">
                            <div class="section-title mb-30">
                                <h3>Đại lý phân phối sàn gỗ độc quyền</h3>
                                <h2>PARADOR</h2>
                            </div>
                            <div class="contact-desc mb-50">
                                <p>
                                    <span data-placement="top" data-toggle="tooltip" data-original-title="The name you can trust" class="tooltip-content">Parador</span> Hãng sàn gỗ cao cấp số 1 Châu Âu với thiết kế đa dạng và phong phú. Các mãu sàn gỗ được thiết kế tinh vi, chuyên nghiệp phù hợp mới mọi không gian căn hộ, từ hiện đại đến cổ kính, từ sáng tạo cho đến tự nhiên, ...</p>
                            </div>
                            <ul class="contact-address">
                                <li>
                                    <div class="contact-address-icon">
                                        <img src="{{ asset('theme/rova/images/icons/location-2.png') }}" alt="">
                                    </div>
                                    <div class="contact-address-info">
                                        <span>{{ $parador['address']->value }}</span>
                                        <span>Không gian trải nghiệm mới mẻ</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="contact-address-icon">
                                        <img src="{{ asset('theme/rova/images/icons/phone-3.png') }}" alt="">
                                    </div>
                                    <div class="contact-address-info">
                                        <span>Telephone : {{ $parador['phone']->value }}</span>
                                        <span>Hỗ trợ tư vấn và hởi đáp 24h</span>

                                    </div>
                                </li>
                                <li>
                                    <div class="contact-address-icon">
                                        <img src="{{ asset('theme/rova/images/icons/world.png') }}" alt="">
                                    </div>
                                    <div class="contact-address-info">
                                        <span>Email : {{ $parador['email']->value }}</span>
                                        <span>Mọi thông tin liên hệ qua thư điện tử</span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-7 col-xs-12">
                        <div class="contact-messge contact-bg">
                            <!-- blog-details-reply -->
                            <div class="leave-review">
                                <h5>Hỏi đáp thắc mắc & tư vấn</h5>
                                <label id="cmt-note" class="form-control hidden"></label>
                                <form  id="contact-form" action="#">
                                    <input type="text" name="name" placeholder="Your name" id="cmt-name">
                                    <input type="email" name="email" placeholder="Email" id="cmt-email">
                                    <textarea name="message" placeholder="Write here" id="cmt-content"></textarea>
                                    <button type="reset" class="submit-btn-1" onclick="sendCommnet();">Gửi</button>
                                </form>
                                <p class="form-messege mb-0"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- CONTACT AREA END -->

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
                id: 0,
                type: "contact",
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
