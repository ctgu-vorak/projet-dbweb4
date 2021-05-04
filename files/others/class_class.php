<?php

class premiere {
    public $id, $auteur, $pseudo;

    public function __construct()
    {
        $this->id;
        $this->auteur;
        $this->pseudo;
    }

    public function __toString()
    {
        return "<a>".print_r($this, True)."</a>";
    }

}

class deuxieme extends premiere {
    public $categorie, $contenu;

    public function __construct()
    {
        $this->categorie;
        $this->contenu;
    }

    public function __toString()
    {
        return "<a>".print_r($this, True)."</a>";
    }
}

class troisieme extends deuxieme {
    public $publication, $utilisateur;

    public function __construct()
    {
        $this->publication;
        $this->utilisateur;
    }

    public function __toString()
    {
        return "<a>".print_r($this, True)."</a>";
    }
}

?>