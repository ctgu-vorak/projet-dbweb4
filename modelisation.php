<?php


abstract class utilisateurs
{
    private int $id_uti;
    private string $pseudo;
    private int $date_naissance;
}

class categories
{
    private int $id_cat;
    private string $categorie;
}

class publications
{
    private int $id_pub;
    private string $contenu;
    private int $id_uti;
    private int $id_cat;
}

class votes
{
    private int $id_vot;
    private int $id_uti;
    private int $id_pub;
}

?>