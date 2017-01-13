$(window).on('load', function(){
    var loader = $('.shop-links .loader');
    for(var i = 0; i < 4; i++) {
        loader.append($('<div />'));
    }
    loader.velocity({
        width:'100%'
    }, 200, function(){
        loader.css({'background-color':'transparent'});
        loader.find('div').each(function(i){
            console.log(i < 2);
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
                        })
                    }
                )
            });
        })
    })
});
