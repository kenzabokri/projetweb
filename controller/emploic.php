<?php

require_once('config.php');

class emploic
{
    public function list()
    {
        $sql = "SELECT * FROM emploi";
        $db = Config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    public function delete($idemploi)
    {
        $sql = "DELETE FROM emploi WHERE idemploi = :id";
        $db = Config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $idemploi);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    public function add($emploi)
    {
        $sql = "INSERT INTO emploi (date, seance, dateDebut, dateFin,idclasse) 
                VALUES (:date, :seance, :dateDebut, :dateFin, :idclasse)";
        $db = Config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'date' => $emploi->getdate()->format('Y-m-d'),
                'seance' => $emploi->getseance(),
                'dateDebut' => $emploi->getdateDebut(),
                'dateFin' => $emploi->getdateFin(),
                'idclasse' => $emploi->getidclasse()
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function show($id)
    {
        $sql = "SELECT * FROM emploi WHERE idemploi = :id";
        $db = Config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindValue(':id', $id);
            $query->execute();
            $emploi = $query->fetch(PDO::FETCH_ASSOC);
            return $emploi;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    public function update($emploi, $idemploi)
    {
        try {
            $db = Config::getConnexion();
            $query = $db->prepare(
                'UPDATE emploi SET 
                    date = :dateemploi, 
                    seance = :seances,
                    dateDebut = :dateDebuts,
                    dateFin = :dateFins,
                    idclasse = :idclasses
                WHERE idemploi = :idemploi'
            );
            $query->execute([
                ':idemploi' => $idemploi, // Correction ici
                ':dateemploi' => $emploi->getdate()->format('Y-m-d'),
                ':seances' => $emploi->getseance(),
                ':dateDebuts' => $emploi->getdateDebut(),
                ':dateFins' => $emploi->getdateFin(),
                ':idclasses' => $emploi->getidclasse()
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    
    
}

?>
