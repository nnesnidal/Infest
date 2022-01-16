<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/database_style.css?v=<?php echo time(); ?>">
    <script src="skripte/popup.js"></script>
    <script src="skripte/validate_add.js"></script>
    <script src="skripte/cascading_dropdown.js"></script>
    <!--<script src="skripte/class_color.js"></script>-->
    <title>Infest</title>
    <?php
        //KONEKCIJA NA DATABAZU
        include_once('connect-to-database.php');
    ?>
    <script>
        //PROVJERA POSTOJECEG IMENA AJAX
        function checkNameAvailability() {
            jQuery.ajax({
            url: "check-name.php",
            data:'name='+$("#name").val(),
            type: "POST",
            success:function(data){
            $("#name_error").html(data);
            },
            error:function (){}
            });
        }
        
    
        
        $(function() { //allows us to execute a function when the document is fully loaded
            $(".tr:even").css({
                "background-color":"#e8deed",
            });
            
            $('.class_color:contains("DeathKnight")').css('color', '#C41F3B');
            $('.class_color:contains("Druid")').css('color', '#FF7D0A');
            $('.class_color:contains("Hunter")').css('color', '#ABD473');
            $('.class_color:contains("Mage")').css('color', '#69CCF0');
            $('.class_color:contains("Paladin")').css('color', '#F58CBA');
            $('.class_color:contains("Priest")').css('color', '#fff');
            $('.class_color:contains("Rogue")').css('color', '#FFF569');
            $('.class_color:contains("Shaman")').css('color', '#0070DE');
            $('.class_color:contains("Warlock")').css('color', '#9482C9');
            $('.class_color:contains("Warrior")').css('color', '#C79C6E');

            $('.free_saved_color:contains("FREE")').css('background', '#b4d5d0');
            $('.free_saved_color:contains("SAVED")').css('background', '#da8a9a');
            $('.free_saved_color').css('padding', '4px');

            //UPDATE ALL ROWS ICC/RS TO FREE AJAX
            $(".reset_all_to_free").click(function() {
                $.ajax({
                    type : "POST",
                    url : "set-free-all-icc-rs.php",
                    data : {action:'call_this'},
                    success : function() {
                        window.location.reload(true);
                    }
                });
                return false;
            });
            //DELETE ROW AJAX
            $(".delbutton").click(function() {
                var del_id = $(this).attr("id");
                var info = 'id=' + del_id;
                    $.ajax({
                        type : "POST",
                        url : "delete.php",
                        data : info,
                        success : function() {
                            $(this).parents(".tr").css('padding', '0px');
                        }
                    });
                    $(this).parents(".tr").animate("fast").animate({
                        opacity : "hide"
                    }, "slow");
                    
                return false; // prevents the default behavior (navigation) from occurring
            });
            //UPDATE ICC DATA FREE/SAVED AJAX
            $(".icc_button").click(function() {
                var icc_id = $(this).attr("id");
                var info = 'id=' + icc_id.replace("icc", "");

                    $.ajax({
                        type : "POST",
                        url : "edit-icc.php",
                        data : info,
                        success : function() {
                            $("#" + icc_id).load(" #" + icc_id, function(){
                                $('.free_saved_color:contains("FREE")').css('background', '#b4d5d0');
                                $('.free_saved_color:contains("SAVED")').css('background', '#da8a9a');
                            });
                        }
                    });
                return false;
            });
            //UPDATE RS DATA FREE/SAVED AJAX
            $(".rs_button").click(function() {
                var rs_id = $(this).attr("id");
                var info = 'id=' + rs_id.replace("rs", "");
                
                    $.ajax({
                        type : "POST",
                        url : "edit-rs.php",
                        data : info,
                        success : function() {
                            $("#" + rs_id).load(" #" + rs_id, function(){
                                $('.free_saved_color:contains("FREE")').css('background', '#b4d5d0');
                                $('.free_saved_color:contains("SAVED")').css('background', '#da8a9a');
                            });
                        }
                    });
                    
                return false;
            });
        });
    </script>
</head>
<body> 
    
    <!--NASLOV-->
    <div class="title">
        <h1>INFEST</h1>
    </div>
    <!--MENU-->
    <div class="grid_container">
        <div class="item-a">
            <nav>
                <ul>
                    <li><a href="index.html"><i class="fas fa-home"></i></a></li>
                    <li><a href="raid_page.php"><i class="fas fa-table"></i></a></li>
                    <li><a href="database_page.php"><span class="fas fa-server"></span></a></li>
                </ul>
            </nav>
        </div>
    </div> 
    <!--SEARCH AND ADD-->
    <div class="countainer">
        <div id="searchbox">
        <img class="search_tooltip" src="img/search.png" id="SearchbBar">
        <form name="search_bar" action="" method="POST">
            <input type="text" autocomplete="off" placeholder="Search.." name="search">
        </form>
        </div>
        <div class="forma">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter"><img class="search_tooltip" src="img/add.png" alt=""></button>
        </div>
    </div>
    <!--MODAL ADD CHARACTER-->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <input class="reset_popup" type="image" src="img/refresh.png" onclick="document.add_character.reset(); return resetValidation();">
                    <form name="add_character" id="add_character" action="" method="POST" onsubmit="return validate();">
                    <br>
                    <label for="main"><b>MAIN</b></label>
                    <br>
                    <input type="text" autocomplete="off" name="main" value="">
                    <p id="main_error"></p>
                    <br>
                    <label for="name"><b>NAME</b></label>
                    <br>
                    <input type="text" autocomplete="off" name="name" id="name" onkeyup="checkNameAvailability()" value="">
                    <p id="name_error"></p>
                    <br>
                    <label for="class"><b>CLASS</b></label>
                    <br>
                    <select id="class" name="class">
                        <option value="" selected="selected"></option>
                    </select>
                    <p id="class_error"></p>
                    <br>
                    <label for="ms"><b>MS</b></label>
                    <br>
                    <select id="ms" name="ms">
                        <option value="" selected="selected"></option>
                    </select>
                    <p id="ms_error"></p>
                    <br>
                    <label for="os"><b>OS</b></label>
                    <br>
                    <select id="os" name="os">
                        <option value="" selected="selected"></option>
                    </select>
                    <p id="os_error"></p>
                    <br>
                    <label for="icc"><b>ICC</b></label>
                    <br>
                    <select id="icc" name="icc">
                        <option value="free">FREE</option>
                        <option value="saved">SAVED</option>
                    </select>
                    <br>
                    <label for="rs"><b>RS</b></label>
                    <br>
                    <select id="rs" name="rs">
                        <option value="free">FREE</option>
                        <option value="saved">SAVED</option>
                    </select>
                    <br>
                        <div class="button_modal_add">
                        <input class="add_button" type="submit" value="Add">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--ISPIS TABLICE-->
    <div class="baza">
        <?php
            $search = "";

            if(isset($_POST['search'])){
                $search = ucwords(strtolower($_POST['search']));
            }

            $query = "SELECT * FROM infest_lista_chars ORDER BY MAIN, CLASS, MS, OS, NAME";
            $result = mysqli_query($dbc, $query);

            echo '<div class="table" id="table_id">';
            echo '
                <div class="tr header">
                    <div class="td header">MAIN</div>
                    <div class="td header">NAME</div>
                    <div class="td header">CLASS</div>
                    <div class="td header">MS</div>
                    <div class="td header">OS</div>
                    <div class="td header">ICC</div>
                    <div class="td header">RS</div>
                    <div class="td header">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#setFreeAllModal"><i class="fas fa-history"></i></button>
                    </div>
                </div> 
            ';

            

            while($row = mysqli_fetch_array($result)){
                if(!isset($search) || trim($search)=='' || (stripos($row['MAIN'], $search) !== false)) {
        ?>

        <!--SET FREE ALL MODAL-->
        <div class="modal fade" id="setFreeAllModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content" style="background: rgba(255, 255, 255, 0.2);">
                    <div class="modal-body">
                        <div class="free_modal">All ICC/RS data will be set to FREE. Are you sure you want to proceed?</div>
                        <br>
                        <button id="reset_all_to_free" onclick="" class="free_button reset_all_to_free">YES</button>
                        <button id="" data-dismiss="modal" onclick="" class="free_button">NO</button>
                    </div>
                </div>
            </div>
        </div>
        <!--END SET FREE ALL MODAL-->
        <div class="tr">
            <div class="td"><?php echo $row['MAIN']; ?></div>
            <div class="td"><?php echo $row['NAME']; ?></div>
            <div class="td class_color" id="class_color<?php echo $row['id']; ?>"><?php echo $row['CLASS']; ?></div>
            <div class="td"><?php echo $row['MS']; ?></div>
            <div class="td"><?php echo $row['OS']; ?></div>
            <div class="td"><button id="icc<?php echo $row['id']; ?>" onclick="" class="icc_button free_saved_color"><?php echo $row['ICC']; ?></button></div>
            <div class="td"><button id="rs<?php echo $row['id']; ?>" onclick="" class="rs_button free_saved_color"><?php echo $row['RS']; ?></button></div>
            <div class="td"><button id="<?php echo $row['id']; ?>" onclick="" class="delbutton"><img src="img/s_delete.png" alt=""></button></div>
        </div>
                
        <?php
                }
            }
            echo '</div>';
            //ADD PODATKE U TABLICU IZ FORME
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
            mysqli_close($dbc);
        ?>
    </div>
  
    <script>
        var searchbox = document.getElementById("searchbox");
        var SearchbBar = document.getElementById("SearchbBar");
    
        SearchbBar.onmouseover = function(){ 
            searchbox.classList.toggle("active");
        }
    </script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
