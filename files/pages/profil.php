<?php
    session_start();
    $link = htmlspecialchars($_SERVER['PHP_SELF'])."?page_content=user_list";
    if(isset($_SESSION['pseudo'])) {
        echo "
        <div>";
            require 'files/pages/navbar.php';
            echo"
        </div>
        <div class='w3-padding'>
        <table class='w3-border w3-table-all w3-centered'>
            <thead>
                <tr class='w3-border'>
                    <th class='w3-container w3-border' id='pub' colspan='4'>Publications</th>
                </tr>
                <tr class='w3-border'>
                    <th class='w3-container w3-border'>Catégories</th>
                    <th class='w3-container w3-border'>Contenu</th>
                    <th class='w3-container w3-border notes'>Qui a aimé ?</th>
                    <th class='w3-border'>Vote</th>
                </tr>
            </thead>";
            if(isset($db)) {
                require 'files/others/class_class.php';
                $cat_cont = $db->query("SELECT categories.categorie, pseudo , contenu, publications.id FROM utilisateurs JOIN publications ON utilisateurs.id = publications.auteur JOIN categories ON publications.categorie = categories.id WHERE utilisateurs.id = ".$_GET['idp']." GROUP BY categories.categorie, utilisateurs.pseudo, publications.contenu, publications.id");
                $cat_cont->setFetchMode(PDO::FETCH_CLASS, 'troisieme');
                while($content = $cat_cont->fetch()) {
                    echo "
                    <tr class='w3-border'>
                        <td class='w3-container w3-border'>" . $content->categorie . "</td>
                        <form method='post' action='" . htmlspecialchars($_SERVER['PHP_SELF']) . "'>
                        
                        <td class='w3-container w3-border content'>" . $content->contenu . "<input type='hidden' name='notes_pub' value='{$content->id}' /></td>
                        <td class='w3-container w3-border notes'>";
                        $user_like = $db->query("SELECT pseudo, publication FROM votes JOIN utilisateurs u ON votes.utilisateur = u.id JOIN publications p ON p.id = votes.publication WHERE p.id = votes.publication GROUP BY publication, votes.utilisateur, pseudo ORDER BY publication");
                        $user_like->setFetchMode(PDO::FETCH_CLASS, 'troisieme');
                        while($content_like = $user_like->fetch()) {
                            if ($content->id == $content_like->publication) {
                                echo $content_like->pseudo . "<br />";
                            }
                        }
                        echo "</td>
                            <td class='w3-container w3-border'>
                                <button class='w3-button w3-theme w3-round-xlarge w3-hover-dark-grey' type='submit'><i class='fa fa-thumbs-o-up'></i></button>
                            </td>
                            </form>
                        </tr>";
                }
                echo "  
                        <tr class='w3-border'>
                            <td class='w3-container w3-border' colspan=2' id='return'>
                                <a class='w3-button w3-theme w3-round-xlarge w3-hover-dark-grey' style='text-decoration: none' target='_self' href='$link'><i class='fa fa-reply'></i> Retour à la page des utilisateurs</a>
                            </td>
                            <td class='w3-container w3-border' id='hide_show' colspan='2'>
                                <button class='w3-button w3-theme w3-round-xlarge w3-hover-dark-grey' id='hide_show_column'>Cacher les votes</button>
                            </td>
                        </tr>
                        <tr class='w3-border'>
                            <td class='w3-container w3-border' colspan='4' id='accueil'>
                                <a href='index.php' class='w3-button w3-theme w3-round-xlarge w3-hover-dark-grey'><i class='fa fa-reply'></i> Retour page d'accueil</a>
                            </td>
                        </tr>
                    ";
                }
                echo "
            </div>
            </table>
        </div>";

    }
    else {
        echo "
        <div>";
        require 'files/pages/navbar.php';
        echo"
        </div>
        <div class='w3-padding'>
        <table class='w3-border w3-table-all w3-centered'>
            <thead>
                <tr class='w3-border'>
                    <th class='w3-container w3-border' id='pub' colspan='3'>Publications</th>
                </tr>
                <tr class='w3-border'>
                    <th class='w3-container w3-border'>Catégories</th>
                    <th class='w3-container w3-border'>Contenu</th>
                    <th class='w3-container w3-border notes'>Qui a aimé ?</th>
                </tr>
            </thead>";
        if(isset($db)) {
            require 'files/others/class_class.php';
            $cat_cont = $db->query("SELECT categories.categorie, pseudo , contenu, publications.id FROM utilisateurs JOIN publications ON utilisateurs.id = publications.auteur JOIN categories ON publications.categorie = categories.id WHERE utilisateurs.id = ".$_GET['idp']." GROUP BY categories.categorie, utilisateurs.pseudo, publications.contenu, publications.id");
            $cat_cont->setFetchMode(PDO::FETCH_CLASS, 'troisieme');

            while($content = $cat_cont->fetch()) {
                echo "
                    <tr class='w3-border'>
                        <td class='w3-container w3-border'>" . $content->categorie . "</td>
                        <td class='w3-container w3-border content'>" . $content->contenu . "</td>
                        <td class='w3-container w3-border notes'>";
                $user_like = $db->query("SELECT pseudo, publication FROM votes JOIN utilisateurs u ON votes.utilisateur = u.id JOIN publications p ON p.id = votes.publication WHERE p.id = votes.publication GROUP BY publication, votes.utilisateur, pseudo ORDER BY publication");
                $user_like->setFetchMode(PDO::FETCH_CLASS, 'troisieme');
                while($content_like = $user_like->fetch()) {
                    if ($content->id == $content_like->publication) {
                        echo $content_like->pseudo . "<br />";
                    }
                }
                echo "</td>
                </tr>";
            }
            echo "  
                        <tr class='w3-border'>
                            <td class='w3-container w3-border' colspan=2' id='return'>
                                <a class='w3-button w3-theme w3-round-xlarge w3-hover-dark-grey' style='text-decoration: none' target='_self' href='$link'><i class='fa fa-reply'></i> Retour à la page des utilisateurs</a>
                            </td>
                            <td class='w3-container w3-border' id='hide_show'>
                                <button class='w3-button w3-theme w3-round-xlarge w3-hover-dark-grey' id='hide_show_column'>Cacher les votes</button>
                            </td>
                        </tr>
                        <tr class='w3-border'>
                            <td class='w3-container w3-border' colspan='4' id='accueil'>
                                <a href='index.php' class='w3-button w3-theme w3-round-xlarge w3-hover-dark-grey'><i class='fa fa-reply'></i> Retour page d'accueil</a>
                            </td>
                        </tr>
                    ";
        }
        echo "
            </div>
            </table>
        </div>";
    }
?>
<script type='text/javascript' src='assets/scripts/user_profile.js'></script>






