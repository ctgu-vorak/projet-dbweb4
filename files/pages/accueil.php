<?php
    session_start();
    if(isset($_SESSION['pseudo'])) {
        echo "
        <div>";
        require 'files/pages/navbar.php';
        echo "
        </div>
        <div class='w3-center'>
            <h1>Bonjour ".$_SESSION['pseudo'].". Que souhaitez-vous voir ?</h1>
            
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
                <h1>Bonjour à vous. Que souhaitez-vous voir ?</h1>
                
                <a class='w3-button w3-hover-blue-grey' href='?page_content=user_list'>Utilisateurs <br />
                    <i class='fa fa-address-book' style='font-size:150%'></i>
                </a>
                <a class='w3-button w3-hover-blue-grey' href='?page_content=publications'>Publications <br />
                    <i class='fa fa-server' style='font-size:150%'></i>
                </a>
            </div>
        </div>
        ";
    }
?>