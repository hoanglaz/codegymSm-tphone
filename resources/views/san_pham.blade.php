@extends('include.design')
@section('content')
    <form name="form1" method="post" action="/giuong-benh-nhan.htm" id="form1">


        <div>

<div>

@include('include.header')


    <div id="content">
        <div class="PageContentLoadControl">
            <div class="khoi1170">
                <div class="left">
                    <div class="subsanpham subdssanpham">
                        <div class="listcate">
                            <div class="item_cate">

<h2>
    <a class='tieude' href='#' title='Bu lông Inox'>
        <span class='iconds'>
        </span>
        @foreach($categoris as $key=>$value)
       {{$value->title}}
       @endforeach
    </a>
</h2>

                            </div>
                        </div>
                        <div class="lstdssanpham">
@foreach($product as $key=>$value)
<div class='itemsanpham'>
    <div class='khungAnh'>
        <a class='khungAnhCrop0' href="{{ route('web.chi_tiet',$value->id) }}" title=''>
                <img alt="" style="height: 140px;
    margin: 4px;
    /* top: 5px; */
    padding: 3px;
    border: 1px solid rebeccapurple;" class="" src="{{$value->image}}" />
            </a>
    </div>
    <div class='ngoaia'>
        <h3>
            <a class='title' href="{{ route('web.chi_tiet',$value->id) }}" title='#'>
                {{$value->title}}
            </a>
        </h3>
    </div>
    <div class='priceSP'>
        Giá NY: <strike> <span style="color:#2f0b0b" class='giaKM'>{{ number_format($value->price_pre,0) }} đ</span></strike></br> 
                                                Giá Bán: 
                                                <span class='giaNY'>{{ number_format($value->price,0) }} đ</span></div>
     <a style="margin-left:10%;" class='btn btn_info textdecoration' href="#!" onclick="GoToCartMrh({{$value->id}})" title='Đặt mua'>
                                                <img style="width: 18px;
    height: 24px;
    margin-bottom: -5px;" src="{{asset('home/pic/icon/57d436f05cfdf8d38649b86fd8ecfa7e.png')}}">     Đặt mua
                                                </a>
    <a class='btn_chitiet btn textdecoration' href="{{ route('web.chi_tiet',$value->id) }}" title='Chi tiết'>
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
    <div class="tieudedanhmuc_left">Hỗ trợ trực tuyến</div>
    <div class="lstdshotro">


<div class='itemdshotro'>
                                        <div class='vitri_hotro'>Kinh doanh 1</div>
                                        <div class='titlt_hotline'>Ngân Hà: <a href='tel: 0963328358'><span class='sohotline_ht'> 0963328358</span></a>
                                            <div class='icon'>
                                                <a href='https://zalo.me/0963328358' title='Zalo'><span class='iconzalo'></span></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class='itemdshotro'>
                                        <div class='vitri_hotro'>Kinh doanh 2</div>
                                        <div class='titlt_hotline'>Ngân Hà: <a href='tel: 0945328358'><span class='sohotline_ht'> 0945328358</span></a>
                                            <div class='icon'>
                                                <a href='https://zalo.me/0945328358' title='Zalo'><span class='iconzalo'></span></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class='itemdshotro'>
                                        <div class='vitri_hotro'>Kinh doanh 3</div>
                                        <div class='titlt_hotline'>Ngân Hà: <a href='tel: 0973888067'><span class='sohotline_ht'> 0973888067</span></a>
                                            <div class='icon'>
                                                <a href='https://zalo.me/0973888067' title='Zalo'><span class='iconzalo'></span></a>
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
