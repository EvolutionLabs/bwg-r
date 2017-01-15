$(window).on('load', function(){
    $('[href^="#"]').on('click',function(e){
        e.preventDefault();
    });
    $('table tr[data-toggle]').each(function(i){
        var cS = $(this).next().find('td[colspan]').attr('colspan');
        $(this).before($('<tr />', {
            html:'<td colspan="'+cS+'">' +
                '<div class="rowSpacer"></div>' +
            '</td>',
            class:'clear'
        }))
    });
    $('table').on('hide.bs.collapse', 'tr', function(e){
        if (e.target.id.indexOf('tr-') > -1) {
            var tr = $(e.target).closest('tr');
            tr.prevAll(".clear:first").removeClass('opened');
            var id = e.target.id.substr(e.target.id.indexOf('-') + 1);
            $('#stock-' + id).collapse('hide');
        }
    }).on('show.bs.collapse', 'tr', function(e){
        if (e.target.id.indexOf('tr-') > -1) {
            var tr = $(e.target).closest('tr');
            tr.prevAll(".clear:first").addClass('opened');
        }
    });
    $('a[href="#view-list"]').on('click', function(e){
        e.preventDefault();
        var target = $(e.target).closest('a').data('target');
        console.log(target);
        $(target + ' .hiddenRow>td>.collapse.in[id^="tr-"]').collapse('hide');
    });
    $('a[href="#view-boxes"]').on('click', function(e){
        e.preventDefault();
        var target = $(e.target).closest('a').data('target');
        console.log(target);
        $(target + ' .hiddenRow>td>.collapse[id^="tr-"]').collapse('show');
    });
});
