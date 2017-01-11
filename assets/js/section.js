$(window).on('load', function(){
    $('.submenu .navbar-nav, .cardTitle').on('click', '.btn', function () {

        var parent = $(this).closest('.filters') || $(this).closest('.btn-group');
        parent.find('.btn').removeClass('active');
        $(this).addClass('active');
    });
    $('.products').on('click', '.fa-2x', function(e){
        e.stopPropagation();
        $(this).closest('td').toggleClass('active');
    })
});
