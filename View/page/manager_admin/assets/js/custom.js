$(document).ready(function () {
    var selector = '.navbar-nav li a';

    $(selector).on('click', function(){
        console.log('adsds');
        $(selector).removeClass('active');
        $(this).addClass('active');
    });
});
