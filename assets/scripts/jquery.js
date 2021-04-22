$(document).ready(function () {
    $("#hide_show_column").click(function () {
        $(".notes").toggle();

        if ($(".notes").css('display') === 'none') {

            $("#hide_show_column").html("Afficher les votes");
            $("#pub").attr("colspan", "2");
            $("#return").attr("colspan", "1");

        } else {
            $("#hide_show_column").html("Cacher les votes");
            $("#pub").attr("colspan", "3");
            $("#return").attr("colspan", "2");
        }


    });

    $('tr:not(#th)').hover(
        function () {
            $(this).animate({'zoom': 1.5}, 40);
        },
        function () {
            $(this).animate({'zoom': 1}, 40);
        });
});