<div class='w3-container w3-padding w3-center'>
    <!--
    TODO : proposer un système de votes : idem que dans publicationsCategories.php
    -->
    <table class='w3-border w3-table-all w3-centered'>
        <thead>
            <tr class='w3-border'>
                <th colspan='2'>Publications</th>
            </tr>
        </thead>
        <tbody>

        <?php

        if(isset($db)) {
            if(!empty($_GET['id_cat'])) {
                require 'others_files/class_class.php';
                $query = $db->query("SELECT categories.categorie, categories.id, contenu FROM utilisateurs JOIN publications ON utilisateurs.id = publications.auteur JOIN categories ON publications.categorie = categories.id WHERE categories.id = ".$_GET['id_cat']);
                $stmt = $query->execute();
                $query->setFetchMode(PDO::FETCH_CLASS, 'publications_class');
                while ($content = $query->fetch()) {
                echo "
                <tr class='w3-border'>
                    <td class='w3-container w3-border' style='width: auto'>".$content->contenu."</td>
                </tr>";
                }
            }
        }

?>
            <tr class='w3-border'>
                <td class='w3-container w3-border' colspan="2">
                    <a href="index.php">
                        <button class="w3-button w3-deep-purple w3-round-xlarge w3-hover-purple"><i class="fa fa-reply"></i> Retour page accueil</button>
                    </a>
                </td>
            </tr>
            <tr class='w3-border'>
                <td class='w3-container w3-border' colspan="2">
                    <a href="index.php">
                        <button class="w3-button w3-deep-purple w3-round-xlarge w3-hover-purple"><i class="fa fa-reply"></i> Retour page accueil</button>
                    </a>
                </td>
            </tr>
        </tbody>
    </table>
</div>
