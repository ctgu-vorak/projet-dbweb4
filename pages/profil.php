<?php
/*
if (isset($db)) {
    $requete = $db->prepare("SELECT categories.categorie, pseudo , contenu, publications.id FROM utilisateurs JOIN publications ON utilisateurs.id = publications.auteur JOIN categories ON publications.categorie = categories.id WHERE utilisateurs.id = ? GROUP BY categories.categorie, utilisateurs.pseudo, publications.contenu, publications.id");
    $requete->execute(array($_GET['id']));
    $stmt = $requete->fetchAll();
    // ------------------------------
    $column = $db->query("SELECT pseudo, publication FROM votes JOIN utilisateurs u ON votes.utilisateur = u.id JOIN publications p ON p.id = votes.publication WHERE p.id = votes.publication GROUP BY publication, votes.utilisateur, pseudo ORDER BY publication");
    $column->execute();
    $rslt = $column->fetchAll();
}*/
?>
<div class="w3-container w3-padding w3-center">
    <table class="w3-border w3-table-all w3-centered">
        <thead>
        <tr class='w3-border'>
            <th class='w3-container w3-border' id="pub" colspan="3">Publications</th>
        </tr>

        <?php
        echo "<tr class='w3-border'>";
            echo "
                    <tr class='w3-border'>
                        <th class='w3-container w3-border'>Catégories</th>
                        <th class='w3-container w3-border'>Contenu</th>
                        <th class='w3-container w3-border notes'>Qui a aimé ?</th>
                    </tr>
                </thead>";

            if(isset($db)) {
                require 'class_class.php';
                $cat_cont = $db->query("SELECT categories.categorie, pseudo , contenu, publications.id FROM utilisateurs JOIN publications ON utilisateurs.id = publications.auteur JOIN categories ON publications.categorie = categories.id WHERE utilisateurs.id = ".$_GET['id']." GROUP BY categories.categorie, utilisateurs.pseudo, publications.contenu, publications.id");
                $cat_cont->setFetchMode(PDO::FETCH_CLASS, 'profil_class');
                while($content = $cat_cont->fetch()) {
                    echo "
                <tr class='w3-border'>
                    <td class='w3-container w3-border'>" . $content->categorie . "</td>
                    <td class='w3-container w3-border content'>" . $content->contenu . "</td>
                    <td class='w3-container w3-border notes'>";

                    $user_like = $db->query("SELECT pseudo, publication FROM votes JOIN utilisateurs u ON votes.utilisateur = u.id JOIN publications p ON p.id = votes.publication WHERE p.id = votes.publication GROUP BY publication, votes.utilisateur, pseudo ORDER BY publication");
                    $user_like->setFetchMode(PDO::FETCH_CLASS, 'votes_class');
                    while($content_like = $user_like->fetch()) {
                        if ($content->id == $content_like->publication) {
                            echo $content_like->pseudo . "<br />";
                        }
                    }
                    echo "</td>
                </tr>";
                }
            }



            echo "
                <tr>
                    <td colspan='2' id='return'>
                        <a class='w3-button w3-deep-purple w3-round-xlarge w3-hover-purple' style='text-decoration: none' target='_self' href='" . htmlspecialchars($_SERVER['PHP_SELF']) . "'>Retour à la page des utilisateurs</a>
                    </td>
                    <td id='hide_show'>
                        <button class='w3-button w3-deep-purple w3-round-xlarge w3-hover-purple' id='hide_show_column'>Cacher les votes</button>
                    </td>
                </tr>";



        ?>

    </table>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#hide_show_column").click(function () {
                $(".notes").toggle();
                if ($(".notes").css('display') === 'none') {
                    $("#hide_show_column").html("Afficher les votes");
                    $("#pub").attr("colspan", "2");
                    $("#return").attr("colspan", "1");
                } else {
                    $("#hide_show_column").html("Cacher les votes");
                    $("#pub").attr("colspan", "3");
                    $("#return").attr("colspan", "2");
                }
            });
            $('.content').hover(function () {
                $(this).animate({'zoom': 1.25}, 25);
            }, function () {
                $(this).animate({'zoom': 1}, 25);
            });
        });
    </script>
</div>

<!--
if (count($stmt) > 0) {}
else {
            echo "
                <tr class='w3-border'>
                    <td class='w3-container w3-border' colspan='3'> <strong>Aucune publication </strong> </td>
                </tr>
                <tr>
                    <td colspan='2' id='return'>
                        <a class='w3-button w3-deep-purple w3-round-xlarge w3-hover-purple' style='text-decoration: none' target='_self' href='" . htmlspecialchars($_SERVER['PHP_SELF']) . "'>Retour à la page des utilisateurs</a>
                    </td>
                </tr>";

                <script type="text/javascript">
        $(document).ready(function () {



            });
        });
    </script>
        }


        -->