<?php

class users_class
{
    public $id, $pseudo, $auteur;

    public function __construct()
    {
        $this->id;
        $this->pseudo;
        $this->auteur;
    }

    public function __toString()
    {
        $a = 'str';
        // TODO: Implement __toString() method.
        return $a;
    }
}

class publications_class
{
    public $contenu, $id, $categorie, $auteur;

    public function __construct()
    {
        $this->categorie;
        $this->id;
        $this->contenu;
        $this->auteur;
    }

    public function __toString()
    {
        $a = 'str';
        // TODO: Implement __toString() method.
        return $a;
    }
}

class profil_class
{
    public $categorie, $pseudo, $contenu, $id;

    public function __construct()
    {
        $this->categorie;
        $this->pseudo;
        $this->contenu;
        $this->id;
    }

    public function __toString()
    {
        $a = 'str';
        // TODO: Implement __toString() method.
        return $a;
    }


}

class votes_class
{
    public $pseudo, $publication, $utilisateur;

    public function __construct()
    {
        $this->pseudo;
        $this->publication;
        $this->utilisateur;
    }


    public function __toString()
    {
        $a = 'str';
        // TODO: Implement __toString() method.
        return $a;
    }


}

?>