<!DOCTYPE html>
<html class="no-js" lang="vi">

<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
@include('themes.rova.giao_dien.head')
<body ng-app="appMain" style="">

<div class="wrapper page-home">
    @include('themes.rova.giao_dien.header')




    @include('themes.rova.giao_dien.footer')
</div>



<div style="display: none;" id="loading-mask">
    <div id="loading_mask_loader" class="loader">
        <img alt="Loading..." src="Images/ajax-loader-main.gif" />
        <div>
            Please wait...
        </div>
    </div>
</div>
<a class="back-to-top" href="#" style="display: inline;">
    <i class="fa fa-angle-up">
    </i>
</a>


</body>


</html>
<script type="text/javascript">
    $(".header-content").css({ "background": '' });
    $("html").addClass('');
    $(document).ready(function () {
        $("img.lazy-img").each(function () {

        });
        $("img.lazy-img").lazyload({
            effect: "fadeIn",
            threshold: 200
        });
    });
</script>

