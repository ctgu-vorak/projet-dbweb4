<div class="w3-container w3-padding w3-center">
    <table class="w3-border w3-table-all w3-centered">
        <thead>
        <tr class='w3-border'>
            <th colspan='2'>Publications</th>
        </tr>
        <tr class='w3-border'>
            <th class='w3-border'>Catégories</th>
            <th class='w3-border'>Message</th>
        </tr>
        </thead>
        <?php
        if(isset($db)) {
            require 'classes/publications_class.php';
            $query = $db->query("SELECT categories.categorie, contenu FROM utilisateurs JOIN publications ON utilisateurs.id = publications.auteur JOIN categories ON publications.categorie = categories.id GROUP BY categories.categorie, publications.contenu ORDER BY categories.categorie");
            $query->setFetchMode(PDO::FETCH_CLASS, 'publications_class');
            while ($content = $query->fetch()) {
                echo "
            <tr class='w3-border'>
                 <td class='w3-container w3-border'>".$content->categorie."</td>
                 <td class='w3-container w3-border' style='width: auto'>".$content->contenu."</td>
            </tr>";
            }
        }
        ?>
    </table>
</div>