<?php
class Periodes
{
    private ?int $id_periode = null;
    
    private ?string $longueur = null;
   

    public function __construct($id = null, $l)
    {
        $this->id_periode = $id;
        $this->longueur = $l;
       
    }

    public function getIdPeriode()
    {
        return $this->id_periode;
    }

    public function getLongueur()
    {
        return $this->longueur;
    }

}