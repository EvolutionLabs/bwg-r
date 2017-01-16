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
    $('[role="combobox"]').removeClass('open');
    $('.modal-dialog').on('click tap', function(e){
        if (e.target.classList.contains('modal-dialog')) {
            $('.modal').modal('hide');
        }
    });
    $('.fa.fa-heart').on('click', function(){
        toastr["success"]("This could display on successful return of the ajax call.", "Added to favs!")
    });
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toast-bottom-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "6000",
        "extendedTimeOut": "1500",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };
    $('[id^="rating-"]').barrating({
        theme:'fontawesome-stars',
        emptyValue: '&times;',
        initialRating: null,
        allowEmpty: true,
        deselectable: true,
        onSelect:function(value, label, event){
            value = JSON.parse(value);
            var message = value ? 'Your ' + value + ' star' + (value > 1 ? 's':'') + ' rating was saved.' : 'Your rating was removed.',
                type = value ? 'success' : 'info',
                title = value ? 'Rating saved' : 'Rating deleted';
            // you should send an ajax call saving the value and only display this toast on success
            setTimeout (function(){
                toastr[type](message, title);
            }, 600);
        }
    });
    $(document)
        .on('click', '.toggleSwitch', toggleSwitch)
        .on('click', '.coco', toggleCartButton);
});

function toggleSwitch(e) {
    var ts = $(e.target).closest('.toggleSwitch'),
        input = ts.find('input').eq(0),
        toggle = ts.find('.toggle');
    console.log(input);
    ts.toggleClass('on');
    toggle.toggleClass('on');
    input.attr('checked', ts[0].classList.contains('on'));
}

function toggleCartButton (e){
    var value = '';
    $(e).children('.option').each(function(){
        $(this).toggleClass('hideMe');
        if (!this.classList.contains('hideMe')) {
            value = $(this).data('value');
        }
    });
    $('#cartAction').val(value);
}