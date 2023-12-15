<?php

require 'C:\xampp\htdocs\Ajax - Copy\config4.php';

require 'C:\xampp\htdocs\Ajax - Copy\model\hejer\inscription.php';

class InscriptionC
{
    public function listEmploi()
    {
        $sql = "SELECT * FROM emploi ";
        $db = conf::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    public function listClass()
    {
        $sql = "SELECT * FROM class ";
        $db = conf::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    public function listUser()
    {
        $sql = "SELECT * FROM users WHERE role = 'PATIENT'";
        $db = conf::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
   
    public function listCours()
    {
        $sql = "SELECT * FROM cours";
        $db = conf::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    public function listPeriode()
    {
        $sql = "SELECT * FROM periode";
        $db = conf::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    public function listInscriptionNew()
{
    $sql ="SELECT i.id_inscri, u.first_name as user, c.nom_cours, p.longueur as periode
    FROM inscription i
    JOIN users u ON i.user = u.user_id
    JOIN cours c ON i.cours = c.id_cours
    JOIN periode p ON i.periode = p.id_periode";

    $db = conf::getConnexion();

    try {
        $liste = $db->query($sql);
        return $liste;
    } catch (Exception $e) {
        die('Error:' . $e->getMessage());
    }
}
    public function listInscription()
    {
        $sql = "SELECT * FROM inscription";
        $db = conf::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function deleteInscription($id)
    {
        $sql = "DELETE FROM inscription WHERE id_inscri = :id";
        $db = conf::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function addInscription($inscri)
{
    $sql = "INSERT INTO inscription VALUES (NULL, :user, :cours, :periode, :emploi, :class)";
    $db = conf::getConnexion();
    echo "heeeeejer";
    try {
        $query = $db->prepare($sql);
        $query->execute([
            'user' => $inscri->getUser(),
            'cours' => $inscri->getCours(),
            'periode' => $inscri->getPeriode(),
            'emploi' => $inscri->getEmploi(),
            'class' => $inscri->getClass()
        ]);
        var_dump($query->errorInfo()); // Debugging line
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}
public function showInscri($id)
    {
        $sql = "SELECT * FROM inscription WHERE id_inscri = :id";
        $db = conf::getConnexion();
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


    public function updateInscription($id_inscri, $user, $inscription)
{
    try {
        $db = conf::getConnexion();
        $query = $db->prepare(
            'UPDATE inscription 
             SET cours = :cours, periode = :periode, emploi = :emploi, class = :class
             WHERE id_inscri = :id_inscri AND user = :user'
        );

        $query->bindValue(':id_inscri', $id_inscri);
        $query->bindValue(':user', $user);
        $query->bindValue(':cours', $inscription->getCours());  // Assuming getCours() is the method to retrieve the cours value
        $query->bindValue(':periode', $inscription->getPeriode()); 
        $query->bindValue(':emploi', $inscription->getEmploi()); 
        $query->bindValue(':class', $inscription->getClass()); 



        $query->execute();

        return $query->rowCount() > 0;
    } catch (PDOException $e) {
        throw new Exception('Error updating inscription: ' . $e->getMessage());
    }
}

}


