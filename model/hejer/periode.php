<?php
class periode
{
    private ?int $id_periode = null;
    
    private ?string $longueur = null;
   
    private ?int $nb_seance = null;

    public function __construct($id = null, $l, $n)
    {
        $this->id_periode = $id;
        $this->longueur = $l;
        $this->nb_seance = $n;
       
    }

    public function getIdPeriode()
    {
        return $this->id_periode;
    }

    public function getLongueur()
    {
        return $this->longueur;
    }
    public function getNbSeance()
    {
        return $this->nb_seance;
    }
}