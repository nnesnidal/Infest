<script>
    $(".main_dropdown_menu_item").on("click", function() {
        var main_span_before_click = $(this).closest(".cokolada_td").find('.main_dropdown_span').html();
        $(this).closest(".cokolada_td").find('.main_dropdown_span').empty();
        $(this).closest(".cokolada_td").find('.main_dropdown_span').append($(this).html());
        var main_span_click = $(this).html();
        $('.main_dropdown_menu_item').each(function(){
            var main_span = $(this).closest(".cokolada_td").find('.main_dropdown_span').html();
            var main_dropdown_menu_item = $(this).html();

            if ($(this).html() == main_span_click) {
                $(this).addClass("hide_it");
            } else if (($(this).html() != main_span) && ($(this).html() == main_span_before_click) && $(this).hasClass("hide_it")) {
                $(this).removeClass("hide_it");
            }
        });

        $('.obrisiOdabranog').each(function(){
            if ($(this).html() == main_span_click) {
                $(this).closest('.odabrani').addClass('hide');
            } else if ($(this).html() == main_span_before_click) {
                $(this).closest('.odabrani').removeClass('hide');
            }
        });
    });
</script>
<?php
    //KONEKCIJA NA DATABAZU
    include_once('connect-to-database.php');

    if(isset($_POST['odabran'])){
        $odabran = mysqli_real_escape_string($dbc,$_POST['odabran']);
    }
    if(isset($_POST['spec'])){
        $spec = mysqli_real_escape_string($dbc,$_POST['spec']);
    }
    if(isset($_POST['spec_class'])){
        $spec_class = mysqli_real_escape_string($dbc,$_POST['spec_class']);
    }

    $query = "SELECT * FROM infest_lista_chars WHERE ICC='FREE' AND MAIN='".$odabran."' AND (MS='".$spec."' OR OS='".$spec."') AND CLASS='".$spec_class."' ORDER BY FIELD(MS, '".$spec."') DESC LIMIT 1";
    $result = mysqli_query($dbc, $query);

    $html = '';
    if (mysqli_num_rows($result)>0) {
        while($row = mysqli_fetch_array($result)){
            $MAIN = $row['MAIN'];
            $MS = $row['MS'];
            $CLASS = $row['CLASS'];
            $html .= '<div class="main_dropdown_menu_item">'.$MAIN.'</div>';
        }
    }
    echo $html;
?>