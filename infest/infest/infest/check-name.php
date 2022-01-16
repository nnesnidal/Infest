<?php
  include_once('connect-to-database.php');
  if(!empty($_POST["name"])) {
    $result = mysqli_query($dbc,"SELECT count(*) FROM infest_lista_chars WHERE NAME='" . $_POST["name"] . "'");
    $row = mysqli_fetch_row($result);
    $user_count = $row[0];
    if($user_count>0) echo "<p>Name already exists!</p>";
  }
?>