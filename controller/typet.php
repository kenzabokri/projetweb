<?php

require '../../config.php';

class typet
{

    /*public function listtype()
    {
        $sql = "SELECT * FROM type";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }*/
    public function list($idtype)
    {
        $sql = "SELECT * FROM eve WHERE idtype = :idtype";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindParam(':idtype', $idtype, PDO::PARAM_INT);
            $query->execute();
            $result = $query->fetchAll();
            return $result;
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function listtype()
    {
        $sql = "SELECT * FROM type";
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

    function deletetype($idtype)
    {
        $sql = "DELETE FROM type WHERE idtype = :idtype";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':idtype', $idtype);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    public function deleteEventsByType($idtype)
{
    $sql = "DELETE FROM eve WHERE idtype = :idtype";
    $db = config::getConnexion();
    $req = $db->prepare($sql);
    $req->bindValue(':idtype', $idtype);

    try {
        $req->execute();
    } catch (Exception $e) {
        die('Error:' . $e->getMessage());
    }
}



    function addtype($type)
    {
        $sql = "INSERT INTO type  
        VALUES (NULL, :nom)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'nom' => $type->getnomtype()
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }


    function showtype($id)
    {
        $sql = "SELECT * from type where idtype = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $type = $query->fetch();
            return $type;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function updatetype($type, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE type SET 
                    nomtype = :nom
                WHERE idtype= :idtype'
            );
            $query->execute([
                'idtype' => $id,
                'nom' => $type->getnomtype()
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
}
