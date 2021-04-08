$(document).ready(function(){
    $("#hide_show_column").click( function () {
        if ($(".notes").css('display') !== 'none') {
            $(".notes").hide();
            $("#hide_show_column").html("Afficher la colonne des votes");
            $("#pub").attr("colspan", "2");
            $("#return").attr("colspan", "1");
        } else {
            $(".notes").show();
            $("#hide_show_column").html("Cacher la colonne des votes");
            $("#pub").attr("colspan", "3");
            $("#return").attr("colspan", "2");
        }
    });
});