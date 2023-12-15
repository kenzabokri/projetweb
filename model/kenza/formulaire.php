<?php
class formulaire
{
    private ?int $id = null;
    private ?string $nom = null;
    private ?string $prenom = null;
    private ?int $nome = null;
    private ?int $numero = null;

    public function __construct($idp = null, $nompersonne, $prenompersonne,$nomev, $num){
        $this->id = $idp;
        $this->nom = $nompersonne;
        $this->prenom = $prenompersonne; 
        $this->nome = $nomev; 
        $this->numero = $num; 
    }


    public function getid()
    {
        return $this->id;
    }
    public function setid($id)
    {
        $this->id = $id;

        return $this;
    }
    public function getnom()
    {
        return $this->nom;
    }
    public function setnom($nom)
    {
        $this->nome = $nom;

        return $this;
    }
    public function getprenom()
    {
        return $this->prenom;
    }
    public function setprenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }
    
    public function getnome()
    {
        return $this->nome;
    }
    public function setnome($nome)
    {
        $this->nome = $nome;

        return $this;
    }
    public function getnumero()
    {
        return $this->numero;
    }
    public function setnumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }
    
    

}