<?php

require 'C:\xampp\htdocs\Ajax - Copy\config3.php';

require 'C:\xampp\htdocs\Ajax - Copy\model\hejer\periode.php';

class PeriodeC
{
    
    public function listPeriode()
    {
        $sql = "SELECT * FROM periode";
        $db = con::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function deletePeriode($id)
    {
        $sql = "DELETE FROM periode WHERE id_periode = :id";
        $db = con::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function addPeriode($periode)
    {
        $sql = "INSERT INTO periode VALUES (NULL, :longueur, :nb_seance)";
        $db = con::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'longueur' => $periode->getLongueur(),
                'nb_seance' => $periode->getNbSeance()
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function showPeriode($id)
    {
        $sql = "SELECT * FROM periode WHERE id_periode = :id";
        $db = con::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindValue(':id', $id);
            $query->execute();
            $category = $query->fetch();
            return $category;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    public function updatePeriode($id, $periode)
{
    try {
        $db = con::getConnexion();
        $query = $db->prepare(
            'UPDATE periode SET
                longueur = :longueur,
                nb_seance = :nb_seance
            WHERE id_periode = :id'
        );

        $query->bindValue(':id', $id);
        $query->bindValue(':longueur', $periode->getLongueur());
        $query->bindValue(':nb_seance', $periode->getNbSeance());
        $query->execute();

        return $query->rowCount() > 0;
    } catch (PDOException $e) {
        throw new Exception('Error updating : ' . $e->getMessage());
    }
}


}


