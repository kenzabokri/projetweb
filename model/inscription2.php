<?php
class Inscri
{
    private ?int $id_inscri = null;
    private ?int $user = null;
    private ?int $cours = null;
    private ?int $periode = null;
    

    public function __construct($id = null, $u,$c,$p)
    {
        $this->id_inscri = $id;
        $this->user = $u;
        $this->cours = $c;
        $this->periode = $p;
        
    }

    public function getIdInscri()
    {
        return $this->id_inscri;
    }

    public function getUser()
    {
        return $this->user;
    }

   
    public function getCours()
    {
        return $this->cours;
    }

    public function getPeriode()
    {
        return $this->periode;
    }
   

    
}
