<?php
try {
    define('TYPE', 'pgsql');
    define('HOST', 'localhost');
    define('BDD', 'etd');
    define('USER', 'uapv2001983');
    define('PASSWD', '******');

    $db = new PDO(TYPE . ':host=' . HOST . ';dbname=' . BDD, USER, PASSWD);
    $db->exec("SET CHARACTER SET utf8");

} catch (PDOException $e) {
    echo "Erreur : \n" . $e->getMessage();
}

?>
