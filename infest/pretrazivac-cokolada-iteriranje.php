<script>
    $('.main_dropdown_span').each(function(){
        if ($(this).html() == main_dropdown_menu_item) {
            exists = true;
        }
    });
            
    if ($(this).html() == main_span_click) {
        $(this).addClass("hide_it");
    } else if (($(this).html() != main_span) && $(this).hasClass("hide_it") && !exists) {
        $(this).removeClass("hide_it");
    }
</script>