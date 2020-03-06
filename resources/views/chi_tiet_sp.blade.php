@extends('include.design')
@section('content')
    <form name="form1" method="post" action="" id="form1">
<div>

	<input type="hidden" name="__VIEWSTATEGENERATOR" id="__VIEWSTATEGENERATOR" value="CA0B0334" />
</div>
        <div>
<div>
@include('include.header')
    <div id="content">
        <div class="subchitiet_sp">
            <div class="khoi1170">
                <div class="motasanpham">
                    <div class="left">
                        

<div class="slidesanpham_image">
    
<div class='itemsanpham'>
    <div class='khungAnh '>
        <a class='khungAnhCrop0' href='javascript://'>
            <img alt=" Máy trợ thở Bibap Floton - Đức" class="xzoom" xoriginal="{{$data->image}}" src="{{$data->image}}" />
        </a>
    </div>
</div>

    
</div>
<div class="slidesanpham_icon ">
    <div class='itemsanpham'>
    <div class='khungAnh xzoom-thumbs'>
        <a class='khungAnhCrop0' href="{{$data->image}}">
            <img style="" alt="{{$data->alt}}" class="xzoom-gallery" width="80" src="{{$data->image}}" />
        </a>
    </div>
</div>
    @if($image)
    @foreach($image as $key=>$val)
<div class='itemsanpham'>
    <div class='khungAnh xzoom-thumbs'>
        <a class='khungAnhCrop0' href="{{$val->image}}">
            <img style="" alt="{{$val->alt}}" class="xzoom-gallery" width="80" src="{{$val->image}}" />
        </a>
    </div>
</div>
@endforeach
@endif  
</div>

<script type="text/javascript">
    $(".xzoom, .xzoom-gallery").xzoom({tint: '#333', Xoffset: 15});
    $('.slidesanpham_image').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        dots: false,
        fade: true,
        autoplay: true,
        draggable: true,
        touchMove: false,
        asNavFor: '.slidesanpham_icon'
    });
    $('.slidesanpham_icon').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        arrows: true,
        dots: false,
        fade: false,
        autoplay: false,
        focusOnSelect: true,
        asNavFor: '.slidesanpham_image',
        responsive: [
            {
                breakpoint: 1199,
                settings: {
                    slidesToShow: 5,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            }
        ]
    });
</script>
                    </div>
                    <div class="right">

                        <div class="title_sp">
                            {{$data->title}}</div>
                       
                        {{$data->des}}
                        <div class='priceSP' style="text-align: left;">
                            Giá NY: <strike> <span style="color:#2f0b0b" class='giaKM'>{{ number_format($data->price_pre,0) }} đ</span></strike></br> 
                                                Giá Bán: 
                                                <span  class='giaNY'>{{ number_format($data->price,0) }} đ</span></div>
                        <a href="#!" onclick="GoToCartMrh({{$data->id}})" title="Mua hàng" class="btn_muahang">Mua hàng</a>
                        

                        <div class="daichimuahang">

                        <div class='tieude'>Địa chỉ mua hàng</div>
                        <div class='itemtt'><span>Địa chỉ mua hàng: </span>Codegymsmartphone-CDN BACH KHOA HA NOI </br>
                </div>
                        <div class='itemtt'><span>Tel: </span>0123456789</div>
                        <div class='itemtt'><span>Email:codegymsmartphone@gmail.com </span></div>

                        </div>
                        <div id="CommonCuoiChiTietTin">
                            <div class="phai">
                                <div class="cuoiphai">
                                    
                                </div>
                            </div>
                            <div class="cb"></div>
                        </div>

                    </div>
                </div>
                <div class="row">
                    {!! $data->video !!}
                </div>
                <div class="subttsanpham">
                    <div class="tieude_tuvan">Thông tin sản phẩm</div>
                    <div class="noidungttsp">
                       {!! $data->content !!}

                    </div>
                </div>
                <div class="subctspbottom">
                    <div class="left">
                        

<div class="subsplienquan">
    <div class="listcate_splienquan">
        <div class="tieude_splq">Sản phẩm liên quan</div>
    </div>
    <div class="lstdssanpham slidesanphamkhac">
@foreach($san_pham as $key=>$val)    
<div class='itemsanpham container'>
    <div class='khungAnh'>
        <a class='khungAnhCrop0' href="{{ route('web.chi_tiet',$val->id) }}" title=' {{$val->title}}'>
            <img alt=" {{$val->title}}" class="" src="{{$val->image}}" />
        </a>
    </div>
    <div class='ngoaia'>
        <h3>
            <a class='title' href="{{ route('web.chi_tiet',$val->id) }}" title=' {{$val->title}}'>
                {{$val->title}}
            </a>
        </h3>
    </div>
    <div class='priceSP' >
        Giá NY: <strike> <span style="color:#2f0b0b" class='giaKM'>{{ number_format($val->price_pre,0) }} đ</span></strike></br> 
                                                Giá Bán: 
                                                <span class='giaNY'>{{ number_format($val->price,0) }} đ</span></div>
    <a  class='btn btn_info textdecoration' href="#!" onclick="GoToCartMrh({{$val->id}})" title='Đặt mua'>
                                                <img style="width: 18px;
    height: 24px;
    margin-bottom: -5px;" src="{{asset('home/pic/icon/57d436f05cfdf8d38649b86fd8ecfa7e.png')}}">     Đặt mua
                                                </a>
    <a class='btn_chitiet btn textdecoration' href="{{ route('web.chi_tiet',$val->id) }}" title='Chi tiết'>
    <img style="width: 18px;
    height: 24px;
    margin-bottom: -5px;" src="{{asset('home/pic/icon/57d436f05cfdf8d38649b86fd8ecfa7e.png')}}">     Chi tiết
    </a>
</div>
@endforeach

    </div>
</div>

                    </div>
                    <div class="right">
                        

<div class="csr">
    
    <div class="cb"></div>
</div>

<div class="subhotrotructuyen">
    <div class="tieudedanhmuc_left">Hỗ trợ trực tuyến</div>
    <div class="lstdshotro">
  <div class='itemdshotro'>
                                        <div class='vitri_hotro'>Kinh doanh 1</div>
                                        <div class='titlt_hotline'>Nguyễn Hường: <a href='tel: 0123456789'><span class='sohotline_ht'> 0123456789</span></a>
                                            <div class='icon'>
                                                <a href='https://zalo.me/0123456789' title='Zalo'><span class='iconzalo'></span></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class='itemdshotro'>
                                        <div class='vitri_hotro'>Kinh doanh 2</div>
                                        <div class='titlt_hotline'>Nguyễn Hường: <a href='tel: 0123456789'><span class='sohotline_ht'> 0123456789</span></a>
                                            <div class='icon'>
                                                <a href='https://zalo.me/0123456789' title='Zalo'><span class='iconzalo'></span></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class='itemdshotro'>
                                        <div class='vitri_hotro'>Kinh doanh 3</div>
                                        <div class='titlt_hotline'>Quang Huy: <a href='tel: 0123456789'><span class='sohotline_ht'> 123456789</span></a>
                                            <div class='icon'>
                                                <a href='https://zalo.me/0123456789' title='Zalo'><span class='iconzalo'></span></a>
                                            </div>
                                        </div>
                                    </div>


    </div>
</div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@include('include.footer')

<script type="text/javascript">
    $(window)
    .load(function () {
        $(".khungAnhCrop img")
            .each(function () {
                $(this)
                    .removeClass("wide tall")
                    .addClass((this.width / this.height > $(this).parent().width() / $(this).parent().height())
                        ? "wide"
                        : "tall");
            });
    });
    function GoToCartMrh(id){
        var url = "{{ route('web.cart') }}" + "?id="+id;
        fetch(url).then(function (d) {
            window.location.replace("{{ route('web.cart') }}")
        })
    }
</script>

</div>



        </div>
    </form>
@endsection