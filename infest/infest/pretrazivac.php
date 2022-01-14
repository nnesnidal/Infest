<script>
    function odabraniMain(id, odabran) {
        if ($('#'+id).length === 0) {
            if ($(".odabrani").length < 40) {
            //var redak = "<div class='redak' id='redak"+id+"'></div>";
            var odabrani = "<div class='odabrani' id='"+id+"'></div>";
            var obrisiOdabranog = "<a class='obrisiOdabranog obrisiOdabranogStyle' id='obrisi"+id+"'>"+ odabran +"</a>";
            //$('#odabrani_container').append(redak);
            $('#odabrani_container').append(odabrani);
            //$('#odabrani_container').append(obrisiOdabranog);
            $('#'+id).append(obrisiOdabranog);
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