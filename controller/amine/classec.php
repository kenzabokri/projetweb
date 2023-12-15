<?php

require '../../../config.php';


class classec
{

    /*public function list()
    {
        $sql = "SELECT * FROM class";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }*/

    public function delete($idclasse)
    {
        $sql = "DELETE FROM class WHERE idclasse = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $idclasse);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    


    function add($classe)
    {
        $sql = "INSERT INTO class  
        VALUES (NULL, :nom,:nbp)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'nom' => $classe->getnomclasse(),
                'nbp' => $classe->getnbpatient()
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }


    function show($id)
    {
        $sql = "SELECT * from class where idclasse = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $classe = $query->fetch();
            return $classe;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function update($classe, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE class SET 
                    nomclasse = :nomclasse, 
                    nbpatient = :nbpatient
                WHERE idclasse= :idclasse'
            );
            $query->execute([
                ':idclasse' => $id,
                ':nomclasse' => $classe->getnomclasse(),
                ':nbpatient' => $classe->getnbpatient()
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    public function listemploi($idemploi)
    {
        $sql = "SELECT * FROM emploi WHERE idemploi = :idemploi";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindParam(':idemploi', $idemploi, PDO::PARAM_INT);
            $query->execute();
            $result = $query->fetchAll();
            return $result;
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function list()
    {
        $sql = "SELECT * FROM class";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $result = $query->fetchAll();
            return $result;
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

}
