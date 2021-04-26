/* -------- MODAL SCRIPTS -------- */
/* -------- OPEN/CLOSED -------- */

$(document).ready(function () {
    $("#open_modal").click(function () {
        $("#modalBox").show();
    });

    $(".close_modal").click(function () {
        $("#modalBox").hide();
    });

});

/* -------- SHOW TABBED CONTENT -------- */
document.getElementsByClassName("tablink")[0].click();

function switchTabbedContent(evt, switchedTab) {
    let i, x, tablinks;
    x = document.getElementsByClassName("switch");
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablink");
    for (i = 0; i < x.length; i++) {
        tablinks[i].classList.remove("w3-light-grey");
    }
    document.getElementById(switchedTab).style.display = "block";
    evt.currentTarget.classList.add("w3-light-grey");
}