<?php

require '../../../config.php';

class formulairef
{

    public function list()
    {
        $sql = "SELECT * FROM formulaire";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }




    function add($formulaire)
{
    $sql = "INSERT INTO formulaire (nom, prenom, nome,numero)  
            VALUES (:nom, :prenom, :nome, :numero)";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->execute([
            'nom' => $formulaire->getnom(),
            'prenom' => $formulaire->getprenom(),
            'nome' => $formulaire->getnome(),
            'numero' => $formulaire->getnumero(),
        ]);

        //echo "personne added successfully"; // Ajout de message pour le débogage
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}



    
    function show($id)
    {
        $sql = "SELECT * FROM formulaire WHERE id = :id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindParam(':id', $id, PDO::PARAM_INT);
            $query->execute();
            $formulaire = $query->fetch();
            return $formulaire;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

   

}