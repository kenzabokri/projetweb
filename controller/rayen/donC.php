<?php

require 'C:\xampp\htdocs\Ajax - Copy\config.php';
require 'C:\xampp\htdocs\Ajax - Copy\model\rayen\don.php';

class donC
{
    
    public function getDest()
{
    $sql = "SELECT * FROM destination";
    $db = config::getConnexion();

    try {
        $categories = $db->query($sql);

        // Check if there are rows returned
        if ($categories->rowCount() > 0) {
            return $categories;
        } else {
            // No categories found
            return array();
        }
    } catch (Exception $e) {
        die('Error:' . $e->getMessage());
    }
}

    public function listdons()
    {
        $sql = "SELECT dons.ID_don, dons.Montant, destination.destination AS destination, dons.description
            FROM dons
            JOIN destination ON dons.destination = destination.id_Dest";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function deleteDons($id)
    {
        $sql = "DELETE FROM dons WHERE ID_don = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function addDons($dons)
    {
        $sql = "INSERT INTO dons VALUES (NULL, :Montant, :destination , :description)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'Montant' => $dons->getMontant(),
                'destination' => $dons->getDestination(),
                'description' => $dons->getDescription(),
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    public function getStatsByDestination()
    {
        $sql = "SELECT destination.destination, SUM(dons.montant) AS totalMontant 
                FROM dons 
                JOIN destination ON dons.destination = destination.id_Dest 
                GROUP BY dons.destination";
        
        $db = config::getConnexion();
        
        try {
            $stats = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
            return $stats;
        } catch (Exception $e) {
            die('Error in getStatsByDestination: ' . $e->getMessage());
        }
    }

}