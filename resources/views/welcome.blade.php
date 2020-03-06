@extends('include.design')
@section('content')
<form name="form1" method="post" action="" id="form1">
    <div>

        <div>

            @include('include.header')
            <?php
            use Illuminate\Support\Facades\DB;
            ?>
            <div id="slide_trangchu">
                <div class="mainslide">

                    <div class='itemslidebox'>
                        <div class='khungAnh'>
                            <a class='khungAnhCrop' href='javascript://' target='_blank' title='2'>
                                <img class='pc' alt='2' src='home/pic/banner/web1.jpg' />
                                <img class='mb' alt='2' src='home/pic/banner/mo2.jpg' />
                            </a>
                        </div>
                    </div>

                    <div class='itemslidebox'>
                        <div class='khungAnh'>
                            <a class='khungAnhCrop' href='javascript://' target='_blank' title='1'>
                                <img class='pc' alt='1' src='home/pic/banner/web2.jpg' />
                                <img class='mb' alt='1' src='home/pic/banner/mo1.jpg' />
                            </a>
                        </div>
                    </div>

                </div>
            </div>
            <script type="text/javascript">

                $('.mainslide').slick({
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    arrows: true,
                    dots: false,
                    fade: false,
                    autoplay: true,
                });

            </script>



            <div class="hotline2">

                <a class='hotlinesauslide' href='tel: 0123456789'>Hotline: <span class='sohotline2'> 0123456789</span></a>
            </div>

            <div id="content">
                <div class="PageContentHome">
                    <div class="khoi1170">
                        <div class="left">

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
                                        <div class='titlt_hotline'>Quang Huy <a href='tel: 0123456789'><span class='sohotline_ht'> 0123456789</span></a>
                                            <div class='icon'>
                                                <a href='https://zalo.me/0123456789' title='Zalo'><span class='iconzalo'></span></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class='itemdshotro'>
                                        <div class='vitri_hotro'>Kinh doanh 3</div>
                                        <div class='titlt_hotline'>Anh Hoàng <a href='tel: 0123456789'><span class='sohotline_ht'> 0123456789</span></a>
                                            <div class='icon'>
                                                <a href='https://zalo.me/0123456789' title='Zalo'><span class='iconzalo'></span></a>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                            <div class="subdanhmuc">
                                <div class="tieudedanhmuc_left">Danh mục sản phẩm</div>
                                <ul>
                                    @foreach($categori as $key=>$value)
                                        <li class=''><a href="{{ route('web.san_pham',$value->id) }}" title='{{$value->title}}'><span>{{$value->title}}</span></a></li>
                                    @endforeach
                                </ul>
                            </div>



                            <div class="csr">

                                <div class="cb"></div>
                            </div>

                            
                            <div class="subhotrotructuyen">
                                <div class="tieudedanhmuc_left">Đường dẫn link</div>
                                <div class="lstdshotro">
                                    <div class='itemdshotro' style="background:none!important;">
                                        <a target="_blank" href="#"><img alt="ảnh" class="" width="200px" src="home/images.png" /></a>
                                    </div>
                                    <div class='itemdshotro' style="background:none!important;">
                                        <a target="_blank" href="#"><img alt="ảnh" class="" width="200px" src="home/like-icon-facebook-19.jpg" /></a>
                                    </div>
                                </div>
                            </div>

                        


                            <div class="subduantieubieu">
                                <div class="tieudedanhmuc_left">Sản Phẩm Mới </div>
                                <div class="lstdsduantieubieu">
                                    <div class="slideduan_image">
                                    @foreach($new_product as $key=>$val)
                                        <div class='itemduantieubieu'>
                                            <div class='khungAnh'>
                                                <a class='khungAnhCrop' href="{{route('web.chi_tiet',$val->id)}}" title='Sản Phẩm Mới'>
                                                    <img alt="Sản Phẩm Mới" class="" src="{{$val->image}}" />
                                                </a>
                                            </div>
                                        </div>
                                        @endforeach


                                    </div>
                                    <div class="slideduan_icon">
                                        @foreach($new_product as $key=>$valu)
                                        <div class='itemduantieubieu'>
                                            <div class='khungAnh'>
                                                <a class='khungAnhCrop' href='javascript://' title='Sản Phẩm Mới'>
                                                    <img alt="Sản Phẩm Mới" class="" src="{{$valu->image}}" />
                                                </a>
                                            </div>
                                        </div>
                                        @endforeach


                                    </div>
                                </div>
                            </div>

                            <script type="text/javascript">
                                $('.slideduan_image').slick({
                                    slidesToShow: 1,
                                    slidesToScroll: 1,
                                    arrows: true,
                                    dots: false,
                                    fade: true,
                                    autoplay: true,
                                    draggable: true,
                                    touchMove: false,
                                    asNavFor: '.slideduan_icon'
                                });
                                $('.slideduan_icon').slick({
                                    slidesToShow: 3,
                                    slidesToScroll: 1,
                                    arrows: false,
                                    dots: false,
                                    fade: false,
                                    autoplay: false,
                                    focusOnSelect: true,
                                    asNavFor: '.slideduan_image'
                                });
                            </script>

                            <div class="subthongketuycap">
                                <div class="tieudedanhmuc_left">Thống kê truy cập</div>
                                <div class="lstthongketruycap">

                                    <div class="thongke_tong">Tất cả <span class="songuoi">64.511</span></div>
                                    <div class="thongke_online">
                                        <span class="songuoi_online">Số người đang online: 3</span>
                                        <span class="onlinecounter">Online Counter</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="right">
                            @foreach($show as $key=>$value)
                                <div class='subsanpham'>
                                    <div class='listcate'>
                                        <div class='item_cate'>
                                            <h2>
                                                <a class='tieude' href="{{ route('web.san_pham',$value->id) }}" title='Máy trợ thở'>
                                                    <span class='iconds'></span>
                                                    {{$value->title}}
                                                </a>
                                            </h2>
                                        </div>
                                        <a class='xemtatca' href="{{ route('web.san_pham',$value->id) }}" title='Xem tất cả'>Xem tất cả</a>
                                    </div><div class='lstdssanpham'>
                                        <?php
                                        $a = DB::table('products')
                                            ->leftJoin('product_cates', 'product_cates.product_id', '=', 'products.id')
                                            ->where('product_cates.category_id',$value->id)
                                            ->orderBy('id','desc')
                                            ->limit(8)
                                            ->get();

                                        ?>
                                        @foreach($a as $key=>$val)
                                            <div class='itemsanpham container'>
                                                <div class='khungAnh'>
                                                    <a class='khungAnhCrop0' href="{{ route('web.chi_tiet',$val->id) }}" title='{{$val->title}}'>
                                                        <img style="height: 170px;
    /*margin: 4px;*/
    /* top: 5px; */
    /*padding: 3px;*/
    /*border: 1px solid rebeccapurple;*/
    width: 90%;
    " alt="" class="my-image" src="{{$val->image}}" />
                                                    </a>
                                                </div>
                                                <div class='ngoaia'>
                                                    <h3>
                                                        <a class='title' href="{{ route('web.chi_tiet',$val->id) }}" title='{{$val->title}}'>
                                                            {{$val->title}}
                                                        </a>
                                                    </h3>
                                                </div>
                                                <div class='priceSP'>
                                                    <span
                                                    @if($val->price_pre==0)
                                                   class="hidden"
                                                    @endif
                                                    >Giá NY: <strike> <span style="color:#2f0b0b" class='giaKM'>{{ number_format($val->price_pre,0) }} đ</span></strike></br></span>
                                                  <span>Giá Bán:
                                                <span class='giaNY'>{{ number_format($val->price,0) }} đ</span></span>
                                                </div>
                                                <a
                                                class="btn btn_info textdecoration left_hai" href="#!" onclick="GoToCartMrh({{$val->id}})" title='Đặt mua'>
                                                <img style="width: 18px;
    height: 24px;
    margin-bottom: -5px;" src="{{asset('home/pic/icon/57d436f05cfdf8d38649b86fd8ecfa7e.png')}}">    Đặt mua
                                                </a>
                                                <a class="btn_chitiet  btn textdecoration" href="{{ route('web.chi_tiet',$val->id) }}" title="Chi Tiết">
                                                <img style="width: 18px;
    height: 22px;
    margin-bottom: -5px;" src="{{asset('home/pic/icon/57d436f05cfdf8d38649b86fd8ecfa7e.png')}}">     Chi Tiết
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
            @include('include.footer')


            <script type="text/javascript">
                function GoToCartMrh(id){
        var url = "{{ route('web.cart') }}" + "?id="+id;
        fetch(url).then(function (d) {
            window.location.replace("{{ route('web.cart') }}")
        })
    }
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
            </script>

        </div>

    </div>
</form>
@endsection
