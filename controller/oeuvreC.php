<?php
require "C:/xampp/htdocs/gestio_oeuvre2/config.php";
require "C:/xampp/htdocs/gestio_oeuvre2/model/oeuvre.php";


class oeuvreC
{
    public function listUser()
    {
        $sql = "SELECT * FROM user WHERE role = 'patient'";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    public function listcategory()
    {
        $sql = "SELECT * FROM categorie";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function listoeuvre()
    {
        $sql = "SELECT * FROM oeuvre";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function deleteoeuvre($id)
    {
        $sql = "DELETE FROM oeuvre WHERE id_oeuvre = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function addoeuvre($oeuvre)
    {
        $sql = "INSERT INTO oeuvre VALUES (NULL, :url, :user, :categorie)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'url' => $oeuvre->getPath(),
                'user' => $oeuvre->getpatient(),
                'categorie' => $oeuvre->getcategorie(),

            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function showoeuvre($id)
    {
        $sql = "SELECT * FROM oeuvre WHERE id_oeuvre = :id";
        $db = config::getConnexion();
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
    public function updateoeuvre($category, $id, $user, $oeuvre)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE oeuvre SET 
                url = :url,
                user = :user,
                categorie = :categorie
            WHERE id_oeuvre = :id'
            );

            $query->bindValue(':id', $id);
            $query->bindValue(':categorie', $category);
            $query->bindValue(':url', $oeuvre->getPath());
            $query->bindValue(':user', $user);

            // Debug: Output the values
            echo "id: $id, categorie: $category, url: {$oeuvre->getPath()}, user: $user";

            $query->execute();
        } catch (PDOException $e) {
            // Log or display the full error message for debugging
            echo 'Caught exception: ', $e->getMessage(), "\n";
            throw new Exception('Error updating oeuvre: ' . $e->getMessage());
        }
    }
    public function listDistinctUserIds()
    {
        $sql = "SELECT DISTINCT user FROM oeuvre";
        $db = config::getConnexion();
        try {
            $result = $db->query($sql);
            return $result->fetchAll(PDO::FETCH_COLUMN);
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function getUsernameForUserId($userId)
    {
        $sql = "SELECT username FROM user WHERE id_user = :userId LIMIT 1";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindValue(':userId', $userId);
            $query->execute();
            $result = $query->fetch(PDO::FETCH_ASSOC);
            return $result['username'];
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    public function getTotalOeuvresCount()
    {
        $sql = "SELECT COUNT(*) as totalOeuvres FROM oeuvre";
        $db = config::getConnexion();
        try {
            $result = $db->query($sql);
            $row = $result->fetch(PDO::FETCH_ASSOC);
            return $row['totalOeuvres'];
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function getUserOeuvresCount($userId)
    {
        $sql = "SELECT COUNT(*) as userOeuvresCount FROM oeuvre WHERE user = :userId";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindValue(':userId', $userId);
            $query->execute();
            $row = $query->fetch(PDO::FETCH_ASSOC);
            return $row['userOeuvresCount'];
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
}
