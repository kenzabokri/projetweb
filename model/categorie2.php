<?php
class Categories
{
    private ?int $id_cat = null;
    private ?string $nom_cat = null;
    private ?string $url_cat = null;

    public function __construct($id = null, $nom, $url)
    {
        $this->id_cat = $id;
        $this->nom_cat = $nom;
        $this->url_cat = $url;
    }

    public function getIdCat()
    {
        return $this->id_cat;
    }

    public function getNomCat()
    {
        return $this->nom_cat;
    }

    public function setNomCat($nom_cat)
    {
        $this->nom_cat = $nom_cat;

        return $this;
    }

    public function getUrlCat()
    {
        return $this->url_cat;
    }

    public function setUrlCat($url_cat)
    {
        $this->url_cat = $url_cat;

        return $this;
    }
}
