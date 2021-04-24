<!doctype html>
<html lang="fr">
<head>
<?php
require 'pages/head.html';
require 'others_files/db_connect.php';
?>
</head>
<body>

<?php
    // Traitement page d'accueil
    if (isset($_GET['page_content'])) {
        $submit = $_GET['page_content'];
        if($submit == 'user_list' || $submit == 'publications') {
            switch ($submit) {
                case "user_list":
                    include("pages/utilisateurs.php");
                    break;
                case "publications":
                    include("pages/publications.php");
                    break;
            }
        }
    }
    elseif(isset($_GET['idc'])) {
        include("pages/publicationsCategories.php");
    }
    elseif (isset($_GET['idp'])) {
        include("pages/profil.php");
    }
    else {
        include("pages/accueil.html");
    }

    if(isset($db)) {
        if( isset($_POST['pseudo']) || isset($_POST['content']) || isset($_POST['categorie'])) {
            $pseudo = $_POST['pseudo'];
            $content = $_POST['content'];
            $cat = $_POST['categorie'];

        // Trouver l'auteur de la publication
            $find_author = $db->prepare("SELECT id FROM utilisateurs WHERE pseudo = ?");
            $find_author->execute(array($pseudo));
            $auteur = $find_author->fetchAll(PDO::FETCH_COLUMN,0);

        // Trouver la catégorie de la publication
            $find_categorie = $db->prepare("SELECT id FROM categories WHERE categorie = ?");
            $find_categorie->execute(array($cat));
            $categorie = $find_categorie->fetchAll(PDO::FETCH_COLUMN,0);

            // Executer la requête d'insertion
            $prepare_query = $db->prepare("INSERT INTO publications (contenu, auteur, categorie) VALUES (?,?,?)")->execute(array($content,(int)$auteur[0],(int)$categorie[0]));
            header("Location: https://pedago.univ-avignon.fr/~uapv2001983/projet-dbweb4/index.php?page_content=publications");
        // -----------------------
            /*

                $sql = "INSERT INTO publications (contenu, auteur, categorie) VALUES (?,?,?)";
                /*$result = $db->prepare($sql);
                $result->execute(array($content), $auteur, $categorie);
            echo "Contenu : <br>";
            print_r($content);
            echo "<br\><br\><br><br>";

            echo "Auteur : <br>";
            print_r((int)$auteur[0]);
            echo "<br\><br\><br><br>";

            echo "Categorie : <br>";
            print_r((int)$categorie[0]);*/
        }
    }



?>

</body>

</html>