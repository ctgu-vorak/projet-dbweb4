/* ----- RECHERCHE UTILISATEURS ----- */
function userSearch() {
    let input, filter, table, tr, td, i;
    input = document.getElementById("search_Input");
    filter = input.value.toUpperCase();
    table = document.getElementById("usertable");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
        if (td) {
            let value;
            value = td.textContent || td.innerText;
            if (value.toUpperCase().indexOf(filter) > -1)
                tr[i].style.display = "";
            else
                tr[i].style.display = "none";
        }
    }
}

/* ----- RECHERCHE CATEGORIE ----- */
function catSearch() {
    let input, filter, table, tr, td, i;
    input = document.getElementById("search_Input");
    filter = input.value.toUpperCase();
    table = document.getElementById("cat_Table");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
        if (td) {
            let value;
            value = td.textContent || td.innerText;
            if (value.toUpperCase().indexOf(filter) > -1)
                tr[i].style.display = "";
            else
                tr[i].style.display = "none";
        }
    }
}