<?php
    $servername = "localhost";
    $username = "infest";
    $password = "infestinfest";
    $basename = "infest";

    $dbc = mysqli_connect($servername, $username, $password, $basename) or

        die('Connection failed. '. mysqli_connect_error());

    mysqli_set_charset($dbc, "utf8");
?>