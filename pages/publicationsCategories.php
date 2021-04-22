<?php

if(isset($db)) {
    if(!empty($_GET['id_cat'])) {
        require 'others_files/class_class.php';
        $query = $db->query("SELECT categories.categorie, categories.id, contenu FROM utilisateurs JOIN publications ON utilisateurs.id = publications.auteur JOIN categories ON publications.categorie = categories.id WHERE categories.id = ".$_GET['id_cat']);
        $stmt = $query->execute();
        $query->setFetchMode(PDO::FETCH_CLASS, 'publications_class');
        while ($content = $query->fetch()) {
            echo "
<div class='w3-container w3-padding w3-center'>
    <table class='w3-border w3-table-all w3-centered'>
        <thead>
        <tr class='w3-border'>
            <th colspan='2'>Publications dans ".$content->categorie."</th>
        </tr>
        </thead>
        <tbody>
            <tr class='w3-border'>
                <td class='w3-container w3-border' style='width: auto'>".$content->contenu."</td>
            </tr>
        </tbody>
    </table>
</div>
            
            ";
        }
    }
}

?>

