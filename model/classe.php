<?php
class classe
{
    private ?int $idclasse = null;
    private ?string $nomclasse = null;
    private ?string $nbpatient = null;

    public function __construct($id = null, $nom, $nbp)
    {
        $this->idclasse = $id;
        $this->nomclasse = $nom;
        $this->nbpatient = $nbp;
    }

    
    public function getidclasse()
    {
        return $this->idclasse;
    }

    
    public function getnomclasse()
    {
        return $this->nomclasse;
    }

    /**
     * Set the value of lastName
     *
     * @return  self
     */
    public function setnomclasse($nomclasse)
    {
        $this->nomclasse = $nomclasse;

        return $this;
    }

    
    public function getnbpatient()
    {
        return $this->nbpatient;
    }

    /**
     * Set the value of firstName
     *
     * @return  self
     */
    public function setnbpatient($nbpatient)
    {
        $this->nbpatient = $nbpatient;

        return $this;
    }

}
