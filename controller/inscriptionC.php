<?php

require 'C:\xampp\htdocs\projet_gestion_cours_categorie_hejer\config4.php';

require 'C:\xampp\htdocs\projet_gestion_cours_categorie_hejer\model\inscription.php';

class InscriptionC
{
    
    
    public function listUser()
    {
        $sql = "SELECT * FROM user WHERE role = 'patient'";
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
    $sql = "INSERT INTO inscription VALUES (NULL, :user, :cours, :periode)";
    $db = conf::getConnexion();
    echo "heeeeejer";
    try {
        $query = $db->prepare($sql);
        $query->execute([
            'user' => $inscri->getUser(),
            'cours' => $inscri->getCours(),
            'periode' => $inscri->getPeriode()
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
             SET cours = :cours, periode = :periode 
             WHERE id_inscri = :id_inscri AND user = :user'
        );

        $query->bindValue(':id_inscri', $id_inscri);
        $query->bindValue(':user', $user);
        $query->bindValue(':cours', $inscription->getCours());  // Assuming getCours() is the method to retrieve the cours value
        $query->bindValue(':periode', $inscription->getPeriode());  // Assuming getPeriode() is the method to retrieve the periode value

        $query->execute();

        return $query->rowCount() > 0;
    } catch (PDOException $e) {
        throw new Exception('Error updating inscription: ' . $e->getMessage());
    }
}

}


