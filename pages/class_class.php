<?php

class users_class {
    public $id, $pseudo;

    public function __construct() {
        $this->id;
        $this->pseudo;
    }
}

class publications_class
{
    public $contenu, $categorie;

    public function __construct() {
        $this->categorie; $this->contenu;
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