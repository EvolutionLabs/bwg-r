$(window).on('load', function(){
    $('[href^="#"]').on('click',function(e){
        e.preventDefault();
    });
    $('table').on('hide.bs.collapse', 'tr', function(e){
        if (e.target.id.indexOf('tr-') > -1) {
            var id = e.target.id.substr(e.target.id.indexOf('-') + 1);
            $('#stock-' + id).collapse('hide');
        }
    })

});
