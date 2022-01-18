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
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&family=Roboto+Mono:wght@200&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/raid_style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
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

        $(function() {
            for (cokolada_td_br=1; cokolada_td_br<=25; cokolada_td_br++) {
                var v_cokolada_container = '<div class="cokolada_container" id="cokolada_container'+cokolada_td_br+'"></div>';
                var v_cog_style = '<i onclick="dropdownClass(\'menu'+cokolada_td_br+'\')" class="fas fa-cog cog_style"></i>';
                var v_menu = '<div id="menu'+cokolada_td_br+'" class="cokolada_menu"></div>';
                var v_menu_item_dk = '<div class="cokolada_menu_item">DeathKnight</div>';
                var v_menu_item_dr = '<div class="cokolada_menu_item">Druid</div>';
                var v_menu_item_ht = '<div class="cokolada_menu_item">Hunter</div>';
                var v_menu_item_mg = '<div class="cokolada_menu_item">Mage</div>';
                var v_menu_item_pl = '<div class="cokolada_menu_item">Paladin</div>';
                var v_menu_item_pr = '<div class="cokolada_menu_item">Priest</div>';
                var v_menu_item_rg = '<div class="cokolada_menu_item">Rogue</div>';
                var v_menu_item_sh = '<div class="cokolada_menu_item">Shaman</div>';
                var v_menu_item_wl = '<div class="cokolada_menu_item">Warlock</div>';
                var v_menu_item_wr = '<div class="cokolada_menu_item">Warrior</div>';

                $('#cokolada'+cokolada_td_br).append(v_cokolada_container);
                $('#cokolada_container'+cokolada_td_br).append(v_cog_style, v_menu);
                $('#menu'+cokolada_td_br).append(v_menu_item_dk, v_menu_item_dr, v_menu_item_ht, v_menu_item_mg, v_menu_item_pl, 
                    v_menu_item_pr, v_menu_item_rg, v_menu_item_sh, v_menu_item_wl, v_menu_item_wr);
            }
        });

        function dropdownClass(menu) {
            document.getElementById(menu).classList.toggle("show");
        }
        //!($(event.target).parents("#myDiv").length)
        window.onmousemove = function(event) {
            if (!(event.target.matches('.cokolada_container')) &&
                    !(event.target.matches('.cog_style')) && !(event.target.matches('.cokolada_menu')) && 
                    !(event.target.matches('.cokolada_menu_item'))) {
                var dropdowns = document.getElementsByClassName("cokolada_menu");
                var i;
                for (i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show')) {
                        openDropdown.classList.remove('show');
                    }
                }
            }
        }
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
                    <li><a href="index.html"><i class="fas fa-home fas_style"></i></a></li>
                    <li><a href="#"><i class="fas fa-table fas_style"></i></a></li>
                    <li><a href="database_page.php"><span class="fas fa-server fas_style"></span></a></li>
                </ul>
            </nav>
        </div>

        <!--SABLON-->
        <table class="cokolada">
            <tr>
                <td class="cokolada_td" id="cokolada1"></td>
                <td class="cokolada_td" id="cokolada2"></td>
                <td class="cokolada_td" id="cokolada3"></td>
                <td class="cokolada_td" id="cokolada4"></td>
                <td class="cokolada_td" id="cokolada5"></td>
            </tr>
            <tr>
                <td class="cokolada_td" id="cokolada6"></td>
                <td class="cokolada_td" id="cokolada7"></td>
                <td class="cokolada_td" id="cokolada8"></td>
                <td class="cokolada_td" id="cokolada9"></td>
                <td class="cokolada_td" id="cokolada10"></td>
            </tr>
            <tr>
                <td class="cokolada_td" id="cokolada11"></td>
                <td class="cokolada_td" id="cokolada12"></td>
                <td class="cokolada_td" id="cokolada13"></td>
                <td class="cokolada_td" id="cokolada14"></td>
                <td class="cokolada_td" id="cokolada15"></td>
            </tr>
            <tr>
                <td class="cokolada_td" id="cokolada16"></td>
                <td class="cokolada_td" id="cokolada17"></td>
                <td class="cokolada_td" id="cokolada18"></td>
                <td class="cokolada_td" id="cokolada19"></td>
                <td class="cokolada_td" id="cokolada20"></td>
            </tr>
            <tr>
                <td class="cokolada_td" id="cokolada21"></td>
                <td class="cokolada_td" id="cokolada22"></td>
                <td class="cokolada_td" id="cokolada23"></td>
                <td class="cokolada_td" id="cokolada24"></td>
                <td class="cokolada_td" id="cokolada25"></td>
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