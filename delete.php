<?php
    include_once('connect-to-database.php');
    $id = $_POST['id'];
    $query = "DELETE FROM infest_lista_chars WHERE id='$id'";
    $result = mysqli_query($dbc, $query);
    mysqli_close($dbc);
?>