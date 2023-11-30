<?php
class formulaire
{
    private ?int $id = null;
    private ?string $nom = null;
    private ?string $prenom = null;
    private ?int $ticket = null;
    private ?string $role = null;
    private ?string $nome = null;
    private ?int $numero = null;

    public function __construct($idp = null, $nompersonne, $prenompersonne, $tickets, $roles,$nomev, $num){
        $this->id = $idp;
        $this->nom = $nompersonne;
        $this->prenom = $prenompersonne;
        $this->ticket = $tickets; 
        $this->role = $roles; 
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
    public function getticket()
    {
        return $this->ticket;
    }
    public function setticket($ticket)
    {
        $this->ticket = $ticket;

        return $this;
    }
    public function getrole()
    {
        return $this->role;
    }
    public function setrole($role)
    {
        $this->role = $role;

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