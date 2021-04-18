<!doctype html>
<html lang="fr">
<head>
<?php require 'pages/head.html'; ?>
</head>
<body>

<?php
try {
    define('TYPE', 'pgsql');
    define('HOST', 'localhost');
    define('BDD', 'etd');
    define('USER', 'uapv2001983');
    define('PASSWD', 'QCm8qv');

    $db = new PDO(TYPE . ':host=' . HOST . ';dbname=' . BDD, USER, PASSWD);
    $db->exec("SET CHARACTER SET utf8");

    if (isset($_GET['id'])) {
        include("pages/profil.php");
    } else {
        include("pages/utilisateurs.php");
        //include("pages/publications.php");
    }

} catch (PDOException $e) {
    echo "Erreur : \n" . $e->getMessage();
}

?>

</body>

</html>