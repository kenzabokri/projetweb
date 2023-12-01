<?php
class emploi
{
    private ?int $idemploi = null;
    private ?DateTime $date = null;
    private ?string $seance = null;
    private ?string $dateDebut = null;
    private ?string $dateFin = null;
    private ?int $idclasse = null;

    public function __construct($id = null, $dateemploi, $seances, $dateDebuts, $dateFins,$idclasses)
    {
        $this->idemploi = $id;
        $this->date = new DateTime();
        $this->seance = $seances;
        $this->dateDebut = $dateDebuts; // corrected from $this->seance
        $this->dateFin = $dateFins;
        $this->idclasse = $idclasses;
    }

    public function getidemploi()
    {
        return $this->idemploi;
    }

    public function getdate()
    {
        return $this->date;
    }

    public function getseance()
    {
        return $this->seance;
    }

    public function getdateDebut()
    {
        return $this->dateDebut;
    }

    public function getdateFin()
    {
        return $this->dateFin;
    }

    public function getidclasse()
    {
        return $this->idclasse;
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

    public function setseance($seance)
    {
        $this->seance = $seance;

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
    public function setidclasse($idclasse) // corrected parameter name
    {
        $this->idclasse = $idclasse; // corrected property name

        return $this;
    }

}
