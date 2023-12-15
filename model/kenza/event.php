<?php
class event
{
    private ?int $idevent = null;
    private ?string $nomevent = null;
    private ?DateTime $date = null;
    private ?string $lieu = null;
    private ?string $description = null;
    private ?int $heuredebut = null;
    private ?int $heurefin = null;
    private ?int $capacite = null;
    private ?string $image = null;
    private ?int $idtype = null;

    public function __construct($id = null, $nomevenement, $datevenement, $descriptionevenement, $heuredebute, $heurefine, $capacitee, $images, $lieux, $idtype){
        $this->idevent = $id;
        $this->nomevent = $nomevenement;
            //$this->date = new DateTime($datevenement);
            $this->date = new DateTime();

        $this->description = $descriptionevenement;
        $this->heuredebut =(int) $heuredebute; 
        $this->heurefin = (int)$heurefine; 
        $this->capacite =(int) $capacitee; 
        $this->image = $images;
        $this->lieu = $lieux;
        $this->idtype = (int)$idtype;
    }


    public function getidevent()
    {
        return $this->idevent;
    }
    public function setidevent($idevent)
    {
        $this->idevent = $idevent;

        return $this;
    }
    public function getnomevent()
    {
        return $this->nomevent;
    }
    public function setnomevent($nomevent)
    {
        $this->nomevent = $nomevent;

        return $this;
    }
    public function getdate()
    {
        return $this->date;
    }
    public function setdate($date)
    {
        $this->date = $date;

        return $this;
    }
    public function description()
    {
        return $this->description;
    }
    public function setdescription($description)
    {
        $this->description = $description;

        return $this;
    }
    public function getheuredebut()
    {
        return $this->heuredebut;
    }
    public function setheuredebut($heuredebut)
    {
        $this->heuredebut = $heuredebut;

        return $this;
    }
    public function getheurefin()
    {
        return $this->heurefin;
    }
    public function setheurefin($heurefin)
    {
        $this->heurefin = $heurefin;

        return $this;
    }
    public function getcapacite()
    {
        return $this->capacite;
    }
    public function setcapacite($capacite)
    {
        $this->capacite = $capacite;

        return $this;
    }
    public function getimage()
    {
        return $this->image;
    }
    public function setimage($image)
    {
        $this->image = $image;

        return $this;
    }
    public function getlieu()
    {
        return $this->lieu;
    }
    public function setlieu($lieu)
    {
        $this->lieu = $lieu;

        return $this;
    }
    public function getidtype()
    {
        return $this->idtype;
    }

    public function setidtype($idtype)
    {
        $this->idtype = $idtype;

        return $this;
    }

}