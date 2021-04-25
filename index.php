<?php
    // Traitement du module de connexion
    require 'others_files/db_connect.php';
    if(isset($_POST['pseudo_pseudo']) && isset($_POST['id_pseudo']) && isset($db)) {
        require 'others_files/class_class.php';
        $conn_pseudo = $_POST['pseudo_pseudo'];
        $conn_id = (int)$_POST['id_pseudo'];
        $query = $db->prepare("SELECT id, pseudo FROM utilisateurs WHERE id = ? AND pseudo = ?");
        $query->execute(array($conn_id, $conn_pseudo));
        $rslt = $query->fetchAll();
        if(count($rslt) <= 0) {
            echo "<script>alert('Pseudo ou ID incorrect. Retentez votre chance.')</script>";
            header("Refresh:0");
        } else {
            session_start();
            $_SESSION['pseudo'] = $rslt[0]['pseudo'];
            $_SESSION['id'] = $rslt[0]['id'];
            header("Refresh:0");
            session_write_close();
        }
    }

    // Traitement du module de déconnexion
    if(isset($_POST['deconnexion'])) {
        session_start();
        if(isset($_SESSION)) {
            unset($_SESSION['pseudo']);
            unset($_SESSION['id']);
            session_destroy();
            header('Location: index.php');
            exit;
        }
        session_abort();
    }

?>

<!doctype html>
<html lang="fr">
<head>
<?php
require 'files/head.html';
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
                    include("files/utilisateurs.php");
                    break;
                case "publications":
                    include("files/publications.php");
                    break;
            }
        }
    }
    elseif(isset($_GET['idc'])) {
        include("files/publicationsCategories.php");
    }
    elseif (isset($_GET['idp'])) {
        include("files/profil.php");
    }
    else {
        include("files/accueil.php");
    }

    // Traitement ajout
    if(isset($db)) {
        if( isset($_POST['pseudo']) && isset($_POST['content']) && isset($_POST['categorie'])) {
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
        }
    }



?>

</body>

</html>