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
                var v_main_dropdown_container = '<div class="main_dropdown_container" id="main_dropdown_container'+cokolada_td_br+'"></div>';
                var v_main_dropdown_span = '<span class="main_dropdown_span" id="main_dropdown_span'+cokolada_td_br+'"></span>';
                var v_main_dropdown_menu = '<div class="main_dropdown_menu" id="main_dropdown_menu'+cokolada_td_br+'"></div>';
                var v_spec_container = '<div class="spec_container" id="spec_container'+cokolada_td_br+'"></div>';
                var v_class_container = '<div class="class_container" id="class_container'+cokolada_td_br+'"></div>';
                var v_cog_style = '<i class="fas fa-cog cog_style"></i>';
                var v_menu = '<div id="menu'+cokolada_td_br+'" class="cokolada_menu"></div>';
                var v_menu_item_dk = '<div id ="dk'+cokolada_td_br+'" class="cokolada_menu_item">DeathKnight</div>';
                var v_menu_item_sub_dk = '<div id="sub_dk'+cokolada_td_br+'" class="cokolada_sub_menu"></div>';
                var v_menu_item_dr = '<div id ="dr'+cokolada_td_br+'" class="cokolada_menu_item">Druid</div>';
                var v_menu_item_sub_dr = '<div id="sub_dr'+cokolada_td_br+'" class="cokolada_sub_menu"></div>';
                var v_menu_item_ht = '<div id ="ht'+cokolada_td_br+'" class="cokolada_menu_item">Hunter</div>';
                var v_menu_item_sub_ht = '<div id="sub_ht'+cokolada_td_br+'" class="cokolada_sub_menu"></div>';
                var v_menu_item_mg = '<div id ="mg'+cokolada_td_br+'" class="cokolada_menu_item">Mage</div>';
                var v_menu_item_sub_mg = '<div id="sub_mg'+cokolada_td_br+'" class="cokolada_sub_menu"></div>';
                var v_menu_item_pl = '<div id ="pl'+cokolada_td_br+'" class="cokolada_menu_item">Paladin</div>';
                var v_menu_item_sub_pl = '<div id="sub_pl'+cokolada_td_br+'" class="cokolada_sub_menu"></div>';
                var v_menu_item_pr = '<div id ="pr'+cokolada_td_br+'" class="cokolada_menu_item">Priest</div>';
                var v_menu_item_sub_pr = '<div id="sub_pr'+cokolada_td_br+'" class="cokolada_sub_menu"></div>';
                var v_menu_item_rg = '<div id ="rg'+cokolada_td_br+'" class="cokolada_menu_item">Rogue</div>';
                var v_menu_item_sub_rg = '<div id="sub_rg'+cokolada_td_br+'" class="cokolada_sub_menu"></div>';
                var v_menu_item_sh = '<div id ="sh'+cokolada_td_br+'" class="cokolada_menu_item">Shaman</div>';
                var v_menu_item_sub_sh = '<div id="sub_sh'+cokolada_td_br+'" class="cokolada_sub_menu"></div>';
                var v_menu_item_wl = '<div id ="wl'+cokolada_td_br+'" class="cokolada_menu_item">Warlock</div>';
                var v_menu_item_sub_wl = '<div id="sub_wl'+cokolada_td_br+'" class="cokolada_sub_menu"></div>';
                var v_menu_item_wr = '<div id ="wr'+cokolada_td_br+'" class="cokolada_menu_item">Warrior</div>';
                var v_menu_item_sub_wr = '<div id="sub_wr'+cokolada_td_br+'" class="cokolada_sub_menu"></div>';

                var v_menu_item_dk_blood = '<div class="cokolada_submenu_item submenu_item_dk">Blood DPS</div>';
                var v_menu_item_dk_frost = '<div class="cokolada_submenu_item submenu_item_dk">Frost DPS</div>';
                var v_menu_item_dk_tank = '<div class="cokolada_submenu_item submenu_item_dk">Tank</div>';
                var v_menu_item_dk_unh = '<div class="cokolada_submenu_item submenu_item_dk">Unholy DPS</div>';

                var v_menu_item_dr_balance = '<div class="cokolada_submenu_item submenu_item_dr">Balance</div>';
                var v_menu_item_dr_feral = '<div class="cokolada_submenu_item submenu_item_dr">Feral</div>';
                var v_menu_item_dr_resto = '<div class="cokolada_submenu_item submenu_item_dr">Resto</div>';
                var v_menu_item_dr_tank = '<div class="cokolada_submenu_item submenu_item_dr">Tank</div>';

                var v_menu_item_ht_bm = '<div class="cokolada_submenu_item submenu_item_ht">BM</div>';
                var v_menu_item_ht_mm = '<div class="cokolada_submenu_item submenu_item_ht">MM</div>';
                var v_menu_item_ht_survival = '<div class="cokolada_submenu_item submenu_item_ht">Survival</div>';

                var v_menu_item_mg_arcane = '<div class="cokolada_submenu_item submenu_item_mg">Arcane</div>';
                var v_menu_item_mg_fire = '<div class="cokolada_submenu_item submenu_item_mg">Fire</div>';
                var v_menu_item_mg_frost = '<div class="cokolada_submenu_item submenu_item_mg">Frost</div>';

                var v_menu_item_pl_holy = '<div class="cokolada_submenu_item submenu_item_pl">Holy</div>';
                var v_menu_item_pl_prot = '<div class="cokolada_submenu_item submenu_item_pl">Protection</div>';
                var v_menu_item_pl_ret = '<div class="cokolada_submenu_item submenu_item_pl">Retribution</div>';

                var v_menu_item_pr_disc = '<div class="cokolada_submenu_item submenu_item_pr">Discipline</div>';
                var v_menu_item_pr_holy = '<div class="cokolada_submenu_item submenu_item_pr">Holy</div>';
                var v_menu_item_pr_shadow = '<div class="cokolada_submenu_item submenu_item_pr">Shadow</div>';

                var v_menu_item_rg_assassin = '<div class="cokolada_submenu_item submenu_item_rg">Assassin</div>';
                var v_menu_item_rg_combat = '<div class="cokolada_submenu_item submenu_item_rg">Combat</div>';
                var v_menu_item_rg_subtlety = '<div class="cokolada_submenu_item submenu_item_rg">Subtlety</div>';

                var v_menu_item_sh_ele = '<div class="cokolada_submenu_item submenu_item_sh">Elemental</div>';
                var v_menu_item_sh_enha = '<div class="cokolada_submenu_item submenu_item_sh">Enhancement</div>';
                var v_menu_item_sh_resto = '<div class="cokolada_submenu_item submenu_item_sh">Resto</div>';

                var v_menu_item_wl_affli = '<div class="cokolada_submenu_item submenu_item_wl">Affliction</div>';
                var v_menu_item_wl_demo = '<div class="cokolada_submenu_item submenu_item_wl">Demonology</div>';
                var v_menu_item_wl_destro = '<div class="cokolada_submenu_item submenu_item_wl">Destruction</div>';

                var v_menu_item_wr_arms = '<div class="cokolada_submenu_item submenu_item_wr">Arms</div>';
                var v_menu_item_wr_fury = '<div class="cokolada_submenu_item submenu_item_wr">Fury</div>';
                var v_menu_item_wr_prot = '<div class="cokolada_submenu_item submenu_item_wr">Protection</div>';

                $('#cokolada'+cokolada_td_br).append(v_cokolada_container, v_main_dropdown_container, v_spec_container, v_class_container);
                
                $('#cokolada_container'+cokolada_td_br).append(v_cog_style, v_menu);
                $('#menu'+cokolada_td_br).append(v_menu_item_dk, v_menu_item_dr, v_menu_item_ht, v_menu_item_mg, v_menu_item_pl, 
                    v_menu_item_pr, v_menu_item_rg, v_menu_item_sh, v_menu_item_wl, v_menu_item_wr);
                $('#dk'+cokolada_td_br).append(v_menu_item_sub_dk);
                $('#dr'+cokolada_td_br).append(v_menu_item_sub_dr);
                $('#ht'+cokolada_td_br).append(v_menu_item_sub_ht);
                $('#mg'+cokolada_td_br).append(v_menu_item_sub_mg);
                $('#pl'+cokolada_td_br).append(v_menu_item_sub_pl);
                $('#pr'+cokolada_td_br).append(v_menu_item_sub_pr);
                $('#rg'+cokolada_td_br).append(v_menu_item_sub_rg);
                $('#sh'+cokolada_td_br).append(v_menu_item_sub_sh);
                $('#wl'+cokolada_td_br).append(v_menu_item_sub_wl);
                $('#wr'+cokolada_td_br).append(v_menu_item_sub_wr);
                $('#sub_dk'+cokolada_td_br).append(v_menu_item_dk_blood, v_menu_item_dk_frost, v_menu_item_dk_tank, v_menu_item_dk_unh);
                $('#sub_dr'+cokolada_td_br).append(v_menu_item_dr_balance, v_menu_item_dr_feral, v_menu_item_dr_resto, v_menu_item_dr_tank);
                $('#sub_ht'+cokolada_td_br).append(v_menu_item_ht_bm, v_menu_item_ht_mm, v_menu_item_ht_survival);
                $('#sub_mg'+cokolada_td_br).append(v_menu_item_mg_arcane, v_menu_item_mg_fire, v_menu_item_mg_frost);
                $('#sub_pl'+cokolada_td_br).append(v_menu_item_pl_holy, v_menu_item_pl_prot, v_menu_item_pl_ret);
                $('#sub_pr'+cokolada_td_br).append(v_menu_item_pr_disc, v_menu_item_pr_holy, v_menu_item_pr_shadow);
                $('#sub_rg'+cokolada_td_br).append(v_menu_item_rg_assassin, v_menu_item_rg_combat, v_menu_item_rg_subtlety);
                $('#sub_sh'+cokolada_td_br).append(v_menu_item_sh_ele, v_menu_item_sh_enha, v_menu_item_sh_resto);
                $('#sub_wl'+cokolada_td_br).append(v_menu_item_wl_affli, v_menu_item_wl_demo, v_menu_item_wl_destro);
                $('#sub_wr'+cokolada_td_br).append(v_menu_item_wr_arms, v_menu_item_wr_fury, v_menu_item_wr_prot);

                $('#main_dropdown_container'+cokolada_td_br).append(v_main_dropdown_span, v_main_dropdown_menu);

                if ($('#cokolada'+cokolada_td_br).hasClass('dk')) {
                    $('#cokolada'+cokolada_td_br).css('background', '#CE5F71');
                    $('#spec_container'+cokolada_td_br).css('color', '#781324');
                    $('#class_container'+cokolada_td_br).append("DeathKnight");
                    if ($('#cokolada'+cokolada_td_br).hasClass('tank')) {
                        $('#spec_container'+cokolada_td_br).append("-Tank-");
                    }
                    if ($('#cokolada'+cokolada_td_br).hasClass('unh')) {
                        $('#spec_container'+cokolada_td_br).append("-Unholy DPS-");
                    }
                }
                if ($('#cokolada'+cokolada_td_br).hasClass('dr')) {
                    $('#cokolada'+cokolada_td_br).css('background', '#FFA557');
                    $('#spec_container'+cokolada_td_br).css('color', '#B35707');
                    $('#class_container'+cokolada_td_br).append("Druid");
                    if ($('#cokolada'+cokolada_td_br).hasClass('balance')) {
                        $('#spec_container'+cokolada_td_br).append("-Balance-");
                    }
                    if ($('#cokolada'+cokolada_td_br).hasClass('feral')) {
                        $('#spec_container'+cokolada_td_br).append("-Feral-");
                    }
                    if ($('#cokolada'+cokolada_td_br).hasClass('resto')) {
                        $('#spec_container'+cokolada_td_br).append("-Resto-");
                    }
                }
                if ($('#cokolada'+cokolada_td_br).hasClass('ht')) {
                    $('#cokolada'+cokolada_td_br).css('background', '#CCDBB8');
                    $('#spec_container'+cokolada_td_br).css('color', '#6D8749');
                    $('#class_container'+cokolada_td_br).append("Hunter");
                    if ($('#cokolada'+cokolada_td_br).hasClass('mm')) {
                        $('#spec_container'+cokolada_td_br).append("-MM-");
                    }
                }
                if ($('#cokolada'+cokolada_td_br).hasClass('mg')) {
                    $('#cokolada'+cokolada_td_br).css('background', '#B3E1F2');
                    $('#spec_container'+cokolada_td_br).css('color', '#488BA3');
                    $('#class_container'+cokolada_td_br).append("Mage");
                    if ($('#cokolada'+cokolada_td_br).hasClass('fire')) {
                        $('#spec_container'+cokolada_td_br).append("-Fire-");
                    }
                }
                if ($('#cokolada'+cokolada_td_br).hasClass('pl')) {
                    $('#cokolada'+cokolada_td_br).css('background', '#F7D6E4');
                    $('#spec_container'+cokolada_td_br).css('color', '#A8607F');
                    $('#class_container'+cokolada_td_br).append("Paladin");
                    if ($('#cokolada'+cokolada_td_br).hasClass('holy')) {
                        $('#spec_container'+cokolada_td_br).append("-Holy-");
                    }
                    if ($('#cokolada'+cokolada_td_br).hasClass('prot')) {
                        $('#spec_container'+cokolada_td_br).append("-Protection-");
                    }
                    if ($('#cokolada'+cokolada_td_br).hasClass('ret')) {
                        $('#spec_container'+cokolada_td_br).append("-Retribution-");
                    }
                }
                if ($('#cokolada'+cokolada_td_br).hasClass('pr')) {
                    $('#cokolada'+cokolada_td_br).css('background', '#fff');
                    $('#spec_container'+cokolada_td_br).css('color', '#B3B3B3');
                    $('#class_container'+cokolada_td_br).append("Priest");
                    if ($('#cokolada'+cokolada_td_br).hasClass('disco')) {
                        $('#spec_container'+cokolada_td_br).append("-Discipline-");
                    }
                    if ($('#cokolada'+cokolada_td_br).hasClass('shadow')) {
                        $('#spec_container'+cokolada_td_br).append("-Shadow-");
                    }
                }
                if ($('#cokolada'+cokolada_td_br).hasClass('rg')) {
                    $('#cokolada'+cokolada_td_br).css('background', '#FFFAB5');
                    $('#spec_container'+cokolada_td_br).css('color', '#B3AB49');
                    $('#class_container'+cokolada_td_br).append("Rogue");
                    if ($('#cokolada'+cokolada_td_br).hasClass('combat')) {
                        $('#spec_container'+cokolada_td_br).append("-Combat-");
                    }
                }
                if ($('#cokolada'+cokolada_td_br).hasClass('sh')) {
                    $('#cokolada'+cokolada_td_br).css('background', '#4494E3');
                    $('#spec_container'+cokolada_td_br).css('color', '#004991');
                    $('#class_container'+cokolada_td_br).append("Shaman");
                    if ($('#cokolada'+cokolada_td_br).hasClass('resto')) {
                        $('#spec_container'+cokolada_td_br).append("-Resto-");
                    }
                }
                if ($('#cokolada'+cokolada_td_br).hasClass('wl')) {
                    $('#cokolada'+cokolada_td_br).css('background', '#B59FF5');
                    $('#spec_container'+cokolada_td_br).css('color', '#5C517D');
                    $('#class_container'+cokolada_td_br).append("Warlock");
                    if ($('#cokolada'+cokolada_td_br).hasClass('demo')) {
                        $('#spec_container'+cokolada_td_br).append("-Demonology-");
                    }
                }
                if ($('#cokolada'+cokolada_td_br).hasClass('wr')) {
                    $('#cokolada'+cokolada_td_br).css('background', '#D0C1B1');
                    $('#spec_container'+cokolada_td_br).css('color', '#7A6043');
                    $('#class_container'+cokolada_td_br).append("Warrior");
                    if ($('#cokolada'+cokolada_td_br).hasClass('fury')) {
                        $('#spec_container'+cokolada_td_br).append("-Fury-");
                    }
                }
            }

            $(".cokolada_menu_item").on("mouseover", function() {
                $(this).children(".cokolada_sub_menu").addClass("show");
            }).on("mouseleave", function() {
                $(this).children(".cokolada_sub_menu").removeClass("show");
            });

            $(".cokolada_container").on("click", function() {
                $(this).children(".cokolada_menu").addClass("show");
            }).on("mouseleave", function() {
                $(this).children(".cokolada_menu").removeClass("show");
            });

            $(".main_dropdown_container").on("mouseover", function() {
                $(this).children(".main_dropdown_menu").addClass("show");
            }).on("mouseleave", function() {
                $(this).children(".main_dropdown_menu").removeClass("show");
            });

            $(".cokolada_submenu_item").on("click", function() {
                $(this).closest(".cokolada_td").find('.spec_container').empty();
                $(this).closest(".cokolada_td").find('.spec_container').append("-"+$(this).html()+"-");
                $(this).closest(".cokolada_td").find('.class_container').empty();
                $(this).closest(".cokolada_td").find('.class_container').append($(this).closest(".cokolada_menu_item").contents().get(0).nodeValue);
                
                if ($(this).hasClass('submenu_item_dk')) {
                    $(this).closest(".cokolada_td").css('background', '#CE5F71');
                    $(this).closest(".cokolada_td").find('.spec_container').css('color', '#781324');
                }
                if ($(this).hasClass('submenu_item_dr')) {
                    $(this).closest(".cokolada_td").css('background', '#FFA557');
                    $(this).closest(".cokolada_td").find('.spec_container').css('color', '#B35707');
                }
                if ($(this).hasClass('submenu_item_ht')) {
                    $(this).closest(".cokolada_td").css('background', '#CCDBB8');
                    $(this).closest(".cokolada_td").find('.spec_container').css('color', '#6D8749');
                }
                if ($(this).hasClass('submenu_item_mg')) {
                    $(this).closest(".cokolada_td").css('background', '#B3E1F2');
                    $(this).closest(".cokolada_td").find('.spec_container').css('color', '#488BA3');
                }
                if ($(this).hasClass('submenu_item_pl')) {
                    $(this).closest(".cokolada_td").css('background', '#F7D6E4');
                    $(this).closest(".cokolada_td").find('.spec_container').css('color', '#A8607F');
                }
                if ($(this).hasClass('submenu_item_pr')) {
                    $(this).closest(".cokolada_td").css('background', '#fff');
                    $(this).closest(".cokolada_td").find('.spec_container').css('color', '#B3B3B3');
                }
                if ($(this).hasClass('submenu_item_rg')) {
                    $(this).closest(".cokolada_td").css('background', '#FFFAB5');
                    $(this).closest(".cokolada_td").find('.spec_container').css('color', '#B3AB49');
                }
                if ($(this).hasClass('submenu_item_sh')) {
                    $(this).closest(".cokolada_td").css('background', '#4494E3');
                    $(this).closest(".cokolada_td").find('.spec_container').css('color', '#004991');
                }
                if ($(this).hasClass('submenu_item_wl')) {
                    $(this).closest(".cokolada_td").css('background', '#B59FF5');
                    $(this).closest(".cokolada_td").find('.spec_container').css('color', '#5C517D');
                }
                if ($(this).hasClass('submenu_item_wr')) {
                    $(this).closest(".cokolada_td").css('background', '#D0C1B1');
                    $(this).closest(".cokolada_td").find('.spec_container').css('color', '#7A6043');
                }

                var spec = $(this).closest(".cokolada_td").find('.spec_container').html().replace("-", "").replace("-", "");
                var spec_class = $(this).closest(".cokolada_td").find('.class_container').html();
                var id_cokolada_td = $(this).closest(".cokolada_td").attr('id');
                
                $('.obrisiOdabranog').each(function(){
                    var odabran = $(this).html();
                    $.ajax({
                        type : "POST",
                        url : "pretrazivac-cokolada.php",
                        data : {odabran: odabran, spec: spec, spec_class: spec_class},
                        success : function(data) {
                            if ($.trim(data) == '') {
                                if ($('#'+id_cokolada_td).find('.main_dropdown_menu_item:contains("'+odabran+'")')){
                                    $('#'+id_cokolada_td).find('.main_dropdown_menu_item:contains("'+odabran+'")').remove();
                                }
                            } else {
                                if ($('#'+id_cokolada_td).find('.main_dropdown_menu_item:contains("'+odabran+'")')){
                                    $('#'+id_cokolada_td).find('.main_dropdown_menu_item:contains("'+odabran+'")').remove();
                                    $('#'+id_cokolada_td).find('.main_dropdown_menu').append(data);
                                }
                            }
                        }
                    });
                });
            });
            
            $(".main_dropdown_span").on("click", function() {
                var main_dropdown_span = $(this).html();
                $(this).empty();
                $('.main_dropdown_menu_item').each(function(){
                    if ($(this).html() == main_dropdown_span && $(this).hasClass("hide_it")) {
                        $(this).removeClass("hide_it");
                    }
                });  
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
                    <li><a href="index.html"><i class="fas fa-home fas_style"></i></a></li>
                    <li><a href="#"><i class="fas fa-table fas_style"></i></a></li>
                    <li><a href="database_page.php"><span class="fas fa-server fas_style"></span></a></li>
                </ul>
            </nav>
        </div>

        <!--SABLON-->
        <table class="cokolada">
            <tr>
                <td class="cokolada_td dk tank" id="cokolada1"></td>
                <td class="cokolada_td wr fury" id="cokolada2"></td>
                <td class="cokolada_td ht mm" id="cokolada3"></td>
                <td class="cokolada_td mg fire" id="cokolada4"></td>
                <td class="cokolada_td pl holy" id="cokolada5"></td>
            </tr>
            <tr>
                <td class="cokolada_td pl prot" id="cokolada6"></td>
                <td class="cokolada_td rg combat" id="cokolada7"></td>
                <td class="cokolada_td dr balance" id="cokolada8"></td>
                <td class="cokolada_td ht mm" id="cokolada9"></td>
                <td class="cokolada_td pr disco" id="cokolada10"></td>
            </tr>
            <tr>
                <td class="cokolada_td wr fury" id="cokolada11"></td>
                <td class="cokolada_td dk unh" id="cokolada12"></td>
                <td class="cokolada_td pr shadow" id="cokolada13"></td>
                <td class="cokolada_td dr balance" id="cokolada14"></td>
                <td class="cokolada_td sh resto" id="cokolada15"></td>
            </tr>
            <tr>
                <td class="cokolada_td rg combat" id="cokolada16"></td>
                <td class="cokolada_td dr feral" id="cokolada17"></td>
                <td class="cokolada_td mg fire" id="cokolada18"></td>
                <td class="cokolada_td pr shadow" id="cokolada19"></td>
                <td class="cokolada_td dr resto" id="cokolada20"></td>
            </tr>
            <tr>
                <td class="cokolada_td pl ret" id="cokolada21"></td>
                <td class="cokolada_td pl ret" id="cokolada22"></td>
                <td class="cokolada_td wr fury" id="cokolada23"></td>
                <td class="cokolada_td wl demo" id="cokolada24"></td>
                <td class="cokolada_td mg fire" id="cokolada25"></td>
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