<?php

class users_class {
    public $id, $pseudo, $auteur;

    public function __construct() {
        $this->id;
        $this->pseudo;
        $this->auteur;
    }
}

class publications_class
{
    public $contenu, $id, $categorie, $auteur;

    public function __construct() {
        $this->categorie; $this->id; $this->contenu; $this->auteur;
    }
}

class profil_class
{
    public $categorie, $pseudo , $contenu, $id;

    public function __construct() {
        $this->categorie; $this->pseudo; $this->contenu; $this->id;
    }
}

class votes_class
{
    public $pseudo, $publication;

    public function __construct() {
        $this->pseudo; $this->publication;
    }
}

?>