$(document).ready(function(){ 
    $("nav ul li a span").each(function() {
        if ((window.location.pathname.indexOf($(this).attr('href'))) > -1) {
            $(this).addClass('add_activemenu_underline');
        }
    });
});
