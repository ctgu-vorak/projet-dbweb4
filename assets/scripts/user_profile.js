$(document).ready(function () {
    $("#hide_show_column").click(function () {
        $(".notes").toggle();
        if ($(".notes").css('display') === 'none') {
            $("#hide_show_column").html("Afficher les votes");
            $("#pub").attr("colspan", "3");
            $("#return").attr("colspan", "1");
            $(".accueil").attr("colspan", "2");
        } else {
            $("#hide_show_column").html("Cacher les votes");
            $("#pub").attr("colspan", "4");
            $("#return").attr("colspan", "2");
            $(".accueil").attr("colspan", "3");
        }
    });
    $('.content').hover(function () {
        $(this).animate({'zoom': 1.25}, 25);
    }, function () {
        $(this).animate({'zoom': 1}, 25);
    });

    /* ---------- Passage en bleu si la personne a une publication ---------- */

    $(".ctps").hover(function () {
        $(this).css("background-color", "#607FFF");
    },
    function () {
        $(this).css("background-color", "#607FFF");
    });


});
