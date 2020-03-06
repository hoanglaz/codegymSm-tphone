$(document).ready(function () {
    $('.clickmenu').click(function () {
        $(this).parent().toggleClass("acset");
    });
    $('.chensubmenu').click(function () {
        $('.chensubmenu').toggleClass("active");
        $('#header .menu .search').toggleClass("active_search");
        $('#header .menu').toggleClass("active");
    });
});