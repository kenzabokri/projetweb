<?php

require '../../../config.php';
require '../../../model/rayen/destination.php';

class destinationC
{


    public function listdest()
    {
        $sql = "SELECT * FROM destination";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function deleteDest($id)
    {
        $sql = "DELETE FROM destination WHERE id_Dest = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function addDestination($destination)
    {
        $sql = "INSERT INTO destination VALUES (NULL, :destination)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
        
                'destination' => $destination->getDestination(),
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    public function showDest($id)
    {
        $sql = "SELECT * FROM destination WHERE id_Dest = :id";
        $db = config::getConnexion();

        try {
            $query = $db->prepare($sql);
            $query->bindValue(':id', $id);
            $query->execute();
            
            // Vérifiez le nombre de lignes retournées
            $rowCount = $query->rowCount();
            
            if ($rowCount > 0) {
                // Si au moins une ligne est trouvée, récupérez les données
                $category = $query->fetch();
                return $category;
            } else {
                // Aucune ligne trouvée, retourne null
                return null;
            }
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    
    public function updateDest($id, $destination)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE destination SET
                    destination = :destination
                WHERE id_Dest = :id'
            );
    
            $query->bindValue(':id', $id);
            $query->bindValue(':destination', $destination->getDestination());
    
            $query->execute();
    
            return $query->rowCount() > 0;
        } catch (PDOException $e) {
            throw new Exception('Error updating : ' . $e->getMessage());
        }
    }
   




}