<?php

class premiere {
    public $id, $auteur, $pseudo;

    public function __construct()
    {
        $this->id;
        $this->auteur;
        $this->pseudo;
    }

}

class deuxieme extends premiere {
    public $categorie, $contenu;

    public function __construct()
    {
        $this->categorie;
        $this->contenu;
    }

}

class troisieme extends deuxieme {
    public $publication, $utilisateur;

    public function __construct()
    {
        $this->publication;
        $this->utilisateur;
    }

}

?>