<?php
class type
{
    private ?int $idtype = null;
    private ?string $nomtype = null;

    public function __construct($id = null, $nom)
    {
        $this->idtype = $id;
        $this->nomtype = $nom;
    }
    public function getidtype()
    {
        return $this->idtype;
    }

    public function getnomtype()
    {
        return $this->nomtype;
    }

    public function setnomtype($nomtype)
    {
        $this->nomtype = $nomtype;

        return $this;
    }

}
