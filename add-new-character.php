<?
include_once('connect-to-database.php');
if(isset($_POST['main']) && isset($_POST['class']) && isset($_POST['ms']) && isset($_POST['icc']) && isset($_POST['rs'])){
            $main = $_POST['main'];
            $name = $_POST['name'];
            $class = $_POST['class'];
            $ms = $_POST['ms'];
            $os = $_POST['os'];
            $icc = strtoupper($_POST['icc']);
            $rs = strtoupper($_POST['rs']);

            $query = "INSERT INTO
                infest_lista_chars (name, class, ms, os, main, icc, rs)
                VALUES ('$name', '$class', '$ms', '$os', '$main', '$icc', '$rs')";

            $result = mysqli_query($dbc, $query) or die('Error querying database.');
        }
?>