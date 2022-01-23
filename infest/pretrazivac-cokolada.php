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