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

    $query = "UPDATE infest_lista_chars SET ICC='SAVED' WHERE ICC='FREE' AND MAIN='".$odabran."' AND (MS='".$spec."' OR OS='".$spec."') AND CLASS='".$spec_class."' LIMIT 1";
    $result = mysqli_query($dbc, $query);
?>