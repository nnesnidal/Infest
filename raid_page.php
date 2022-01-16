<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/raid_style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <!--<script src="skripte/tooltip.js"></script>-->
    <title>Infest</title>
    <?php
        //KONEKCIJA NA DATABAZU
        include_once('connect-to-database.php');
    ?>
    <script>
        $(function() {
            $("#search_bar").keyup(function() {
                var value = $('#search').val();
                if (value.length>0){
                    $.post('pretrazivac.php',{value:value}, function(data){
                        $("#dropdown_imena").html(data);
                    });
                }
                else $("#dropdown_imena").html("");
                return false;
            });
        });
        $(function() {
            $("#search_bar").bind('submit',function() {
                var value = $('#search').val();
                if (value.length>0){
                    $.post('pretrazivac.php',{value:value}, function(data){
                        $("#dropdown_imena").html(data);
                    });
                }
                else $("#dropdown_imena").html("");
                return false;
            });
        });
    </script>
</head>
<body>
    <div class="title">
        <h1>INFEST</h1>
    </div>

    <div class="nav_container">
        <div class="navigacija">
            <nav>
                <ul>
                    <li><a href="index.html"><i class="fas fa-home"></i></a></li>
                    <li><a href="#"><i class="fas fa-table"></i></a></li>
                    <li><a href="database_page.php"><span class="fas fa-server"></span></a></li>
                </ul>
            </nav>
        </div>

        <!--SABLON-->
        <table class="cokolada">
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </table>
    </div> 

    <div class="main_container">
        <div class="searchbox_container">
            <div id="searchbox">
            <img class="search_tooltip" src="img/search.png" id="SearchBar">
            <form name="search_bar" id="search_bar" action="" method="POST">
                <input type="text" autocomplete="off" placeholder="Search.." name="search" id="search">
            </form>
            </div>
        </div>

        <!--Search Bar-->
        <script>
            var searchbox = document.getElementById("searchbox");
            var SearchbBar = document.getElementById("SearchBar");
        
            SearchbBar.onclick = function(){ 
                searchbox.classList.toggle("active");
            }
        </script>

        <!--ISPIS TABLICE-->
        <div class="dropdown_imena" id="dropdown_imena">
            
        </div>
        <div class="odabrani_container" id="odabrani_container">
                
        </div>

    </div>
    

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>