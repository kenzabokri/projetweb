<?php
class Categorie
{
    private ?int $id_cat = null;
    private ?string $nomCat = null;


    public function __construct($id_cat,$nomCat)
    {
        $this->$id_cat= $id_cat;
        $this->$nomCat = $nomCat;
        
    }

    public function getIdCat()
    {
        return $this->id_cat;
    }

    public function getNomCat()
    {
        return $this->nomCat;
    }

}
