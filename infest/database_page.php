<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Caveat&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/database_style.css?v=<?php echo time(); ?>">
    <script src="skripte/popup.js"></script>
    <script src="skripte/validate_add.js"></script>
    <!--<script src="skripte/cascading_dropdown.js"></script>-->
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

        function removeValidationOnKeyUp() {
            $('#main_error').empty();
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
                var info = 'id=' + del_id.replace("delete", "");
                $.ajax({
                    type : "POST",
                    url : "delete.php",
                    data : info,
                    success : function() {
                    }
                });
                $(this).closest(".tr").hide(400, function(){
                    this.remove(); 
                });
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

            $(".add_character_container").on("mouseover", function() {
                $(this).children(".add_character_menu").addClass("show");
            }).on("mouseleave", function() {
                $(this).children(".add_character_menu").removeClass("show");
            });

            var subjectObject = {
                "DeathKnight": { "Blood DPS": "0", "Frost DPS": "1", "Tank": "2", "Unholy DPS": "3"},
                "Druid": { "Balance": "0", "Feral": "1", "Resto": "2", "Tank": "3"},
                "Hunter": { "BM": "0", "MM": "1", "Survival": "2"},
                "Mage": { "Arcane": "0", "Fire": "1", "Frost": "2"},
                "Paladin": { "Holy": "0", "Protection": "1", "Retribution": "2"},
                "Priest": { "Discipline": "0", "Holy": "1", "Shadow": "2"},
                "Rogue": { "Assassin": "0", "Combat": "1", "Subtlety": "2"},
                "Shaman": { "Elemental": "0", "Enhancement": "1", "Resto": "2"},
                "Warlock": { "Affliction": "0", "Demonology": "1", "Destruction": "2"},
                "Warrior": { "Arms": "0", "Fury": "1", "Protection": "2"}
            }

            for (var x in subjectObject) {
                var opcija = '<div class="add_character_menu_item_class">'+x+'</div>';
                $('#addchar_odabrani_class_menu').append(opcija);
            }

            $(".add_character_menu_item_class").on("click", function() {
                $(this).closest(".add_character_container").find(".addchar_odabrani").empty();
                $(this).closest(".add_character_container").find(".addchar_odabrani").append($(this).html());
                var add_char_odabrani = $(this).closest(".add_character_container").find(".addchar_odabrani").html();
                $('#addchar_odabrani_ms_menu').empty();
                $('#addchar_odabrani_os_menu').empty();
                $('#addchar_odabrani_ms').empty();
                $('#addchar_odabrani_os').empty();
                for (var y in subjectObject[add_char_odabrani]) {
                    var podopcija = '<div class="add_character_menu_item">'+y+'</div>';
                    $('#addchar_odabrani_ms_menu').append(podopcija);
                    $('#addchar_odabrani_os_menu').append(podopcija);
                }
                $(".add_character_menu_item").on("click", function() {
                    $(this).closest(".add_character_container").find(".addchar_odabrani").empty();
                    $(this).closest(".add_character_container").find(".addchar_odabrani").append($(this).html());
                    $(this).closest(".add_character_container").children(".add_character_menu").removeClass("show");
                    $("#ms_error").empty();
                    $("#os_error").empty();
                });
                $(this).closest(".add_character_container").children(".add_character_menu").removeClass("show");
                $("#class_error").empty();
            });

            $(".add_character_menu_item").on("click", function() {
                $(this).closest(".add_character_container").find(".addchar_odabrani").empty();
                $(this).closest(".add_character_container").find(".addchar_odabrani").append($(this).html());
                $(this).closest(".add_character_container").children(".add_character_menu").removeClass("show");
            });

            $(".addchar_odabrani").on("click", function() {
                if ($(this).html() != "FREE" && $(this).html() != "SAVED") {
                    $(this).empty();
                }
            });

            $("#addchar_odabrani_class").on("click", function() {
                $('#addchar_odabrani_ms_menu').empty();
                $('#addchar_odabrani_os_menu').empty();
                $('#addchar_odabrani_ms').empty();
                $('#addchar_odabrani_os').empty();
            });

            $(".add_button").on("click", function() {
                validate();
                if (validate()) {
                    var main = $('#main').val();
                    var name = $('#name').val();
                    var o_class = $('#addchar_odabrani_class').html();
                    var ms = $('#addchar_odabrani_ms').html();
                    var os = $('#addchar_odabrani_os').html();
                    var icc = $('#addchar_odabrani_icc').html();
                    var rs = $('#addchar_odabrani_rs').html();
                    $.ajax({
                        type : "POST",
                        url : "add-new-character.php",
                        data : {main: main, name: name, o_class: o_class, ms: ms, os: os, icc: icc, rs: rs},
                        success : function() { 
                        }
                    });
                    location.reload();
                }
            });

            $(".reset_popup").on("click", function() {
                resetValidation();
                $('#main').val('');
                $('#name').val('');
                $('#addchar_odabrani_class').empty();
                $('#addchar_odabrani_ms_menu').empty();
                $('#addchar_odabrani_os_menu').empty();
                $('#addchar_odabrani_ms').empty();
                $('#addchar_odabrani_os').empty();
                if ($('#addchar_odabrani_icc').html() == 'SAVED') {
                    $('#addchar_odabrani_icc').empty();
                    $('#addchar_odabrani_icc').append('FREE');
                }
                if ($('#addchar_odabrani_rs').html() == 'SAVED') {
                    $('#addchar_odabrani_rs').empty();
                    $('#addchar_odabrani_rs').append('FREE');
                }
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
                    <button class="reset_popup"><img class="refresh_img" src="img/refresh.png" alt=""></button>
                    <div class="add_character" id="add_character">
                        <br>
                        <label for="main">MAIN</label>
                        <br>
                        <input type="text" spellcheck="false" autocomplete="off" name="main" id="main" onkeyup="removeValidationOnKeyUp()" value="">
                        <p id="main_error"></p>
                        <br>
                        <label for="name">NAME</label>
                        <br>
                        <input type="text" spellcheck="false" autocomplete="off" name="name" id="name" onkeyup="checkNameAvailability()" value="">
                        <p id="name_error"></p>
                        <br>
                        <label for="class">CLASS</label>
                        <br>
                        <div id="addchar_class_container" class="add_character_container addchar_class_container">
                            <div class="addchar_odabrani addchar_odabrani_class" id="addchar_odabrani_class"></div>
                            <div class="add_character_menu addchar_odabrani_class_menu" id="addchar_odabrani_class_menu"></div>
                        </div>
                        <p id="class_error"></p>
                        <br>
                        <label for="ms">MS</label>
                        <br>
                        <div id="addchar_ms_container" class="add_character_container addchar_ms_container">
                            <div class="addchar_odabrani addchar_odabrani_ms" id="addchar_odabrani_ms"></div>
                            <div class="add_character_menu addchar_odabrani_ms_menu" id="addchar_odabrani_ms_menu"></div>
                        </div>
                        <p id="ms_error"></p>
                        <br>
                        <label for="os">OS</label>
                        <br>
                        <div id="addchar_os_container" class="add_character_container addchar_os_container">
                        <div class="addchar_odabrani addchar_odabrani_os" id="addchar_odabrani_os"></div>
                        <div class="add_character_menu addchar_odabrani_os_menu" id="addchar_odabrani_os_menu"></div>
                        </div>
                        <p id="os_error"></p>
                        <br>
                        <label for="icc">ICC</label>
                        <br>
                        <div id="addchar_icc_container" class="add_character_container addchar_icc_container">
                            <div class="addchar_odabrani addchar_odabrani_icc" id="addchar_odabrani_icc">FREE</div>
                            <div class="add_character_menu addchar_odabrani_icc_menu" id="addchar_odabrani_icc_menu">
                                <div class="add_character_menu_item addchar_odabrani_icc_rs_menu_item">FREE</div>
                                <div class="add_character_menu_item addchar_odabrani_icc_rs_menu_item">SAVED</div>
                            </div>
                        </div>
                        <br>
                        <label for="rs">RS</label>
                        <br>
                        <div id="addchar_rs_container" class="add_character_container addchar_rs_container">
                            <div class="addchar_odabrani addchar_odabrani_rs" id="addchar_odabrani_rs">FREE</div>
                            <div class="add_character_menu addchar_odabrani_rs_menu" id="addchar_odabrani_rs_menu">
                                <div class="add_character_menu_item addchar_odabrani_icc_rs_menu_item">FREE</div>
                                <div class="add_character_menu_item addchar_odabrani_icc_rs_menu_item">SAVED</div>
                            </div>
                        </div>
                        <br>
                        <div class="button_modal_add">
                            <div class="add_button">Add</div>
                        </div>
                    </div>
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
            <div class="td"><button id="delete<?php echo $row['id']; ?>" onclick="" class="delbutton"><img src="img/s_delete.png" alt=""></button></div>
        </div>
                
        <?php
                }
            }
            echo '</div>';
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
