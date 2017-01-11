$(window).on('load', function(){
    $('.submenu .navbar-nav, .cardTitle').on('click', '.btn', function () {

        var parent = $(this).closest('.filters') || $(this).closest('.btn-group');
        parent.find('.btn').removeClass('active');
        $(this).addClass('active');
    })
});
