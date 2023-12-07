<?php
class Cours
{
    private ?int $id_cours = null;
    private ?int $categorie = null;
    private ?string $nom_cours = null;
    private ?float $prix_cours = null;

    public function __construct($id = null, $categorie,$nom, $prix)
    {
        $this->id_cours = $id;
        $this->categorie = $categorie;
        $this->nom_cours = $nom;
        $this->prix_cours = $prix;
    }

    public function getIdCours()
    {
        return $this->id_cours;
    }

    public function getCategorie()
    {
        return $this->categorie;
    }

    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;

        return $this;
    }
    public function getNomCours()
    {
        return $this->nom_cours;
    }

    public function setNomCours($nom_cours)
    {
        $this->nom_cours = $nom_cours;

        return $this;
    }
    public function getPrixCours()
    {
        return $this->prix_cours;
    }

    public function setPrixCours($prix_cours)
    {
        $this->prix_cours = $prix_cours;

        return $this;
    }
}
