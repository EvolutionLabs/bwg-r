$(window).on('load resize', function () {
    $('.megaMenu').each(function () {
        $(this).css({'margin-left': '-' + $(this).closest('.dropdown')[0].getBoundingClientRect().left + 'px'});
    })
});

$(window).on('load', function () {
    var Page = $('body').data("page"),
        openRows = $('body').hasClass('openRows');
    $('[href^="#"]').on('click', function (e) {
        e.preventDefault();
    });
    $('table tr[data-toggle]').each(function (i) {
        var cS = $(this).next().find('td[colspan]').attr('colspan');
        $(this).before($('<tr />', {
            html: '<td colspan="' + cS + '">' +
            '<div class="rowSpacer"></div>' +
            '</td>',
            class: 'clear'
        }));
    });
    if (openRows) {
        $('tr.clear').each(function (i, e) {
            $(e).addClass(i?'before after':'before')
        })
    }
    // var introStaggerStep = -1;
    // $('.flex-table > tbody > tr').each(function (i, e) {
    //     setTimeout(function () {
    //         introStaggerStep += $(e).hasClass('accordion-toggle') && (e.getBoundingClientRect().top > 0) ? 0 : 1;
    //         $(e).addClass('uHoH');
    //     }, ((i - introStaggerStep) * 12) + 100);
    // });
    $('.products').on('click', 'td>.dropdown>.dropdown-menu', function (e) {
        e.stopPropagation();
        $(this).closest('.dropdown-menu').dropdown('toggle');
        $(this).closest('td').toggleClass('active');
    }).on('click', '.input-group-addon', function (e) {
        if ($(e.target).closest('.qty').is('div')) {
            e.stopPropagation();
            var field = $(this).closest('.input-group').find('.form-control'),
                val = field.val() ? field.val() * 1 : 0,
                tr = $(this).closest('tr.hiddenRow'),
                tr = tr.is('tr') ? tr : $(this).closest('tr[data-toggle="collapse"]').next(),
                hiddenQty = tr.find('input[name="qty"]');
            if (val < 0) {
                field.val(0);
                hiddenQty.val(0)
            }
            if ($(this).is(':first-child') && val > 0) {
                field.val(val - 1);
                hiddenQty.val(val - 1)
            }
            if ($(this).is(':last-child')) {
                field.val(val + 1);
                hiddenQty.val(val + 1)
            }
        } else if ($('#addNewFavlist').is('form')) {
            $('#addNewFavlist').submit();
        }
    }).on('click', 'td.hide-x', function (e) {
        e.stopPropagation();
    }).on('keyup', '.qty .form-control', function (e) {
        var tr = $(this).closest('tr.hiddenRow'),
            tr = tr.is('tr') ? tr : $(this).closest('tr[data-toggle="collapse"]').next(),
            input = tr.find('input[name="qty"]');
        input.val($(this).val());
        if (e.which == 13 || e.keyCode == 13) {
            var form = tr.find('form');
            form.submit();
        }
    }).on('hide.bs.collapse', 'tr', function (e) {
        if (e.target.id.indexOf('tr-') > -1) {
            var tr = $(e.target).closest('tr'),
                inputGroup = tr.find('.right-col>.rltv .input-group').eq(0),
                td = $('[data-target="#' + e.target.id + '"]').find('td.no-grow.hide-x').eq(0);
            tr.next().removeClass('after');
            tr.prev().prev().removeClass('before');
            td.append(inputGroup);
            var id = e.target.id.substr(e.target.id.indexOf('-') + 1);
            $('#stock-' + id).collapse('hide');
        }
    }).on('show.bs.collapse', 'tr', function (e) {
        if (e.target.id.indexOf('tr-') > -1) {
            var tr = $(e.target).closest('tr'),
                inputGroup = $('[data-target="#' + e.target.id + '"]').find('.input-group').eq(0),
                rltv = tr.find('.right-col>.rltv').eq(0);
            tr.prev().prev().addClass('before');
            tr.next().addClass('after');
            rltv.prepend(inputGroup);
        }
    });
    $('#mixAndMatch').on('click', '.input-group-addon', function(e){
        e.stopPropagation();
        var field = $(this).closest('.input-group').find('.form-control'),
            val = field.val() ? field.val() * 1 : 0;
        if (val < 0) {
            field.val(0);
        }
        if ($(this).is(':first-child') && val > 0) {
            field.val(val - 1);
        }
        if ($(this).is(':last-child')) {
            field.val(val + 1);
        }

        $(this).closest('.input-group').find('.form-control').trigger('update')
        console.log('triggered `update` of `.form-control`!');

    });

    $('#mixAndMatch').on('keydown', 'input', function (e) {
        if (e.which == 38 || e.which == 104) {
            $(this).val() ? $(this).val((parseInt($(this).val()) + 1)) : $(this).val(1);
        } else if (e.which == 40 || e.which == 98) {
            $(this).val() ? $(this).val((parseInt($(this).val()) - 1)) : $(this).val(1);
        }
    });

    $('[role="combobox"]').removeClass('open');
    $('.modal-dialog').on('click tap', function (e) {
        if ($(e.target).hasClass('modal-dialog')) {
            $('.modal').modal('hide');
        }
    });
    $('.simpleList').on('show.bs.collapse', '[id^="hht"], [id^="list-"]', function () {
        $(this).closest('li').addClass('active');
    }).on('hide.bs.collapse', '[id^="hht"], [id^="list-"]', function () {
        $(this).closest('li').removeClass('active');
    });
    /*$('.fa.fa-heart').on('click', function(){
     toastr["success"]("This could display on successful return of the ajax call.", "Added to favs!")
     });*/
    $('.filter-controls').on('click', '.btn-group', function (e) {
        var action = $(e.target).closest('.btn-sm').attr('href').replace('#filters-', ''),
            list = $(e.target).closest('.container').find('.filtersList').eq(0);
        if (action == 'all') {
            list.find('input:checkbox').prop('checked', true);
        } else if (action == 'none') {
            list.find('input:checkbox').prop('checked', false);
        } else if (action == 'inverse') {
            list.find('input:checkbox').each(function () {
                $(this).prop('checked', !$(this).prop('checked'));
            });
        }
        return false;
    });
    $('.productActions').on('click', '.btn-sm', function () {
        $(this).toggleClass('active');
        var badge = $(this).find('.badge'),
            val = parseInt(badge.text()) + ($(this).hasClass('active') ? 1 : -1);
        badge.text(val);
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
    $('[id^="rating-"]').each(function () {
        // console.log()
        var code = $(this).data('code');
        $(this).barrating({
            theme: 'fontawesome-stars-o',
            emptyValue: '&times;',
            initialRating: $(this).data('initial'),
            allowEmpty: true,
            deselectable: true,
            onSelect: function (value) {
                value = JSON.parse(value);
                var message = value ? 'Your ' + value + ' star' + (value > 1 ? 's' : '') + ' rating was saved.' : 'Your rating was removed.',
                    type = value ? 'success' : 'info',
                    title = value ? 'Rating saved' : 'Rating deleted';
                doRate(value, code);
                /**
                 * you should send an ajax call saving the value and only display this toast on success
                 * @see http://antenna.io/demo/jquery-bar-rating/examples/
                 */

                setTimeout(function () {
                    toastr[type](message, title);
                }, 600);
            }
        })
    });
    $('.flex-table').on('show.bs.dropdown', '.favMenu', function (e) {
        var menu = $(e.target).find('.dropdown-menu'),
            form = $('<form />', {
                id: 'addNewFavlist',
                class: 'addFavlist',
                html: '<input type="hidden" name="a" value="fav" />' +
                '<input type="hidden" name="a1" value="doAdd" />' +
                '<input type="hidden" name="pid" value="' + menu.data("pid") + '" />' +
                '<input type="hidden" name="referer" value="' + menu.data("referer") + '" />' +
                '<input type="hidden" name="Code" value="' + menu.data("code") + '" />' +
                '<div class="input-group">' +
                '<input class="form-control" placeholder="Add new list..." type="text" name="NameOther" />' +
                '<span class="input-group-addon"><i class="fa fa-plus"></i></span>' +
                '</div>'
            });
        menu.find('li:last-child').append(form);
    }).on('hide.bs.dropdown', '.favMenu', function (e) {
        $(e.target).find('form').remove();
    }).on('click', 'form', function (e) {
        e.stopPropagation();
    });
    var e = $('.parallax-container');
    if (e.is('.parallax-container')) {
        e.slick({
            autoplay: true,
            autoplaySpeed: 5000,
            pauseOnFocus: false,
            arrows: true,
            prevArrow: '<button type="button" class="slick-prev">Previous</button>',
            nextArrow: '<button type="button" class="slick-next">Next</button>',
        });
        setTimeout(function () {
            var PS = {
                parent: e[0],
                get scroller() {
                    return e.find('.parallax-scroller')
                },
                get height() {
                    return this.parent.getBoundingClientRect().height
                },
                get top() {
                    return $(window).scrollTop()
                },
                get active() {
                    return this.height - (this.top + 95 ) > 0;
                },
                get update() {
                    if (this.active) {
                        this.scroller.velocity({
                            translateY: (this.top / 2) + 'px'
                        }, 0)
                    }
                },
                init: function () {
                    var top = Math.min(this.scroller.eq(0)[0].getBoundingClientRect().top, $(window).height()) / 2;
                    $(this.current).velocity({
                            marginTop: '-' + top + 'px',
                            paddingTop: top + 'px'
                        }
                    );
                    delete this.init;
                    return this;
                }
            }.init();
            $(document).on('scroll', function () {
                PS.update;
            });
        }, 300);
    }
    $('.submenu .navbar-nav, .cardTitle').on('click', '.btn', function () {
        $(this).parent().parent().parent().find('.btn').removeClass('active');
        $(this).addClass('active');
    });
    $('.megaMenu').on('click', function (e) {
        e.stopPropagation();
    });
    if (Page.indexOf('planogram') > -1) {
        if ($.isFunction($.fn.magnificPopup)) {
            $('.planogram').magnificPopup({
                delegate: '.imgSlot',
                type: 'image',
                mainClass: 'mfp-with-zoom',

                zoom: {
                    enabled: true,

                    duration: 300,
                    easing: 'ease-in-out',

                    opener: function (openerElement) {
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

                    opener: function (openerElement) {
                        return openerElement.is('img') ? openerElement : openerElement.find('i');
                    }
                }
            });
        }
        $('#planogram').velocity('scroll', {
            duration: 700,
            offset: -95,
            easing: 'cubic-bezier(.4,0,.2,1)'
        });
    }
    var errorsModal = $('#hhtErrorsModal'),
        loader = $('.shop-links .loader');
    if (errorsModal.is('#hhtErrorsModal')) {
        errorsModal.on('show.bs.modal', function () {
            if (!window.tabIsSet) {
                var height = $('.tab-pane.active').height();
                if (height) {
                    $('.tab-content').velocity({
                        maxHeight: height + 'px',
                        minHeight: height + 'px'
                    });
                    window.tabIsSet = true;
                }
            }
        }).on('shown.bs.tab', 'a[data-toggle="tab"]', function (e) {
            var height = $($(e.target).attr('href')).height();
            $('.tab-content').velocity({maxHeight: height + 'px', minHeight: height + 'px'}, 300);
        });
    }
    if (loader.is('.loader')) {
        for (var i = 0; i < 4; i++) {
            loader.append($('<div />'));
        }
        loader.velocity({
            width: '100%'
        }, 360, function () {
            loader.css({'background-color': 'transparent'});

            loader.velocity({
                padding: '10px'
            }, 120, function () {
                loader.find('div').each(function (i) {
                    $(this).velocity({
                        margin: '10px'
                    }, 120, function () {
                        $('.shop-links>div:last-child>span').each(
                            function () {
                                $(this).velocity({opacity: 1}, 500, function () {
                                    loader.remove();
                                    $('#hhtErrorsModal').modal('show');
                                })
                            }
                        );
                    });
                })
            });
        });
    }
    var mnm = $('.mixNmatch');
    mnm.each(function(i,e){
        var row = $(e).closest('.accordion-toggle'),
            rlt = $(e).closest('.rltv'),
            from = rlt.width(),
            oT = $(e).find('.offerTag'),
            to = Math.max(row.width()/2, row.width() - 380);
        rlt.css({
            width:to + 'px',
            paddingRight: (to - from) + 'px'
        });
        if (oT.is('.offerTag')) {
            oT.css({minWidth:to+'px'})
        }
    });
    $(document)
        .on('click', '[data-dismiss="modal"]', function () {
            $('.modal-backdrop').velocity({opacity: 0}, function () {
                $('.modal-backdrop').remove();
            })
        })
        .on('show.bs.dropdown', '.shop-links .dropdown', function (e) {
            console.log(e);
            var children = $(e.target).find('.dropdown-menu li').length;
            $('.flexWrap').velocity({paddingBottom: (children * 50) + 'px'});
        })
        .on('hide.bs.dropdown', '.shop-links .dropdown', function (e) {
            $('.flexWrap').velocity({paddingBottom: '0px'});
        })
        .on('click', '.toggleSwitch', toggleSwitch)
        .on('click', 'a[href="#view-list"]', function (e) {
            e.preventDefault();
            if (Page.indexOf('section') > -1 || Page.indexOf('single-planogram') > -1) {
                var target = $(e.target).closest('a').data('target');
                $(target + ' .hiddenRow>td>.collapse.in[id^="tr-"]').collapse('hide');
            }
        })
        .on('click', 'a[href="#view-boxes"]', function (e) {
            e.preventDefault();
            if (Page.indexOf('section') > -1 || Page.indexOf('single-planogram') > -1) {
                var target = $(e.target).closest('a').data('target');
                $(target + ' .hiddenRow>td>.collapse[id^="tr-"]').collapse('show');
            }
        }).on('click','.mixNmatch', function(e){
            var mnm = $(e.target).closest('.mixNmatch'),
                title = mnm.data('title'),
                description = mnm.data('description'),
                dateFrom = mnm.data('from'),
                dateTo = mnm.data('to'),
                threshold = mnm.data('threshold'),
                mnMdl = $('#mixAndMatch');

            var modalWidth = mnm.width() + 'px';
            mnMdl.find('.modal-title').html(title);
            mnMdl.find('.mnm-description').html(description);
            mnMdl.find('.sk-folding-cube').removeClass('loaded');
            mnMdl.find('.modal-content').addClass('loading');
            mnMdl.find('.modal-body').html($('<div />', {
                class:'mnmDetails',
                html: '<strong>Active</strong>: from ' + dateFrom + ' to ' + dateTo + '<br /> <strong>Threshold</strong>: ' + threshold
            }));
            mnMdl.find('.modal-content').css('width', modalWidth);
            mnMdl.find('.modal-content').css('max-width', modalWidth);
            mnMdl.find('.modal-content').css('min-width', modalWidth);
            mnMdl.modal('show');
            getMixAndMatch();
            if (mnm.closest('.accordion-toggle').is('.accordion-toggle[aria-expanded="true"]'))
                return false;
        });
});

function getMixAndMatch() {
    if((window.location.hostname.indexOf('bwg.dev') > -1) ||
        (window.location.hostname.indexOf('dahood')> -1)){
        $.ajax('mix-and-match', {
            data: {
                action:'mix-and-match'
            },
            type:'POST',
            success:function(r){
                setTimeout(function(){
                    var mnmTable = $('<table />',{
                        class:'mnmTable table products flex-table'
                    });
                    $('.modal-content').removeClass('loading');
                    setTimeout(function(){
                        $('.sk-folding-cube').addClass('loaded');
                    },800);
                    mnmTable.append(
                        $('<thead />',{
                            html: '<tr>' +
                            '<th>Product code</th>' +
                            '<th>Description</th>' +
                            '<th>Case Qty</th>' +
                            '<th>WSP</th>' +
                            '<th></th>' +
                            '</tr>'
                        }));
                    $.each(r,function(i,e){
                        var tr = $('<tr />');
                        tr  .append($('<td />', {html:'<span class="rltv">'+e['id']+'</span>'}))
                            .append($('<td />', {html:'<span class="rltv">'+e['Name']+'</span>'}))
                            .append($('<td />', {html:'<span class="rltv">'+e['Pack<br />/Case']
                                .replace(/(<([^>]+)>)/ig,"").split('/')[1]+'</span>'}))
                            .append($('<td />', {html:'<span class="rltv">€' + e['Price']['new']+'</span>'}))
                            .append($('<td />',{
                                    html:'<div class="input-group qty">' +
                                    '<span class="input-group-addon"><i class="fa fa-minus"></i></span>' +
                                    '<input type="text" class="form-control" name="qty-products-'+e['id']+'" />' +
                                    '<span class="input-group-addon"><i class="fa fa-plus"></i></span>' +
                                    '</div>'
                                })
                            );
                        mnmTable.append(tr);
                    });

                    var tFoot = $('<tfoot />');
                    tFoot.append($('<tr />', {
                        html:'<td colspan="5"><div class="pagination">' +
                        '<span class="count">Items 56 of 4694</span>'  +
                        '<div>' +
                        '<div class="btn-group">' +
                        '<a class="btn btn-white" href="#">Previous</a>' +
                        '<a class="btn btn-white" href="#">1</a>' +
                        '<a class="btn btn-white" href="#">2</a>' +
                        '<a class="btn btn-white" href="#">3</a>' +
                        '<span class="btn btn-disabled">4</span>' +
                        '<a class="btn btn-white" href="#">5</a>' +
                        '</div>'  +
                        '<span class="bgn-group-spacer">…</span>'  +
                        '<div class="btn-group">'  +
                        '<a class="btn btn-white" href="#">20</a>' +
                        '<a class="btn btn-white" href="#">Next</a>'   +
                        '</div>'  +
                        '</div>'  +
                        '</div>'  +
                        ''})).appendTo(mnmTable);

                    var tableContainer = $('<div />',{class:'row'}),
                        mBody = $('#mixAndMatch .modal-body');
                    tableContainer.append(mnmTable).appendTo(mBody);
                    mnmTable.velocity({
                        opacity: 1
                    });
                    mBody.velocity({
                        minHeight: mnmTable.height() + $('.mnmDetails').height()
                    }, function(){
                        mnmTable.css({position:'relative'});
                        $('.mnmTable tr').each(function(i,e){
                            setTimeout(function(){
                                $(e).addClass('uHoH');
                            }, i * 65)
                        })
                    });
                }, 1200);
            }
        })
    }

}

function toggleSwitch(e) {
    var ts = $(e.target).closest('.toggleSwitch'),
        input = ts.find('input').eq(0),
        toggle = ts.find('.toggle');
    ts.toggleClass('on');
    toggle.toggleClass('on');
    input.attr('checked', ts.hasClass('on'));
}

function toggleCartButton(e) {
    var value = '';
    $(e).children('.option').each(function () {
        $(this).toggleClass('hideMe');
        if (!$(this).hasClass('hideMe')) {
            value = $(this).data('value');
        }
    });
    $('#cartAction').val(value);
}