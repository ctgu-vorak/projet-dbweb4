<?php
    if(isset($_SESSION['pseudo'])) {
        echo "
<div class='w3-bar w3-deep-purple'>
    <form method='post' action='".htmlspecialchars($_SERVER['PHP_SELF'])."'>
        <button name='deconnexion' class='w3-bar-item w3-button w3-mobile w3-left' type='submit'><i class='fa fa-sign-out'></i> Déconnexion</button>
    </form>
    <span class='w3-bar-item w3-mobile'>".$_SESSION['pseudo']."</span>
    <a class='w3-bar-item w3-mobile w3-right w3-deep-purple w3-hover-purple w3-right' href='".htmlspecialchars($_SERVER['PHP_SELF'])."' style='text-decoration: none'>
        <i class='fa fa-reply'></i> Retour Accueil
    </a>
</div>
        ";

    } else {
        echo "
<div class='w3-bar w3-deep-purple'>";
        include("files/session_connexion.php");
    echo "        
    <a class='w3-bar-item w3-mobile w3-right w3-deep-purple w3-hover-purple w3-right' href='".htmlspecialchars($_SERVER['PHP_SELF'])."' style='text-decoration: none'>
        <i class='fa fa-reply'></i> Retour Accueil
    </a>
</div>";
    }

?>

<!--
echo "
<div class='w3-container w3-padding'>";
    include("files/session_connexion.php");
        echo "
    </div>";
    }
-->
