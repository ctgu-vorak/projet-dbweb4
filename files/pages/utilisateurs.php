<?php
session_start();
    echo "   
    <div>";
    require 'files/pages/navbar.php';
    echo"
    </div>
    <div class='w3-margin'>
        <table class='w3-border w3-table-all w3-centered' id='usertable'>
            <thead>
                <tr class='w3-border'>
                    <th colspan='2'>Utilisateurs</th>
                </tr>
                <tr class='w3-border'>
                    <th colspan='2'>
                        <input class='w3-input w3-border w3-padding' type='text' placeholder='Qui cherchez vous ?' id='search_Input' onkeyup='userSearch()' />
                    </th>
                </tr>
                <tr class='w3-border'>
                    <th class='w3-border'>Nom</th>
                    <th class='w3-border'>Lien</th>
                </tr>
            </thead>
            <tbody>";
    require 'files/others/class_class.php';
    if (isset($db)) {
        $stmt = $db->query("SELECT pseudo, auteur, utilisateurs.id FROM utilisateurs LEFT JOIN publications p on utilisateurs.id = p.auteur GROUP BY utilisateurs.id, auteur ORDER BY utilisateurs.id ASC");
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'premiere');

        while($content = $stmt->fetch()) {
            if($content->auteur != null) {
                echo "<td class='w3-container w3-border ctps'>" . $content->pseudo . "</td>
                    <td class='w3-container w3-border' style='width: auto'>
                        <a class='w3-button w3-theme w3-round-xlarge w3-hover-dark-grey' href='?idp=$content->id'> Lien vers le profil</a>
                    </td>
                </tr>";
            } else {
                echo "<td class='w3-container w3-border'>" . $content->pseudo . "</td>
                    <td class='w3-container w3-border' style='width: auto'>
                        <a class='w3-button w3-theme w3-round-xlarge w3-hover-dark-grey' href='?idp=$content->id'> Lien vers le profil</a>
                    </td>
                </tr>";
            }
        }
    }
    echo "
                <tr class='w3-border'>
                    <td class='w3-container w3-border' colspan='2'>
                        <a href='".htmlspecialchars($_SERVER['PHP_SELF'])."'>
                            <button class='w3-button w3-theme w3-round-xlarge w3-hover-dark-grey'><i class='fa fa-reply'></i> Retour page accueil</button>
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    ";
?>
<script type='text/javascript' src='assets/scripts/search.js'></script>
<script type='text/javascript' src='assets/scripts/ux_jquery.js'></script>
