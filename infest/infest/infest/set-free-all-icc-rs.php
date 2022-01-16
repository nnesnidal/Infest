<?php
    if($_POST['action'] == 'call_this') {
        include_once('connect-to-database.php');
        $id = $_POST['id'];
        $query = "UPDATE infest_lista_chars SET ICC = 'FREE', RS = 'FREE'";
        $result = mysqli_query($dbc, $query);
        mysqli_close($dbc);
    }
?>