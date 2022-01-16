<?php
    //KONEKCIJA NA DATABAZU
    include_once('connect-to-database.php');

    if(isset($_POST['odabran'])){
        $odabran = mysqli_real_escape_string($dbc,$_POST['odabran']);
    }

    $query = "SELECT * FROM infest_lista_chars WHERE ICC='FREE' AND MAIN='".$odabran."'";
    $result = mysqli_query($dbc, $query);

    $html = '<div>';
    while($row = mysqli_fetch_array($result)){
        $MS = $row['MS'];
        $OS = $row['OS'];
        $CLASS = $row['CLASS'];

        $html .= "<span class='head'>MS : </span><span>".$MS."</span><br/>";
        $html .= "<span class='head'>OS : </span><span>".$OS."</span><br/>";
        $html .= "<span class='head'>CLASS : </span><span>".$CLASS."</span><br/>";
    }
    $html .= '</div>';

    echo $html;
?>