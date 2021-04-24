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

?>

</body>

</html>