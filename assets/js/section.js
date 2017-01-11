$(window).on('load', function(){
    $('.submenu .navbar-nav').on('click', 'a.btn', function () {
        $('.submenu .navbar-nav a.btn').removeClass('active');
        $(this).addClass('active');
    })
});
