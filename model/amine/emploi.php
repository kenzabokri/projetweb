<?php
class emploi
{
    private ?int $idemploi = null;
    private $date = null;
    private  $dateDebut = null;
    private  $dateFin = null;

    public function __construct($id = null, $date, $dateDebuts, $dateFins)
    {
        $this->idemploi = $id;
        $this->date = $date;
        $this->dateDebut = $dateDebuts; // corrected from $this->seance
        $this->dateFin = $dateFins;
    }

    public function getidemploi()
    {
        return $this->idemploi;
    }

    public function getdate()
    {
        return $this->date;
    }

 

    public function getdateDebut()
    {
        return $this->dateDebut;
    }

    public function getdateFin()
    {
        return $this->dateFin;
    }

    public function setidemploi($idemploi) // corrected parameter name
    {
        $this->idemploi = $idemploi; // corrected property name

        return $this;
    }

    public function setdate($date)
    {
        $this->date = $date;

        return $this;
    }

    public function setdateDebut($dateDebut)
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    public function setdateFin($dateFin)
    {
        $this->dateFin = $dateFin;

        return $this;
    }

}
