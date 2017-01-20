$(window).on('load', function(){
    $('[href^="#"]').on('click',function(e){
        e.preventDefault();
    });
    $('table tr[data-toggle]').each(function(){
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
        if (window.location.pathname.indexOf('section') > 0){
            var target = $(e.target).closest('a').data('target');
            $(target + ' .hiddenRow>td>.collapse.in[id^="tr-"]').collapse('hide');
        } else if (window.location.pathname.indexOf('planogram') > 0){
            // custom logic for planogram page. not needed anymore (i used tabs)

        } else {
            return false;
        }
    });
    $('a[href="#view-boxes"]').on('click', function(e){
        e.preventDefault();
        if (window.location.pathname.indexOf('section') > 0){
            var target = $(e.target).closest('a').data('target');
            $(target + ' .hiddenRow>td>.collapse[id^="tr-"]').collapse('show');
        } else if (window.location.pathname.indexOf('planogram') > 0){
            // custom logic for planogram page. not needed anymore (i used tabs)
        } else {
            return false;
        }
    });
    $('[role="combobox"]').removeClass('open');
    $('.modal-dialog').on('click tap', function(e){
        if (e.target.classList.contains('modal-dialog')) {
            $('.modal').modal('hide');
        }
    });
    $('#hhtList').on('show.bs.collapse', '[id^="hht"]', function(){
        $(this).closest('li').addClass('active');
    }).on('hide.bs.collapse', '[id^="hht"]', function(){
        $(this).closest('li').removeClass('active');
    });
    /*$('.fa.fa-heart').on('click', function(){
        toastr["success"]("This could display on successful return of the ajax call.", "Added to favs!")
    });*/
    $('.filter-controls').on('click', '.btn-group', function(e){
        var action = $(e.target).closest('.btn-sm').attr('href').replace('#filters-', ''),
            list = $(e.target).closest('.container').find('.filtersList').eq(0);
        if (action == 'all') {
            list.find('input:checkbox').prop('checked', true);
        } else if (action == 'none'){
            list.find('input:checkbox').prop('checked', false);
        } else if (action == 'inverse') {
            list.find('input:checkbox').each(function(){
                $(this).prop('checked', !$(this).prop('checked'));
            });
        }
        return false;
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
        onSelect:function(value){
            value = JSON.parse(value);
            var message = value ? 'Your ' + value + ' star' + (value > 1 ? 's':'') + ' rating was saved.' : 'Your rating was removed.',
                type = value ? 'success' : 'info',
                title = value ? 'Rating saved' : 'Rating deleted';
            /**
             * you should send an ajax call saving the value and only display this toast on success
             * @see http://antenna.io/demo/jquery-bar-rating/examples/
             */

            setTimeout (function(){
                toastr[type](message, title);
            }, 600);
        }
    });
    var e = $('.parallax-scroller')[0];
    if (e) {
        var PS = {
            e: e,
            height: e.getBoundingClientRect().height,
            get top() {
                return $(window).scrollTop()
            },
            get active () {
                return this.height - (this.top + 95 ) > 0;
            },
            get update () {
                if (this.active) {
                    $(this.e).velocity({
                        translateY: (this.top / 2) + 'px'
                    },0)
                }
            },
            init:function(){
                var top = Math.min(e.getBoundingClientRect().top, $(window).height()) / 2;
                $(this.e).velocity({
                    marginTop : '-'+top+'px',
                    paddingTop : top+'px'
                    }
                );
                delete this.init;
                return this;
            }
        }.init();
        $(document).on('scroll', function () {
            PS.update;
        });
    }
    $(document)
        .on('click', '.toggleSwitch', toggleSwitch);
});

function toggleSwitch(e) {
    var ts = $(e.target).closest('.toggleSwitch'),
        input = ts.find('input').eq(0),
        toggle = ts.find('.toggle');
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