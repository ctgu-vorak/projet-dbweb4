<?php
    if(isset($_SESSION['pseudo'])) {
        echo "
<div class='w3-bar w3-theme'>
    <a title='Accéder à votre profil' class='w3-bar-item w3-mobile w3-theme w3-hover-blue-grey' href='?idp=".$_SESSION['id']."' style='text-decoration: none'>
        <i class='fa fa-user-circle-o'></i> Mon profil
    </a>";
    require 'files/addmod_modal.php';
    echo "    
    <a title='Retour index' class='w3-bar-item w3-mobile w3-theme w3-hover-blue-grey w3-right' href='".htmlspecialchars($_SERVER['PHP_SELF'])."' style='text-decoration: none'>
        <i class='fa fa-reply-all'></i>
    </a>
    <form method='post' action='".htmlspecialchars($_SERVER['PHP_SELF'])."'>
        <button title='Se déconnecter' name='deconnexion' class='w3-right w3-bar-item w3-button w3-mobile w3-theme w3-hover-blue-grey' type='submit'>
        <i class='fa fa-sign-out'></i></button>
    </form>
</div>
        ";

    } else {
        echo "
<div class='w3-bar w3-theme'>";
        include("files/session_connexion.php");
    echo "        
    <a class='w3-bar-item w3-mobile w3-right w3-theme w3-hover-blue-grey w3-right' href='".htmlspecialchars($_SERVER['PHP_SELF'])."' style='text-decoration: none'>
        <i class='fa fa-reply-all'></i>
    </a>
</div>";
    }

?>
