<?php
    session_start();
    if(isset($_SESSION['pseudo'])) {
        echo "
        <div>
            <div>";
            require 'files/connect_deconnect.php';
            echo"
            </div>
            <div class='w3-container w3-padding w3-center'>
            <table class='w3-border w3-table-all w3-centered'>
                <thead>
                    <tr class='w3-border'>
                        <td>";include("add_modal.php"); echo "</td>
                        <th colspan='3'>Publications</th>
                    </tr>
                    <tr class='w3-border'>
                        <th class='w3-border'>Catégories</th>
                        <th class='w3-border'>Message</th>
                        <th class='w3-border'>Votes</th>
                        <th class='w3-border'>Liens</th>
                    </tr>
                </thead>
                <tbody>";

        if(isset($db)) {
            require 'others_files/class_class.php';
            $query = $db->prepare("SELECT categories.categorie, categories.id, contenu FROM utilisateurs JOIN publications ON utilisateurs.id = publications.auteur JOIN categories ON publications.categorie = categories.id GROUP BY categories.categorie, categories.id, publications.contenu ORDER BY categories.categorie");
            $query->execute();
            $query->setFetchMode(PDO::FETCH_CLASS, 'publications_class');
            while ($content = $query->fetch()) {
                echo "
                    <tr class='w3-border'>
                         <td class='w3-container w3-border'>".$content->categorie."</td>
                         <td class='w3-container w3-border' style='width: auto'>".$content->contenu."</td>
                         <td class='w3-container w3-border' style='width: auto'>
                            <form method='post' action='" . htmlspecialchars($_SERVER['PHP_SELF']) . "'>
                                <button class='w3-button w3-deep-purple w3-round-xlarge w3-hover-purple' type='reset' name='vote' value=''><i class='fa fa-thumbs-o-up'></i></button>
                            </form>
                         </td>
                         <td class='w3-container w3-border' style='width: auto'>
                            <form method='get' action='" . htmlspecialchars($_SERVER['PHP_SELF']) . "'>
                                <button class='w3-button w3-deep-purple w3-round-xlarge w3-hover-purple' type='submit' name='idc' value='$content->id'> Lien vers la catégorie</button>
                            </form>
                        </td>
                    </tr>";
            }
        } echo "
        
                <tr class='w3-border'>
                    <td class='w3-container w3-border' colspan='3'>
                        <a href='".htmlspecialchars($_SERVER['PHP_SELF'])."'>
                            <button class='w3-button w3-deep-purple w3-round-xlarge w3-hover-purple'><i class='fa fa-reply'></i> Retour page accueil</button>
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>";
    } else {
    echo "
    <div>";
        echo "<div>";
        require 'files/connect_deconnect.php';
        echo "</div>
            <div class='w3-padding'>
            <table class='w3-border w3-table-all w3-centered'>
                <thead>
                    <tr class='w3-border'>
                        <th colspan='4'>Publications</th>
                    </tr>
                    <tr class='w3-border'>
                        <th class='w3-border'>Catégories</th>
                        <th class='w3-border'>Message</th>
                        <th class='w3-border'>Liens</th>
                    </tr>
                </thead>
                <tbody>";
        if(isset($db)) {
            require 'others_files/class_class.php';
            $query = $db->prepare("SELECT categories.categorie, categories.id, contenu FROM utilisateurs JOIN publications ON utilisateurs.id = publications.auteur JOIN categories ON publications.categorie = categories.id GROUP BY categories.categorie, categories.id, publications.contenu ORDER BY categories.categorie");
            $query->execute();
            $query->setFetchMode(PDO::FETCH_CLASS, 'publications_class');
            while ($content = $query->fetch()) {
                echo "
                    <tr class='w3-border'>
                         <td class='w3-container w3-border'>".$content->categorie."</td>
                         <td class='w3-container w3-border' style='width: auto'>".$content->contenu."</td>
                         <td class='w3-container w3-border' style='width: auto'>
                            <form method='get' action='" . htmlspecialchars($_SERVER['PHP_SELF']) . "'>
                                <button class='w3-button w3-deep-purple w3-round-xlarge w3-hover-purple' type='submit' name='idc' value='$content->id'> Lien vers la catégorie</button>
                            </form>
                        </td>
                    </tr>";
            }
        } echo "
        
                <tr class='w3-border'>
                    <td class='w3-container w3-border' colspan='3'>
                        <a href='".htmlspecialchars($_SERVER['PHP_SELF'])."'>
                            <button class='w3-button w3-deep-purple w3-round-xlarge w3-hover-purple'><i class='fa fa-reply'></i> Retour page accueil</button>
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
        </div>
    </div>";
    }
?>


