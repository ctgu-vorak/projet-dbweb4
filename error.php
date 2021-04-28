<?php
    // Gestion des erreurs
    switch($_GET['code']) {
        case 404:
            header("Location: https://pedago.univ-avignon.fr/~uapv2001983/projet-dbweb4/index.php");
            break;
        case 500:
            echo "Erreur Interne du Serveur... Merci de patienter.";
            break;
    }
?>
