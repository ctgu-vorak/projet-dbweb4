<?php
    if(isset($db)) {
        $requete = $db->prepare("SELECT categories.categorie, pseudo , contenu, publications.id FROM utilisateurs JOIN publications ON utilisateurs.id = publications.auteur JOIN categories ON publications.categorie = categories.id WHERE utilisateurs.id = ? GROUP BY categories.categorie, utilisateurs.pseudo, publications.contenu, publications.id");
        $requete->execute(array($_GET['id']));
        $stmt = $requete->fetchAll();
        // ------------------------------
        $column = $db->prepare("SELECT pseudo, publication FROM votes JOIN utilisateurs u ON votes.utilisateur = u.id JOIN publications p ON p.id = votes.publication WHERE p.id = votes.publication GROUP BY publication, votes.utilisateur, pseudo ORDER BY publication");
        $column->execute();
        $rslt = $column->fetchAll();
    }
?>
    <div class="w3-container w3-padding w3-center">
            <table class="w3-border w3-table-all w3-centered">
                <thead>
                    <tr class='w3-border' >
                        <th class='w3-container w3-border' id="pub" colspan="3">Publications</th>
                    </tr>

                <?php
                    echo "<tr class='w3-border'>";

                    if(count($stmt) > 0) {
                        echo "
                    <tr class='w3-border'>
                        <th class='w3-container w3-border'>Catégories</th>
                        <th class='w3-container w3-border'>Contenu</th>
                        <th class='w3-container w3-border notes'>Qui a aimé ?</th>
                    </tr>
                </thead>";

                        foreach($stmt as $key) {
                            echo "
                <tr class='w3-border'>
                    <td class='w3-container w3-border'>" . $key['categorie'] . "</td>
                    <td class='w3-container w3-border'>" . $key['contenu'] . "</td>
                    <td class='w3-container w3-border notes'>";

                            foreach ($rslt as $pub_key) {
                                if ($key['id'] == $pub_key['publication']) {
                                    echo $pub_key['pseudo']."<br />";
                                }
                            }
                            echo "</td>
                </tr>";
                        }


                        echo "
                <tr>
                    <td colspan='2' id='return'>
                        <a class='w3-button w3-deep-purple w3-round-xlarge w3-hover-purple' style='text-decoration: none' target='_self' href='".htmlspecialchars($_SERVER['PHP_SELF'])."'>Retour à la page des utilisateurs</a>
                    </td>
                    <td id='hide_show'>
                        <button class='w3-button w3-deep-purple w3-round-xlarge w3-hover-purple' id='hide_show_column'>Cacher les votes</button>
                    </td>
                </tr>";

                    } else {
                        echo "
                <tr class='w3-border'>
                    <td class='w3-container w3-border' colspan='3'> <strong>Aucune publication </strong> </td>
                </tr>
                <tr>
                    <td colspan='2' id='return'>
                        <a class='w3-button w3-deep-purple w3-round-xlarge w3-hover-purple' style='text-decoration: none' target='_self' href='".htmlspecialchars($_SERVER['PHP_SELF'])."'>Retour à la page des utilisateurs</a>
                    </td>
                </tr>";
                    }

                    ?>

            </table>
            <script src="assets/scripts/jquery_script.js" type="text/javascript"></script>
        </div>