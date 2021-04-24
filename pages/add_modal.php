<?php
// Traitement formulaire d'ajout à la BDD
if(isset($db)) {
    if( isset($_POST['pseudo']) || isset($_POST['content']) || isset($_POST['categorie'])) {
        $pseudo = $_POST['pseudo']; $contenu = strtolower($_POST['content']); $cat = $_POST['categorie'];

        // Trouver l'auteur de la publication
        $find_author = $db->prepare("SELECT id FROM utilisateur WHERE pseudo = ?");
        $find_author->execute(array($pseudo));
        $auteur = $find_author->fetchAll();

        // Trouver la catégorie de la publication
        $find_categorie = $db->prepare("SELECT id FROM categories WHERE categorie = ?");
        $find_categorie->execute(array($cat));
        $categorie = $find_categorie->fetchAll();

        /* Executer la requête d'insertion
        $query_string = "INSERT INTO publication (contenu, auteur, categorie) VALUES (?,?,?)";
        $prepare_query = $db->prepare($query_string);
        $prepare_query->execute([$contenu, $auteur, $categorie]);*/

        // ------------------------

        $sql = "INSERT INTO 'publications' ('contenu', 'auteur', 'categorie') VALUES (:contenu, :auteur, :categorie)";
        $res = $db->prepare($sql);
        $exec = $res->execute(array(":contenu"=>$contenu,":auteur"=>$auteur, ":categorie"=>$categorie));
        if($exec){
            echo 'Données insérées';
        }else{
            echo "Échec de l'opération d'insertion";
        }

        // ------------------------


        //header("Location: https://pedago.univ-avignon.fr/~uapv2001983/projet-dbweb4/index.php?page_content=publications");
    }
}
?>

<button id="open_modal" class="w3-button w3-deep-purple w3-round-xlarge w3-hover-purple">
    Ajout
</button>

<div id="modalBox" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">

        <header class="w3-container w3-deep-purple">
            <span class="close_modal w3-button w3-xlarge w3-display-topright w3-hover-purple"
                  title="Fermer">&times;</span>
            <h2>Editeur de publication</h2>
        </header>

        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
            <div class="w3-margin">
                <label><b>Pseudo</b></label>
                <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Pseudo" name="pseudo" maxlength="45" required/>

                <label><b>Publication</b></label>
                <textarea class="w3-input w3-border w3-margin-bottom" name="content" placeholder="Contenu publication" maxlength="250" rows="auto" cols="auto" required></textarea>

                <p><b>Catégorie</b></p>


                <table style="width: auto">
                    <tr>
                        <td class="w3-left w3-white">
                            <input type="radio" name="categorie" value="divers" required/>
                            <label>Divers</label><br>
                        </td>
                    </tr>
                    <tr>
                        <td class="w3-left w3-white">
                            <input type="radio" name="categorie" value="news" required/>
                            <label>News</label><br>
                        </td>
                    </tr>
                    <tr>
                        <td class="w3-left w3-white">
                            <input type="radio" name="categorie" value="sport" required/>
                            <label>Sport</label><br>
                        </td>
                    </tr>
                    <tr>
                        <td class="w3-left w3-white">
                            <input type="radio" name="categorie" value="citation" required/>
                            <label>Citation</label><br>
                        </td>
                    </tr>
                </table>

                <div>
                    <table class="w3-table w3-all-centered">
                        <tr style="height: auto">
                            <th>
                                <button class="w3-button w3-round w3-block w3-green w3-section w3-hover-green"
                                        type="submit">Ajouter
                                </button>
                            </th>
                            <th>
                                <button class="w3-button w3-round w3-block w3-red w3-section w3-hover-red">Recommencer</button>
                            </th>
                        </tr>
                    </table>
                </div>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript" src="assets/scripts/modal.js"></script>
