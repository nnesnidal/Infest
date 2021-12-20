<?php
    include_once('connect-to-database.php');
    $id = $_POST['id'];
    $query = "UPDATE infest_lista_chars SET RS = 
                CASE WHEN RS='SAVED' THEN 'FREE' ELSE 'SAVED' END 
                WHERE id='$id'";
    $result = mysqli_query($dbc, $query);
    mysqli_close($dbc);
?>