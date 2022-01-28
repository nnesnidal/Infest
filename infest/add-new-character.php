<?php
    //KONEKCIJA NA DATABAZU
    include_once('connect-to-database.php');

    $main = $_POST['main'];
    $name = $_POST['name'];
    $o_class = $_POST['o_class'];
    $ms = $_POST['ms'];
    $os = $_POST['os'];
    $icc = $_POST['icc'];
    $rs = $_POST['rs'];

    $query = "INSERT INTO
        infest_lista_chars (name, class, ms, os, main, icc, rs)
        VALUES ('$name', '$o_class', '$ms', '$os', '$main', '$icc', '$rs')";

    $result = mysqli_query($dbc, $query) or die('Error querying database.');
?>