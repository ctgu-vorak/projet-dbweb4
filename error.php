<?php
    // Gestion des erreurs
    if(isset($_GET['code'])) {
        if ($_GET['code'] == 404)
            header("Location: https://pedago.univ-avignon.fr/~uapv2001983/projet-dbweb4/index.php");
    }
?>
