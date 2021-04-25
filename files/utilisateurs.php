<?php
session_start();
if(isset($_SESSION)) {
    echo "
<div>
    <div>";
        require 'files/connect_deconnect.php';
        echo"
    </div>
    <div class='w3-margin'>
        <table class='w3-border w3-table-all w3-centered'>
            <thead>
                <tr class='w3-border'>
                    <th colspan='2'>Utilisateurs</th>
                </tr>
                <tr class='w3-border'>
                    <th class='w3-border'>Nom</th>
                    <th class='w3-border'>Lien</th>
                </tr>
            </thead>
            <tbody>";
        require 'others_files/class_class.php';
        if (isset($db)) {
            $stmt = $db->query("SELECT id, pseudo FROM utilisateurs");
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'users_class');
            while($content = $stmt->fetch()) {
                echo "
                <tr class='w3-border'>
                    <td class='w3-container w3-border ctps'>" . $content->pseudo . "</td>
                    <td class='w3-container w3-border' style='width: auto'>
                        <form method='get' action='" . htmlspecialchars($_SERVER['PHP_SELF']) . "'>
                            <button class='w3-button w3-deep-purple w3-round-xlarge w3-hover-purple' type='submit' name='idp' value='$content->id'> Lien vers le profil</button>
                        </form>
                    </td>
                </tr>";
            }
        }
        echo "
                <tr class='w3-border'>
                    <td class='w3-container w3-border' colspan='2'>
                        <a href='".htmlspecialchars($_SERVER['PHP_SELF'])."'>
                            <button class='w3-button w3-deep-purple w3-round-xlarge w3-hover-purple'><i class='fa fa-reply'></i> Retour page accueil</button>
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <script type='text/javascript' src='assets/scripts/user.js'></script>
</div>
    ";
}
?>

