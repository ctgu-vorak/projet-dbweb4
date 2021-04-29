<?php
    // Traitement du module de connexion
    require 'files/others/db_connect.php';
    if(isset($db)) {
        if(isset($_POST['pseudo_pseudo'], $_POST['id_pseudo'])) {
            require 'files/others/class_class.php';
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
    }
?>

<!doctype html>
<html lang="fr">
<head>
<?php
require 'files/pages/head.html';
?>
</head>
<body>
<div>

<?php
    // Traitement page d'accueil
    if (isset($_GET['page_content'])) {
        switch ($_GET['page_content']) {
            case "user_list":
                include("files/pages/utilisateurs.php");
                break;
            case "publications":
                include("files/pages/publications.php");
                break;
            default:
                echo "<meta http-equiv='refresh' content='0;URL=index.php'>";
                break;
        }
    }
    elseif(isset($_GET['idc'])) {
        $catLimitQuery = $db->query('SELECT min(id), max(id) FROM categories');
        $catLimit = $catLimitQuery->fetch(PDO::FETCH_ASSOC);

        if($_GET['idc'] >= $catLimit['min'] && $_GET['idc'] <= $catLimit['max'])
            include("files/pages/publicationsCategories.php");
        else
            echo "<meta http-equiv='refresh' content='0;URL=index.php?page_content=publications'>";
    }

    elseif (isset($_GET['idp'])) {
        $userLimitQuery = $db->query('SELECT min(id), max(id) FROM utilisateurs');
        $userLimit = $userLimitQuery->fetch(PDO::FETCH_ASSOC);

        if($_GET['idp'] >= $userLimit['min'] && $_GET['idp'] <= $userLimit['max'])
            include("files/pages/profil.php");
        else
            echo "<meta http-equiv='refresh' content='0;URL=index.php?page_content=user_list'>";
    }
    else {
        include("files/pages/accueil.php");
    }


    // Traitement des publications
    if(isset($db)) {
        // Traitement de l'ajout
        if(isset($_POST['pseudo'], $_POST['content'], $_POST['categorie'])) {
            $pseudo = $_POST['pseudo'];
            $content = $_POST['content'];
            $cat = $_POST['categorie'];

            // Trouver l'auteur de la publication
            $find_author = $db->prepare("SELECT id FROM utilisateurs WHERE pseudo = ?")->execute(array($pseudo));
            $auteur = $find_author->fetchAll(PDO::FETCH_COLUMN,0);

            // Trouver la catégorie de la publication
            $find_categorie = $db->prepare("SELECT id FROM categories WHERE categorie = ?")->execute(array($cat));
            $categorie = $find_categorie->fetchAll(PDO::FETCH_COLUMN,0);

            // Executer la requête d'insertion
            $prepare_query = $db->prepare("INSERT INTO publications (contenu, auteur, categorie) VALUES (?,?,?)")->execute(array($content,(int)$auteur[0],(int)$categorie[0]));
            header("Location: https://pedago.univ-avignon.fr/~uapv2001983/projet-dbweb4/index.php?page_content=publications");
        }

        // Traitement de la modification
        if(isset($_POST['mod_pseudo'], $_POST['mod_content'], $_POST['mod_id_pub'] ,$_POST['mod_categorie'])) {
            $m_pseudo = $_POST['mod_pseudo'];
            $m_content = $_POST['mod_content'];
            $m_id_pub = $_POST['mod_id_pub'];
            $m_categorie = $_POST['mod_categorie'];

            // Trouver la catégorie de la publication
            $find_categorie = $db->prepare("SELECT id FROM categories WHERE categorie = ?");
            $find_categorie->execute(array($m_categorie));
            (int)$f_categorie = $find_categorie->fetchAll(PDO::FETCH_COLUMN,0);

            $update_pub = $db->prepare("UPDATE publications SET contenu = ?, categorie = ? WHERE id = ?")->execute(array($m_content, $f_categorie[0], (int)$m_id_pub));

            $url = "https://pedago.univ-avignon.fr/~uapv2001983/projet-dbweb4/index.php?idp=".$_SESSION['id'];
            echo "<script>alert('Publication mise à jour.');</script><meta http-equiv='refresh' content='0;URL={$url}'>";
        }

        // Traitement des votes
        if(isset($_POST['notes_pub'])) {
            $url = "https://pedago.univ-avignon.fr/~uapv2001983/projet-dbweb4/index.php?page_content=user_list";
            $sql = "SELECT utilisateur, publication FROM votes WHERE utilisateur = {$_SESSION['id']} AND publication = {$_POST['notes_pub']} ORDER BY publication ASC";
            $var = $db->query($sql);
            $var->setFetchMode(PDO::FETCH_CLASS, 'troisieme');

            if($var->fetch()) {
                echo "<script>alert(\"Vous avez déjà voté pour cette publication.\")</script>";
                echo "<meta http-equiv='refresh' content='0;URL={$url}'>";
            } else {
                $insert_id = (int) $_SESSION['id'];
                $insert_pub = (int) $_POST['notes_pub'];
                $prepare = $db->prepare("INSERT INTO votes (utilisateur, publication) VALUES (?,?)")->execute(array($insert_id, $insert_pub));
                echo "<meta http-equiv='refresh' content='0;URL={$url}'>";
            }
        }
        
    }

?>
    <!--<br /><br />
    <div id="footer" class="w3-center w3-row w3-theme-l2 w3-round-large w3-margin">
        <p>
            <b>Alphidi</b> est un réseau social à but non lucratif.<br />
            Si ce site ne vous donne pas entière satisfaction, merci de le signaler <a href='mailto:contact@alphidi.fr' target='_top'>ici</a>.<br />
            Société : <b>Alphidi</b> | <b>C.A :</b> 45 024 187,76€ (2020)<br>
            Toutes les images utilisées sur ce site sont libres de droit ou créées par le WebDesigner du site |
            &copy; Tout droits réservés - 2021
        </p>
    </div>-->
</body>
</html>
<!-- © Site imaginé et créé par Clément GUIMONNEAU (alias kaarov) pour le module DBWEB4 - Architecture Web et Bases de données de l'Université d'Avignon-->