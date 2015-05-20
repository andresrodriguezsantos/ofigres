jQuery(document).ready(function($) {
    var height = 850;
	$(window).resize(function(){
        height = $('#fotos').height();
        console.log(height);
        $('#head').css('height',height);
    });
    $('#head').css('height',height);
});