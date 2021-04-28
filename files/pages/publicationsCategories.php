<div>
    <!--
    TODO : proposer un système de votes : idem que dans publicationsCategories.php
    -->
    <div>
        <?php require 'files/pages/navbar.php'; ?>
    </div>
    <div class='w3-container w3-padding w3-center'>
        <table class='w3-border w3-table-all w3-centered'>
        <thead>
            <tr class='w3-border'>
                <th colspan='2'>Publications</th>
            </tr>
        </thead>
        <tbody>

        <?php

        if(isset($db)) {
            if(!empty($_GET['idc'])) {
                require 'files/others/class_class.php';
                $query = $db->prepare("SELECT categories.categorie, categories.id, contenu FROM utilisateurs JOIN publications ON utilisateurs.id = publications.auteur JOIN categories ON publications.categorie = categories.id WHERE categories.id = ".$_GET['idc']);
                $stmt = $query->execute();
                $query->setFetchMode(PDO::FETCH_CLASS, 'publications_class');
                while ($content = $query->fetch()) {
                echo "
                <tr class='w3-border'>
                    <td class='w3-container w3-border' style='width: auto' colspan='2'>".$content->contenu."</td>
                </tr>";
                }
            }
        }


        $link = htmlspecialchars($_SERVER['PHP_SELF'])."?page_content=publications";
        echo "<tr class='w3-border'>
                <td class='w3-container w3-border'>
                    <a href='$link' class='w3-button w3-theme w3-round-xlarge w3-hover-dark-grey'>
                        <i class='fa fa-reply'></i> Retour liste catégorie
                    </a>
                </td>
                <td class='w3-container w3-border'>
                    <a href='index.php' class='w3-button w3-theme w3-round-xlarge w3-hover-dark-grey'>
                       <i class='fa fa-reply'></i> Retour page accueil
                    </a>
                </td>
            </tr>"
?>
        </tbody>
    </table>
    </div>
</div>
