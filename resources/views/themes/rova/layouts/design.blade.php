<?php if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) ob_start("ob_gzhandler"); else ob_start(); ?>
        <!DOCTYPE html>

<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- Begin Head -->
<head>
    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta name="description"  content="@yield('description')"/>
    <meta name="keywords" content="@yield('meta_key')" />
    <meta name="robots" content="noodp,index,follow" />
    <meta name='revisit-after' content='1 days' />
    <meta http-equiv="content-language" content="vi"/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="author"  content="ngo van hoang"/>
    <meta name="MobileOptimized" content="320" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="og:image" content="@yield('image')"/>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset($favicon->data) }}">
    @include('themes.rova.layouts.css')

</head>

<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<div class="wrapper">

    @include('themes.rova.layouts.menu')

    @yield('content')

    @include('themes.rova.layouts.footer')

</div>

@include('themes.rova.layouts.js')
<div class="call-now" >
    <a class="btn-call-now" href="tel:{{$parador['phone']->value}}">
        <i class="icon-phone" aria-hidden="true"></i>
        <p>Hỗ trợ sản phẩm (24/7) <strong>{{$parador['phone']->value}}</strong></p>
    </a>
</div>


<div class="phonering-alo-phone phonering-alo-green phonering-alo-show hidden-xs visible-sm visible-md visible-lg" id="phonering-alo-phoneIcon" style="right: -40px; bottom: 0px; display: block;">
    <div class="phonering-alo-ph-circle"></div>
    <div class="phonering-alo-ph-circle-fill"></div>
    <a href="tel:{{$parador['phone']->value}}"></a>
    <div class="phonering-alo-ph-img-circle">
        <a href="tel:{{$parador['phone']->value}}"></a>
        <a href="tel:{{$parador['phone']->value}}" class="pps-btn-img " title="Liên hệ">
            <img src="https://namdinhweb.net/wp-content/uploads/2018/07/0.png" alt="Liên hệ" width="50" onmouseover="this.src='https://namdinhweb.net/wp-content/uploads/2018/07/0.png';" onmouseout="this.src='https://namdinhweb.net/wp-content/uploads/2018/07/0.png';">
        </a>
    </div>
</div>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=@if(isset($parador['google']->value))
{{$parador['google']->value}}@endif"></script>

<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', '@if(isset($parador["google"]->value)){{$parador["google"]->value}}@endif');
</script>
@yield('js')

<style>
    .fb-livechat, .fb-widget {
        display: none
    }

    .ctrlq.fb-button,
    .ctrlq.fb-close {
        position: fixed;
        right: 24px;
        cursor: pointer
    }

    .ctrlq.fb-button {
        z-index: 999;
        background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/PjwhRE9DVFlQRSBzdmcgIFBVQkxJQyAnLS8vVzNDLy9EVEQgU1ZHIDEuMS8vRU4nICAnaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkJz48c3ZnIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDEyOCAxMjgiIGhlaWdodD0iMTI4cHgiIGlkPSJMYXllcl8xIiB2ZXJzaW9uPSIxLjEiIHZpZXdCb3g9IjAgMCAxMjggMTI4IiB3aWR0aD0iMTI4cHgiIHhtbDpzcGFjZT0icHJlc2VydmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiPjxnPjxyZWN0IGZpbGw9IiMwMDg0RkYiIGhlaWdodD0iMTI4IiB3aWR0aD0iMTI4Ii8+PC9nPjxwYXRoIGQ9Ik02NCwxNy41MzFjLTI1LjQwNSwwLTQ2LDE5LjI1OS00Niw0My4wMTVjMCwxMy41MTUsNi42NjUsMjUuNTc0LDE3LjA4OSwzMy40NnYxNi40NjIgIGwxNS42OTgtOC43MDdjNC4xODYsMS4xNzEsOC42MjEsMS44LDEzLjIxMywxLjhjMjUuNDA1LDAsNDYtMTkuMjU4LDQ2LTQzLjAxNUMxMTAsMzYuNzksODkuNDA1LDE3LjUzMSw2NCwxNy41MzF6IE02OC44NDUsNzUuMjE0ICBMNTYuOTQ3LDYyLjg1NUwzNC4wMzUsNzUuNTI0bDI1LjEyLTI2LjY1N2wxMS44OTgsMTIuMzU5bDIyLjkxLTEyLjY3TDY4Ljg0NSw3NS4yMTR6IiBmaWxsPSIjRkZGRkZGIiBpZD0iQnViYmxlX1NoYXBlIi8+PC9zdmc+) center no-repeat #0084ff;
        width: 60px;
        height: 60px;
        text-align: center;
        bottom: 350px;
        border: 0;
        outline: 0;
        border-radius: 60px;
        -webkit-border-radius: 60px;
        -moz-border-radius: 60px;
        -ms-border-radius: 60px;
        -o-border-radius: 60px;
        box-shadow: 0 1px 6px rgba(0, 0, 0, .06), 0 2px 32px rgba(0, 0, 0, .16);
        -webkit-transition: box-shadow .2s ease;
        background-size: 80%;
        transition: all .2s ease-in-out
    }

    .ctrlq.fb-button:focus,
    .ctrlq.fb-button:hover {
        transform: scale(1.1);
        box-shadow: 0 2px 8px rgba(0, 0, 0, .09), 0 4px 100px rgba(0, 0, 0, .24)
    }

    .fb-widget {
        background: #fff;
        z-index: 1000;
        position: fixed;
        width: 360px;
        height: 395px;
        overflow: hidden;
        opacity: 0;
        bottom: 0;
        right: 24px;
        border-radius: 6px;
        -o-border-radius: 6px;
        -webkit-border-radius: 6px;
        box-shadow: 0 5px 40px rgba(0, 0, 0, .16);
        -webkit-box-shadow: 0 5px 40px rgba(0, 0, 0, .16);
        -moz-box-shadow: 0 5px 40px rgba(0, 0, 0, .16);
        -o-box-shadow: 0 5px 40px rgba(0, 0, 0, .16)
    }

    .fb-credit {
        text-align: center;
        margin-top: 8px
    }

    .fb-credit a {
        transition: none;
        color: #bec2c9;
        font-family: Helvetica, Arial, sans-serif;
        font-size: 12px;
        text-decoration: none;
        border: 0;
        font-weight: 400
    }

    .ctrlq.fb-overlay {
        z-index: 0;
        position: fixed;
        height: 100vh;
        width: 100vw;
        -webkit-transition: opacity .4s, visibility .4s;
        transition: opacity .4s, visibility .4s;
        top: 0;
        left: 0;
        background: rgba(0, 0, 0, .05);
        display: none
    }

    .ctrlq.fb-close {
        z-index: 4;
        padding: 0 6px;
        background: #365899;
        font-weight: 700;
        font-size: 11px;
        color: #fff;
        margin: 8px;
        border-radius: 3px
    }

    .ctrlq.fb-close::after {
        content: "X";
        font-family: sans-serif
    }

    .bubble {
        width: 20px;
        height: 20px;
        background: #c00;
        color: #fff;
        position: absolute;
        z-index: 999999999;
        text-align: center;
        vertical-align: middle;
        top: -2px;
        left: -5px;
        border-radius: 50%;
    }

    .bubble-msg {
        width: 120px;
        left: -140px;
        top: 5px;
        position: relative;
        background: rgba(59, 89, 152, .8);
        color: #fff;
        padding: 5px 8px;
        border-radius: 8px;
        text-align: center;
        font-size: 13px;
    }

</style>
<div class="fb-livechat">
    <div class="ctrlq fb-overlay">

    </div>
    <div class="fb-widget">
        <div class="ctrlq fb-close">

        </div>
        <div class="fb-page" data-href="https://www.facebook.com/paradorvietnam" data-tabs="messages"
             data-width="360" data-height="300" data-small-header="true" data-hide-cover="true"
             data-show-facepile="false">
        </div>
        <div class="fb-credit">
            <a href="https://www.facebook.com/paradorvietnam" target="_blank">Sàn gỗ Parador</a>
        </div>
        <div id="fb-root">

        </div>
    </div>
    <a href="https://m.me/paradorvietnam" title="Gửi tin nhắn cho Parador qua Facebook" class="ctrlq fb-button">
        <div class="bubble">1</div>
    </a>
</div>
<script src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.9"></script>

<script>
    jQuery(document).ready(function($) {
            function detectmob() {
                if( navigator.userAgent.match(/Android/i) || navigator.userAgent.match(/webOS/i) || navigator.userAgent.match(/iPhone/i) || navigator.userAgent.match(/iPad/i) || navigator.userAgent.match(/iPod/i) || navigator.userAgent.match(/BlackBerry/i) || navigator.userAgent.match(/Windows Phone/i)) {
                    return true;
                }
                else {
                    return false;
                }
            }
            var t= {
                    delay: 125, overlay: $(".fb-overlay"), widget: $(".fb-widget"), button: $(".fb-button")
                }
            ;
            setTimeout(function() {
                    $("div.fb-livechat").fadeIn()
                }
                , 8 * t.delay);
            if(!detectmob()) {
                $(".ctrlq").on("click", function(e) {
                        e.preventDefault(), t.overlay.is(":visible") ? (t.overlay.fadeOut(t.delay), t.widget.stop().animate( {
                                bottom: 0, opacity: 0
                            }
                            , 2 * t.delay, function() {
                                $(this).hide("slow"), t.button.show()
                            }
                        )): t.button.fadeOut("medium", function() {
                                t.widget.stop().show().animate( {
                                        bottom: "30px", opacity: 1
                                    }
                                    , 2 * t.delay), t.overlay.fadeIn(t.delay)
                            }
                        )
                    }
                )
            }
        }

    );
</script>
<style>
    .hotline-footer{display:none}

    .hotline-footer{display:block; position:fixed; bottom:0; width:100%; height:50px; z-index:999999999;}
    .hotline-footer .left{    width: 200px;
        float: left;
        height: 100%;
        color: white;
        line-height: 43px;
        text-align: center;}


    .blog-single .large-3 .widget-area .section4{display:none}.tin-tuc-section .cot1-2{display:none}.hotline-footer a{color:white}
    .hotline-footer a{display:block;}.hotline-footer .left a{    background: #0082d0;
                                         line-height: 40px;
                                         margin: 5px 0px 5px 0px;
                                         border-radius: 3px;}.hotline-footer .right a{background: #3fb801;
                                                                 line-height: 40px;
                                                                 margin: 5px;
                                                                 border-radius: 3px;}
    .hotline-footer .left img, .hotline-footer .right img{width:30px;    padding-right: 10px;}
</style>
<div class="hotline-footer" >
    <div class="left"   onclick="nhanThongBao();">
        <a href="#!" data-toggle="modal" data-target="#myModal" id="info-ads">Nhận báo giá và tư vấn</a>
    </div>

</div>
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" >Tư vấn và báo giá miễn phí</h4>
            </div>
            <div class="modal-body">
                <form  id="contact-form" action="#">
                    <input type="text" name="name" placeholder="Tên bảo bạn" id="cmt-name" required>
                    <input type="email" name="email" placeholder="Địa chỉ mail" id="cmt-email" required>
                    <input type="text" name="phone" placeholder="Số điện thoại" id="cmt-phone" required>
                    <textarea name="message" placeholder="Parador luôn lắng nghe bạn ..." id="cmt-content"></textarea>
                    <button type="reset" class="submit-btn-1" onclick="sendCommnet();" data-dismiss="modal">Gửi</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
            </div>
        </div>

    </div>
</div>
<script>
    function nhanThongBao(){
        console.log(1);
    }
</script>
<script>

    function postData(url = '', data = {}) {
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
        $("#info-ads").html("Gửi yêu cầu thành công !");
        var send1 = {name: $('#cmt-name').val(),
            email: $('#cmt-email').val(),
            content: $('#cmt-content').val(),
            phone: $('#cmt-phone').val(),
            id: 0,
            type: "ads",
        };
        postData(url, send1)
            .then(function (data1) {

                if (data1.status) {
                    $("#cmt-note").removeClass('hidden').addClass("alert-success").html(data1.note);
                }else {
                    $("#cmt-note").removeClass('hidden').addClass("alert-warning").html(data1.note);
                }
            })
            .catch(error => console.error(error));

    }
</script>
</body>
</html>