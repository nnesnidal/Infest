<script>
    $(function() {
        $('.class_color:contains("DeathKnight")').parent().css('border-color', '#C41F3B');
        $('.class_color:contains("Druid")').parent().css('border-color', '#FF7D0A');
        $('.class_color:contains("Hunter")').parent().css('border-color', '#ABD473');
        $('.class_color:contains("Mage")').parent().css('border-color', '#69CCF0');
        $('.class_color:contains("Paladin")').parent().css('border-color', '#F58CBA');
        $('.class_color:contains("Priest")').parent().css('border-color', '#B3B3B3');
        $('.class_color:contains("Rogue")').parent().css('border-color', '#FFF569');
        $('.class_color:contains("Shaman")').parent().css('border-color', '#0070DE');
        $('.class_color:contains("Warlock")').parent().css('border-color', '#9482C9');
        $('.class_color:contains("Warrior")').parent().css('border-color', '#C79C6E');

        $('.class_color:contains("DeathKnight")').parent().css('color', '#781324');
        $('.class_color:contains("Druid")').parent().css('color', '#B35707');
        $('.class_color:contains("Hunter")').parent().css('color', '#6D8749');
        $('.class_color:contains("Mage")').parent().css('color', '#488BA3');
        $('.class_color:contains("Paladin")').parent().css('color', '#A8607F');
        $('.class_color:contains("Priest")').parent().css('color', '#B3B3B3');
        $('.class_color:contains("Rogue")').parent().css('color', '#B3AB49');
        $('.class_color:contains("Shaman")').parent().css('color', '#004991');
        $('.class_color:contains("Warlock")').parent().css('color', '#5C517D');
        $('.class_color:contains("Warrior")').parent().css('color', '#7A6043');

        $('.class_color:contains("DeathKnight")').parent().css('background', '#CE5F71');
        $('.class_color:contains("Druid")').parent().css('background', '#FFA557');
        $('.class_color:contains("Hunter")').parent().css('background', '#CCDBB8');
        $('.class_color:contains("Mage")').parent().css('background', '#B3E1F2');
        $('.class_color:contains("Paladin")').parent().css('background', '#F7D6E4');
        $('.class_color:contains("Priest")').parent().css('background', '#fff');
        $('.class_color:contains("Rogue")').parent().css('background', '#FFFAB5');
        $('.class_color:contains("Shaman")').parent().css('background', '#4494E3');
        $('.class_color:contains("Warlock")').parent().css('background', '#B59FF5');
        $('.class_color:contains("Warrior")').parent().css('background', '#D0C1B1');
    });
</script>
<?php
    //KONEKCIJA NA DATABAZU
    include_once('connect-to-database.php');

    if(isset($_POST['odabran'])){
        $odabran = mysqli_real_escape_string($dbc,$_POST['odabran']);
    }

    $query = "SELECT * FROM infest_lista_chars WHERE ICC='FREE' AND MAIN='".$odabran."' ORDER BY CLASS, MS, OS";
    $result = mysqli_query($dbc, $query);

    $html = '<div class="pretrazivac_info_container">';
    while($row = mysqli_fetch_array($result)){
        $MS = $row['MS'];
        $OS = $row['OS'];
        $CLASS = $row['CLASS'];
        $html .= '<div class="pretrazivac_info_class">';
            $html .= "<span>MS: </span><span>".$MS."</span><br/>";
            $html .= "<span>OS: </span><span>".$OS."</span><br/>";
            $html .= "<span class='class_hidden'>CLASS: </span><span class='class_color class_hidden'>".$CLASS."</span>";
        $html .= '</div>';
    }
    $html .= '</div>';

    echo $html;
?>