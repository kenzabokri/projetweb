<?php
class dest
{
    private ?int $id_Dest = null;
    private ?string $destination = null;

    
    public function __construct($id_Dest, $destination = null)
    {
        $this->id_Dest = $id_Dest;
        $this->destination = $destination;

    }

    public function getIdDest()
    {
        return $this->id_Dest;
    }

    public function getDestination()
    {
        return $this->destination;
    }

   

   

}
