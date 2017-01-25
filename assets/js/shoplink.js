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
    $('.products').on('click', 'td>.dropdown>.dropdown-menu', function(e){
        e.stopPropagation();
        $(this).closest('.dropdown-menu').dropdown('toggle');
        $(this).closest('td').toggleClass('active');
    }).on('click', '.input-group-addon', function(e){
        e.stopPropagation();
        if ($(e.target).closest('.qty')) {
            var field = $(this).closest('.input-group').find('.form-control'),
                val = field.val() ? field.val() * 1 : 0;
            if (val < 0 ) {
                field.val(0);
            }
            if ($(this).is(':first-child') && val > 0) {
                field.val(val - 1);
            }
            if ($(this).is(':last-child')) {
                field.val(val + 1);
            }
            console.log($(this).is(':first-child'), $(this).is(':last-child'));
        }
    }).on('click', 'td.hide-x', function(e){
        e.stopPropagation();
    });
    $('table').on('hide.bs.collapse', 'tr', function(e){
        if (e.target.id.indexOf('tr-') > -1) {
            var tr = $(e.target).closest('tr'),
                inputGroup = tr.find('.right-col>.rltv .input-group').eq(0),
                td = $('[data-target="#'+e.target.id+'"]').find('td.no-grow.hide-x').eq(0);
            td.append(inputGroup);
            tr.prevAll(".clear:first").removeClass('opened');
            var id = e.target.id.substr(e.target.id.indexOf('-') + 1);
            $('#stock-' + id).collapse('hide');
        }
    }).on('show.bs.collapse', 'tr', function(e){
        if (e.target.id.indexOf('tr-') > -1) {
            var tr = $(e.target).closest('tr'),
                inputGroup = $('[data-target="#'+e.target.id+'"]').find('.input-group').eq(0),
                rltv = tr.find('.right-col>.rltv').eq(0);
            rltv.prepend(inputGroup);
            tr.prevAll(".clear:first").addClass('opened');
        }
    });
    $('a[href="#view-list"]').on('click', function(e){
        e.preventDefault();
        if (window.location.pathname.indexOf('section') > 0 ||
            window.location.pathname.indexOf('single-planogram') > 0){
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
        if (window.location.pathname.indexOf('section') > 0  ||
            window.location.pathname.indexOf('single-planogram') > 0){
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
    $('.simpleList').on('show.bs.collapse', '[id^="hht"], [id^="list-"]', function(){
        $(this).closest('li').addClass('active');
    }).on('hide.bs.collapse', '[id^="hht"], [id^="list-"]', function(){
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
    $('.productActions').on('click', '.btn-sm', function(){
        $(this).toggleClass('active');
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
    $('.flex-table').on('show.bs.dropdown','.favMenu', function(e){
        var menu = $(e.target).find('.dropdown-menu'),
            form = $('<form />', {
                id:'addNewFavlist',
                class:'addFavlist',
                html: '<div class="input-group">' +
                '<input class="form-control" placeholder="Add new list..." type="text" name="favName" />' +
                '<span class="input-group-addon"><i class="fa fa-plus"></i></span>' +
                '</div>'
            });
        menu.find('li:last-child').append(form);
    }).on('hide.bs.dropdown', '.favMenu', function(e){
        $(e.target).find('form').remove();
    }).on('click', 'form', function(e){
        e.stopPropagation();
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
    $('.submenu .navbar-nav, .cardTitle').on('click', '.btn', function () {
        $(this).parent().parent().parent().find('.btn').removeClass('active');
        $(this).addClass('active');
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
    var errorsModal = $('#hhtErrorsModal'),
        loader = $('.shop-links .loader');;
    errorsModal.on('show.bs.modal', function(){
        if (!window.tabIsSet) {
            var height = $('.tab-pane.active').height();
            if (height) {
                $('.tab-content').velocity({
                    maxHeight:height + 'px',
                    minHeight:height + 'px'
                });
                window.tabIsSet = true;
            }
        }
    }).on('shown.bs.tab','a[data-toggle="tab"]', function (e) {
        var height = $($(e.target).attr('href')).height();
        $('.tab-content').velocity({maxHeight:height+'px',minHeight:height+'px'}, 300);
        // e.target // newly active tab
        // e.relatedTarget // previous active tab
    });
    for(var i = 0; i < 4; i++) {
        loader.append($('<div />'));
    }
    loader.velocity({
        width:'100%'
    }, 200, function(){
        loader.css({'background-color':'transparent'});
        loader.find('div').each(function(i){
            if ($(window).width() > 820) {
                $(this).velocity({
                    'margin-left':(i % 2 == 0 ? '0': '10px'),
                    'margin-right':(i % 2 == 0 ? '10px': '0')
                }, 120).velocity({
                    'margin-top':(i < 2 ?'0':'10px'),
                    'margin-bottom':(i < 2 ?'10px':'0')
                }, 120, function(){
                    $('.shop-links>div:last-child>span').each(
                        function(){
                            $(this).velocity({opacity: 1},500, function(){
                                loader.remove();
                                $('#hhtErrorsModal').modal('show');
                            })
                        }
                    )
                });
            } else {
                $(this).velocity({
                    'margin-top':'10px'
                },120, function(){
                    $('.shop-links>div:last-child>span').each(
                        function(){
                            $(this).velocity({opacity: 1},500, function(){
                                loader.remove();
                                $('#hhtErrorsModal').modal('show');
                            })
                        }
                    );
                });
            }
        })
    });
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