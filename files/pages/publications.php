<?php
    session_start();
    if(isset($_SESSION['pseudo'])) {
        echo "
        <div>
            <div>";
            require 'files/pages/navbar.php';
            echo"
            </div>
            <div class='w3-container w3-padding w3-center'>
            <table class='w3-border w3-table-all w3-centered' id='cat_Table'>
                <thead>
                    <tr class='w3-border'>
                        <th colspan='4'>Publications</th>
                    </tr>
                    <tr class='w3-border'>
                        <th colspan='4'>                        
                            <input class='w3-input w3-border w3-padding' type='text' placeholder='Qui cherchez vous ?' id='search_Input' onkeyup='catSearch()' />
                        </th>
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
            require 'files/others/class_class.php';
            $query = $db->prepare("SELECT categories.categorie, categories.id, contenu FROM utilisateurs JOIN publications ON utilisateurs.id = publications.auteur JOIN categories ON publications.categorie = categories.id GROUP BY categories.categorie, categories.id, publications.contenu ORDER BY categories.categorie");
            $query->execute();
            $query->setFetchMode(PDO::FETCH_CLASS, 'deuxieme');
            while ($content = $query->fetch()) {
                echo "
                    <tr class='w3-border'>
                         <td class='w3-container w3-border'>".$content->categorie."</td>
                         <form method='post' action='" . htmlspecialchars($_SERVER['PHP_SELF']) . "'>
                         <td class='w3-container w3-border' style='width: auto'>".$content->contenu."<input type='hidden' name='notes_pub' value='{$content->id}' /></td>
                         <td class='w3-container w3-border' style='width: auto'>
                            <button class='w3-button w3-theme w3-round-xlarge w3-hover-dark-grey' type='submit'><i class='fa fa-thumbs-o-up'></i></button>
                        </form>
                         </td>
                         <td class='w3-container w3-border' style='width: auto'>
                            <form method='get' action='" . htmlspecialchars($_SERVER['PHP_SELF']) . "'>
                                <button class='w3-button w3-theme w3-round-xlarge w3-hover-dark-grey' type='submit' name='idc' value='$content->id'> Lien vers la catégorie</button>
                            </form>
                        </td>
                    </tr>";
            }
        } echo "
        
                <tr class='w3-border'>
                    <td class='w3-container w3-border' colspan='4'>
                        <a href='".htmlspecialchars($_SERVER['PHP_SELF'])."'>
                            <button class='w3-button w3-theme w3-round-xlarge w3-hover-dark-grey'><i class='fa fa-reply'></i> Retour page accueil</button>
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
        require 'files/pages/navbar.php';
        echo "</div>
            <div class='w3-padding'>
            <table class='w3-border w3-table-all w3-centered' id='cat_Table'>
                <thead>
                    <tr class='w3-border'>
                        <th colspan='4'>Publications</th>
                    </tr>
                    <tr class='w3-border'>
                        <th colspan='4'>                        
                            <input class='w3-input w3-border w3-padding' type='text' placeholder='Qui cherchez vous ?' id='search_Input' onkeyup='catSearch()' />
                        </th>
                    </tr>
                    <tr class='w3-border'>
                        <th class='w3-border'>Catégories</th>
                        <th class='w3-border'>Message</th>
                        <th class='w3-border'>Liens</th>
                    </tr>
                </thead>
                <tbody>";
        if(isset($db)) {
            require 'files/others/class_class.php';
            $query = $db->prepare("SELECT categories.categorie, categories.id, contenu FROM utilisateurs JOIN publications ON utilisateurs.id = publications.auteur JOIN categories ON publications.categorie = categories.id GROUP BY categories.categorie, categories.id, publications.contenu ORDER BY categories.categorie");
            $query->execute();
            $query->setFetchMode(PDO::FETCH_CLASS, 'deuxieme');
            while ($content = $query->fetch()) {
                echo "
                    <tr class='w3-border'>
                         <td class='w3-container w3-border'>".$content->categorie."</td>
                         <td class='w3-container w3-border' style='width: auto'>".$content->contenu."</td>
                         <td class='w3-container w3-border' style='width: auto'>
                            <form method='get' action='" . htmlspecialchars($_SERVER['PHP_SELF']) . "'>
                                <button class='w3-button w3-theme w3-round-xlarge w3-hover-dark-grey' type='submit' name='idc' value='$content->id'> Lien vers la catégorie</button>
                            </form>
                        </td>
                    </tr>";
            }
        } echo "
        
                <tr class='w3-border'>
                    <td class='w3-container w3-border' colspan='3'>
                        <a href='".htmlspecialchars($_SERVER['PHP_SELF'])."'>
                            <button class='w3-button w3-theme w3-round-xlarge w3-hover-dark-grey'><i class='fa fa-reply'></i> Retour page accueil</button>
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
        </div>
    </div>";
    }
?>
<script type='text/javascript' src='assets/scripts/search.js'></script>


