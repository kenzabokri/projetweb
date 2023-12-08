<?php
class dons
{
    private ?int $id_don = null;
    private ?float $montant = null;
    private ?string $destination = null;
    private ?string $description= null;
    

    public function __construct($id = null, $m,$dt,$desc)
    {
        $this->id_don = $id;
        $this->montant = $m;
        $this->destination = $dt;
        $this->description = $desc;
        
    }

    public function getIdDon()
    {
        return $this->id_don;
    }

    public function getMontant()
    {
        return $this->montant;
    }

    public function getDestination()
    {
        return $this->destination;
    }
    
    
    public function getDescription()
    {
        return $this->description;
    }
   

}
