$(window).on('load', function(){
    $('.submenu .navbar-nav, .cardTitle').on('click', '.btn', function () {
        $(this).parent().parent().parent().find('.btn').removeClass('active');
        $(this).addClass('active');
    });
    $('.products').on('click', 'td>.dropdown>.dropdown-menu', function(e){
        e.stopPropagation();
        $(this).closest('.dropdown-menu').dropdown('toggle');
        $(this).closest('td').toggleClass('active');
    }).on('click', '.qty>.input-group-addon', function(e){
        e.stopPropagation();
        var field = $(this).closest('.input-group').find('.form-control'),
            val = field.val() ? field.val() * 1 : 0;
        if (val < 1 ) {
            field.val(1);
        } else {
            if ($(this).is(':first-child') && val > 1) {
                field.val(val - 1);
            }
            if ($(this).is(':last-child')) {
                field.val(val + 1);
            }
        }
    });
    $('.megaMenu').on('click', function(e){
        e.stopPropagation();
    });
    if (window.location.pathname.indexOf('planogram') > 0){
        $('.planogram').magnificPopup({
            delegate:'.imgSlot',
            type: 'image',
            mainClass: 'mfp-with-zoom',

            zoom: {
                enabled: true,

                duration: 300,
                easing: 'ease-in-out',

                opener: function(openerElement) {
                    return openerElement.is('img') ? openerElement : openerElement.find('img');
                }
            }
        });
        $('.simpleList').magnificPopup({
            delegate: 'li>a',
            type: 'image',
            mainClass: 'mfp-with-zoom',

            zoom: {
                enabled: true,

                duration: 300,
                easing: 'ease-in-out',

                opener: function(openerElement) {
                    return openerElement.is('img') ? openerElement : openerElement.find('i');
                }
            }
        });
        $('#planogram').velocity('scroll', {
            duration: 700,
            offset: -95,
            easing: 'cubic-bezier(.4,0,.2,1)'
        });
    }

});
