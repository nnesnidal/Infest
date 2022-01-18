$(document).ready(function(){ 
    $('.odabrani span').tooltip({
        track:true,
        open: function(event, ui) {
            var id = this.id;
            var odabran = $(this).attr('data-id');
            $.ajax({
                url:'pretrazivac-info.php',
                type:'post',
                data:{odabran:odabran},
                success: function(data){
                    // Setting content option
                    $("#"+id).tooltip('option','content',data);
                }
            });
        }
    });
    $(".odabrani span").mouseout(function(){
        // re-initializing tooltip
        $(this).attr('title','Please wait..');
        $(this).tooltip();
        $('.ui-tooltip').hide();
    });
}); 