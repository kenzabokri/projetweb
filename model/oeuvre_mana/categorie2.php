<?php

class Categories
{
    private ?int $id_cat = null;
    private ?string $nomCat = null;

    public function __construct($id_cat, $nomCat)
    {
        $this->id_cat = $id_cat;
        $this->nomCat = $nomCat;
    }

    public function getIdCat(): ?int
    {
        return $this->id_cat;
    }

    public function getNomCat(): ?string
    {
        return $this->nomCat;
    }

    public function setNomCat(string $nomCat): void
    {
        $this->nomCat = $nomCat;
    }
}
?>
