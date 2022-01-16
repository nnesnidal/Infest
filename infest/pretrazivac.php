<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
<script>
    function odabraniMain(id, odabran) {
        if ($('#'+id).length === 0) {
            if ($(".odabrani").length < 40) {
                var odabrani = "<div class='odabrani' id='"+id+"'></div>";
                //var info = "<div class='info' id='info"+id+"'></div>";
                var obrisiOdabranog = "<span class='obrisiOdabranog obrisiOdabranogStyle' title='Please wait..' data-id='"+odabran+"' id='obrisi"+id+"'>"+ odabran +"</span>";
                $('#odabrani_container').append(odabrani);
                $('#'+id).append(obrisiOdabranog);
                //$('span').tooltip();
                /*
                $.post('pretrazivac-info.php',{odabran:odabran}, function(data){
                    $('#info'+id).append(data);
                });
                */
                $('#obrisi'+id).tooltip({
                    track:true,
                    tooltipClass: "tooltipEdit",
                    create: function(event, ui) {
                        var id = this.id;
                        var odabran = $(this).attr('data-id');
                        $.ajax({
                            url:'pretrazivac-info.php',
                            type:'post',
                            data:{odabran:odabran},
                            success: function(data){
                                // Setting content option
                                //console.log(id);
                                //if($("#"+id).data('ui-tooltip')) {
                                $("#"+id).tooltip('option','content',data);
                                //console.log(id);
                                //}
                            }
                        });
                    }, 
                });

                $('#obrisi'+id).mouseout(function(){
                    // re-initializing tooltip
                    //$(this).attr('title','Please wait..');
                    //$(this).tooltip();
                    $('.ui-tooltip').hide();
                });
            }
        }
        $(".obrisiOdabranog").click(function(){
            $(this).parent('div').remove();
        });
    } 
</script>
<?php
    //KONEKCIJA NA DATABAZU
    include_once('connect-to-database.php');

    //$search = "";
    $arr = array();

    if(isset($_POST['value'])){
        $search = ucwords(strtolower($_POST['value']));
    }

    $query = "SELECT * FROM infest_lista_chars WHERE ICC = 'FREE' AND MAIN LIKE '%$search%' ORDER BY MAIN";
    $result = mysqli_query($dbc, $query);

    echo '<div class="table" id="table_id">';
    while($row = mysqli_fetch_array($result)){
        if(isset($search) && !(trim($search)=='') && stripos($row['MAIN'], $search) !== false && !in_array($row['MAIN'], $arr)) {
            $arr[] = $row['MAIN'];
            echo '
                <div class="tr">
                    <div class="td">'.$row['MAIN'].'</div>
                    <div class="td"><button onclick="odabraniMain(\''.$row['id'].'\', \''.$row['MAIN'].'\');" class="plus"><i class="fas fa-plus"></i></button></div>
                </div>
            ';
        }
    }
    echo '</div>';
?>