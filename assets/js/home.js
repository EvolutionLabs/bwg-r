$(window).on('load', function(){
    var loader = $('.shop-links .loader');
    for(var i = 0; i < 4; i++) {
        loader.append($('<div />'));
    }
    loader.velocity({
        width:'100%'
    }, 200, function(){
        loader.css({'background-color':'transparent'});
        loader.find('div').each(function(){
            $(this).velocity({
                'margin-top':'10px',
                'margin-bottom':'10px'
            }, 100).velocity({
                    'margin-right':'10px',
                    'margin-left':'10px'
            }, 100, function(){
                $('.shop-links>span').each(
                    function(){
                        $(this).velocity({opacity: 1}, function(){
                            loader.remove();
                        })
                    }
                )
            });
        })
    })
});
