<?php
class Inscriptions
{
    private ?int $id_inscri = null;
    private ?int $user = null;
    private ?int $cours = null;
    private ?int $periode = null;
    private ?int $emploi = null;
    private ?int $class = null;
    

    public function __construct($id = null, $u,$c,$p,$e,$cl)
    {
        $this->id_inscri = $id;
        $this->user = $u;
        $this->cours = $c;
        $this->periode = $p;
        $this->emploi= $e;
        $this->class= $cl;
        
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
    public function getEmploi()
    {
        return $this->emploi;
    }
    public function getClass()
    {
        return $this->class;
    }

    
}
