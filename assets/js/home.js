$(window).on('load', function(){
    $('#hhtErrorsModal').on('show.bs.modal', function(){
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
    });
    var loader = $('.shop-links .loader');
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
    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        var height = $($(e.target).attr('href')).height();
        $('.tab-content').velocity({maxHeight:height+'px',minHeight:height+'px'}, 300);
        // e.target // newly active tab
        // e.relatedTarget // previous active tab
    })

});
