<?php
    session_start();
    if(isset($_SESSION['pseudo'])) {
        echo "
        <div>";
        require 'files/pages/navbar.php';
        echo "
        </div>
        <div class='w3-center'>
            <h1>Bienvenue sur Alphidi {$_SESSION['pseudo']}<br />Que souhaitez-vous voir ?</h1>
            
            <a class='w3-button w3-hover-blue-grey' href='?page_content=user_list'>Utilisateurs <br />
                <i class='fa fa-address-book' style='font-size:150%'></i>
            </a>
            <a class='w3-button w3-hover-blue-grey' href='?page_content=publications'>Publications <br />
                <i class='fa fa-server' style='font-size:150%'></i>
            </a><br /><br />
                
        </div>
        ";
    } else {
        echo "
        <div>";
        require 'files/pages/navbar.php';
        echo "
        </div>
        <div class='w3-center'>
            <h1>Bienvenue sur Alphidi.<br />Que souhaitez-vous voir ?</h1>
            
            <a class='w3-button w3-hover-blue-grey' href='?page_content=user_list'>Utilisateurs <br />
                <i class='fa fa-address-book' style='font-size:150%'></i>
            </a>
            <a class='w3-button w3-hover-blue-grey' href='?page_content=publications'>Publications <br />
                <i class='fa fa-server' style='font-size:150%'></i>
            </a><br /><br />
                
        </div>
        ";
    }
?>
<div class='w3-center w3-display-bottommiddle w3-theme w3-container w3-padding' style="width: 100%">
    <b>Alphidi</b> est un site qui a été réalisé dans le cadre d'un projet universitaire. <br />
    De ce fait, il bénéficie d'une protection contre le plagiat. <br />
    <i>(<a href='https://www.legifrance.gouv.fr/codes/article_lc/LEGIARTI000006278911' target='_blank'><b>Article L122-4</b></a> du Code de la propriété intellectuelle)</i> <br />
    &copy; Tout droits réservés - 2021
</div>