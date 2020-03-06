@extends('include.design')
@section('content')


<div>

	<input type="hidden" name="__VIEWSTATEGENERATOR" id="__VIEWSTATEGENERATOR" value="CA0B0334" />
</div>
        <div>


<div>


@include('include.header')

<div id="duongdanlink">
    <div class="khoi1170">
        <ul class="duongdan_link">
            <li><a href="/" title="Trang chủ">Trang chủ</a></li>
            <li><a href="" title='Sản phẩm'>Sản phẩm</a></li>
        </ul>
    </div>
</div>

    <div id="content">
        <div class="subgiohang">
            <div class="khoi1170">
                <div class="tieude_thongtin">Thông tin giỏ hàng</div>
                <div class="thogntindonhang">
                    <table class="formgiohang" id="TableCart">
                        <thead>
                            <tr>
                                <th class="stt">STT</th>
                                <th class="image"></th>
                                <th class="title"></th>
                                <th class="giaban">Giá tiền</th>
                                <th class="soluong">Số lượng</th>
                                <th class="thanhtien">Thành tiền</th>
                                <th class="thanhtien">Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $total = 0; $i = 1; ?>
                        @if(session('cart'))
                            @foreach(session('cart') as $id => $details)

                                <?php  $total += (int)$details['price_pre'] * (int)$details['quantity'] ?>

                                <tr>
                                    <td class="stt">{{ $i++ }}</td>
                                    <td class="image">
                                        <img src="{{ $details['photo'] }}" />
                                    </td>
                                    <td class="title">{{ $details['name'] }}</td>
                                    <td class="giaban{{$id}} giaban ">{{ $details['price_pre'] }}</td>
                                    <td class="soluong">
                                        <div>
                                            <input class="soluong{{$id}}" onchange="updateCartMrh({{$id}});"  type="number" min="1" max="10000" value="{{ $details['quantity'] }}">
                                        </div>
                                    </td>
                                    <td class="thanhtien{{$id}} thanhtien  tinhtongtien">{{ $details['price_pre'] * $details['quantity'] }}</td>
                                    <td class="xoa"><a class="btn btn-danger" href="#!" onclick="mrhRemove({{$id}})"><i class="icon"></i>Xóa sản phẩm</a></td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                    <div class="tongtien">Tổng tiền: <span class="tongtienmrh">{{ $total }}</span></div>
                    <div>
                        <a style="    float: right;
    width: auto;
    height: 24px;
    padding: 10px 25px 6px 25px;
    /* border-radius: 10px; */
    font-family: RobotoMedium;
    font-size: 14px;
    color: #fff;
    display: inline-block;
    text-transform: uppercase;
    line-height: 24px;
    background: #0e76bc;" href="/">Tiếp tục mua hàng!</a>
                    </div>
                </div>
                <form method="post" action="{{ route('web.contact.post') }}"> @csrf
                <div class="formttkhachhang">
                    <div class="motaluuy">Để gửi đơn hàng này Quý khách vui lòng điền thông tin theo mâu bên dưới</div>
                    <div class="formdathang">
                        <div class="itemformlh">
                            <span>Họ tên: <span>*</span></span>
                            <input id="mrh_name" type="text" required name="name"/>
                        </div>
                        <div class="itemformlh">
                            <span>Email: <span>*</span></span>
                            <input id="mrh_email" type="text" required name="email"/>
                        </div>
                        <div class="itemformlh">
                            <span>Điện thoại: <span>*</span></span>
                            <input id="mrh_phone" type="text" required name="phone"/>
                        </div>
                        <div class="itemformlh">
                            <span>Địa chỉ: <span>*</span></span>
                            <input id="mrh_address" type="text" required name="address"/>
                        </div>
                        <div class="itemformlh itemnoidunglh">
                            <span>Nội dung: </span>
                            <textarea id="mrh_content" rows="2" cols="20" name="note"></textarea>
                        </div>
                    </div>
                    <div class="ngoaiguidh">
                       <button type="submit" class="border-0" ><a class="guidonhang" >Gửi đơn hàng</a></button>
                    </div>
                </div>
                </form>
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
    function updateCartMrh(id) {
        var sl = $('.soluong'+id).val()
        var url = "{{ route('web.update.cart') }}"+"?id=" +id+ "&quantity="+sl;
        fetch(url).then(function (data) {
            var gia = $('.giaban'+id).html()
            $('.thanhtien'+id).html(sl * gia)
        }).then(function () {
            var tong_mrh = 0;
            $('.tinhtongtien').each(function (key,val) {
                tong_mrh += Number($(this).html())
            })
            $('.tongtienmrh').html(tong_mrh)
        })
    }
    function mrhRemove(id) {
        var url = "{{ route('web.remove.cart') }}"+"?id=" +id;
        fetch(url).then(function (data) {
            window.location.replace("{{ route('web.cart') }}");
        })
    }
</script>

</div>





        </div>
@endsection
