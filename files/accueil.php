<?php
    session_start();
    if(isset($_SESSION['pseudo'])) {
        echo "
        <div class='w3-center'>
            <h1>Bonjour ".$_SESSION['pseudo'].". Que souhaitez-vous voir ?</h1>
            
            <a class='w3-button w3-hover-deep-purple' href='?page_content=user_list'>Utilisateurs <br />
                <i class='fa fa-address-book' style='font-size:150%'></i>
            </a>
            <a class='w3-button w3-hover-deep-purple' href='?page_content=publications'>Publications <br />
                <i class='fa fa-address-book' style='font-size:150%'></i>
            </a>
                
        </div>
        ";
    } else {
        echo "
        <div class='w3-center'>";
        require 'files/session_connexion.php';
        echo "
            <br>
            <h1>Bonjour à vous. Que souhaitez-vous voir ?</h1>
            
            <a class='w3-button w3-hover-deep-purple' href='?page_content=user_list'>Utilisateurs <br />
                <i class='fa fa-address-book' style='font-size:150%'></i>
            </a>
            <a class='w3-button w3-hover-deep-purple' href='?page_content=publications'>Publications <br />
                <i class='fa fa-address-book' style='font-size:150%'></i>
            </a>
                
        </div>
        ";
    }
?>



