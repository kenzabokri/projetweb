<?php

require '../../../config.php';

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
        $sql = "INSERT INTO emploi (date, dateDebut, dateFin) 
                VALUES (:date, :dateDebut, :dateFin)";
        $db = Config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'date' => $emploi->getdate(),
                'dateDebut' => $emploi->getdateDebut(),
                'dateFin' => $emploi->getdateFin()
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
                dateDebut = :dateDebuts,
                dateFin = :dateFins
            WHERE idemploi = :idemploi'
        );

        // Assuming datedebut and datefin are already in the correct string format
        $query->execute([
            ':idemploi' => $idemploi, 
            ':dateemploi' => $emploi->getdate()->format('Y-m-d'),
            ':dateDebuts' => $emploi->getdateDebut(),
            ':dateFins' => $emploi->getdateFin()
        ]);
        echo $query->rowCount() . " records UPDATED successfully <br>";
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
}

    


    public function liste()
{
    $sql = "SELECT idclasse FROM class";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_COLUMN);
        return $result;
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}
    
}

?>
