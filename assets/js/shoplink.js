$(window).on('load', function(){
    $('[href^="#"]').on('click',function(e){
        e.preventDefault();
    })
});
