<div id="header">
    <div class="contenthd">
        <div class="khoi1170">


            <div class="chensubmenu"></div>
            <div class="hotlinetop">


            </div>
        </div>
    </div>
    <div class="menu">
        <div class="khoi1170">


<div class="mainmenu" id="menu">
    <ul>
        <li class="litop home"><a href="/" title="Trang chủ">Trang chủ</a></li>

<li class='litop top'>
    <a class='top' href="{{route('web.about.us',52)}}"  title='GIỚI THIỆU'>GIỚI THIỆU
    </a>
</li>

<li class='litop top'>
    <a class='top' href="{{route('web.post',50)}}"  title='TIN TỨC'>TIN TỨC
    </a>
</li>

<li class='litop top'>
    <a class='top' href="{{route('web.contact')}}"  title='Liên hệ'>Liên hệ
    </a>
</li>

    </ul>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $("#header .menu .mainmenu > ul > li > ul").each(function () {
            var sl = $(this).find("li").length;
            if (sl < 9) {
                $(this).attr("style", "width:290px");
            }
            else if (sl >= 9 && sl < 17) {
                $(this).attr("style", "width:550px;left: 50%;transform: translateX(-50%);");
            }
            else if (sl >= 17 && sl < 25) {
                $(this).attr("style", "width:810px;left: -200px;");
            }
            else {
                $(this).attr("style", "width:1070px;left: -200px;");
            }
        })
    });

</script>



<script type="text/javascript">
    //Script đánh dấu menu hiện tại theo modul (chỉ đúng cho trường hợp menu dẫn tới trang chính modul)
    var cRewrite = "";
    var cHrefInUrl = XuLyLink(document.URL);

    jQuery("#menu li.litop").removeClass("active");
    jQuery("#menu li.litop a").each(function () {
        var href = jQuery(this).attr("href");
        if (href) {
            href = XuLyLink(href);

            if (href === cHrefInUrl || href === cRewrite)
                jQuery(this).parent().addClass("active");

            if (href === "thu-vien") {
                var active = false;
                var listSubRewrite = ["hinh-anh", "video", "tai-lieu"];
                for (var i = 0; i < listSubRewrite.length; i++) {
                    href = listSubRewrite[i];

                    if (href) {
                        if (href.lastIndexOf("index.html") > -1) href = href.substring(href.lastIndexOf("index.html") + 1);
                        if (href.lastIndexOf(".") > -1) href = href.substring(0, href.lastIndexOf("."));
                        if (href === "index.html") href = "";
                        if (href === cRewrite) active = true;
                    }
                }

                if (active)
                    jQuery(this).parent().addClass("active");
            }
        }
    });

    function XuLyLink(href) {
        if (href.lastIndexOf("index.html") > -1)
            href = href.substring(href.lastIndexOf("index.html") + 1);

        if (href.lastIndexOf(".") > -1)
            href = href.substring(0, href.lastIndexOf("."));
        if (href === "index.html") href = "";

        return href;
    }
</script>

            <div class="search">
                <input type="text" value="" id="tbSearchOnMenu" placeholder="Tìm kiếm..." onkeydown="CheckPostSearchOnMenu(event)"/>
                <a class="timkiem" href="javascript://" onclick="PostSearchOnMenu()" title="Tìm kiếm" id="btnsearch"></a>
                <script type="text/javascript">
                    function CheckPostSearchOnMenu(e) {
                        if (e.keyCode === 13) {
                            PostSearchOnMenu();

                            e.preventDefault();
                        }
                    }

                    function PostSearchOnMenu() {
                        $("#tbSearchOnMenu").show().focus();
                        if ($("#tbSearchOnMenu").val() !== "")
                            window.location = "/?go=search&key=" + $("#tbSearchOnMenu").val();
                    }
                    function PostSearchOnMenu1() {
                        $("#tbEmail").show().focus();
                        if ($("#tbEmail").val() !== "")
                            window.location = "/?mail=" + $("#tbEmail").val();
                    }
                </script>
            </div>
        </div>
    </div>
</div>
