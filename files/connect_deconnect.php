<?php
    session_start();
    if(isset($_SESSION['pseudo'])) {
        echo "
<table class='w3-table w3-margin'>
    <tr>
    <td class='w3-container'>
        ".$_SESSION['pseudo']."
    </td>
    <td class='w3-right' style='width: auto'>
        <form method='post' action='".htmlspecialchars($_SERVER['PHP_SELF'])."'>
            <button name='deconnexion' class='w3-button w3-deep-purple w3-round-xlarge w3-hover-purple' type='submit'>Déconnexion</button>
        </form>
    </td>
    </tr>
</table>";
    } else {
        echo "
<table class='w3-table w3-margin'>
    <tr>
    <td class='w3-container'>
        Invité
    </td>
    </tr>
</table>";
    }
