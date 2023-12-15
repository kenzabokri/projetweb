<?php

require 'C:\xampp\htdocs\Ajax - Copy\config.php';
require 'C:\xampp\htdocs\Ajax - Copy\config2.php';
require 'C:\xampp\htdocs\Ajax - Copy\model\hejer\cours.php';

class CoursC
{
    public function getCoursesForCategory($categoryId)
    {
        $sql = "SELECT * FROM cours WHERE categorie = :categoryId";
        $db = configuration::getConnexion();

        try {
            $query = $db->prepare($sql);
            $query->bindParam(':categoryId', $categoryId, PDO::PARAM_INT);
            $query->execute();

            return $query;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    public function getCategories()
{
    $sql = "SELECT * FROM categories";
    $db = configuration::getConnexion();

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

    public function listCours()
    {
        $sql = "SELECT * FROM cours";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function deleteCours($id)
    {
        $sql = "DELETE FROM cours WHERE id_cours = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function addCours($cours)
    {
        $sql = "INSERT INTO cours VALUES (NULL, :categorie, :nom, :prix)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'categorie' => $cours->getCategorie(),
                'nom' => $cours->getNomCours(),
                'prix' => $cours->getPrixCours(),
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function showCours($id)
    {
        $sql = "SELECT * FROM cours WHERE id_cours = :id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindValue(':id', $id);
            $query->execute();
            $cours = $query->fetch();
            return $cours;
        } catch (Exception $e) {
            die(

            'Error: ' . $e->getMessage());
        }
    }

    public function updateCours($cours, $id, $cat)
{
    try {
        $db = config::getConnexion();
        $query = $db->prepare(
            'UPDATE cours SET
                nom_cours = :nom, 
                prix_cours = :prix
            WHERE id_cours = :id_cours AND categorie = :cat'
        );

        $query->bindValue(':id_cours', $id);
        $query->bindValue(':cat', $cat); 
        $query->bindValue(':nom', $cours->getNomCours());
        $query->bindValue(':prix', $cours->getPrixCours()); 

        $query->execute();

        return $query->rowCount() > 0;
    } catch (PDOException $e) {
        throw new Exception('Error updating cours: ' . $e->getMessage());
    }
}


}
$coursC = new CoursC();

// Fetch categories
try {
    $imageList = $coursC->getCategories();
} catch (Exception $e) {
    die('Error:' . $e->getMessage());
}

// Fetch all courses
try {
    $cours = $coursC->listCours();
} catch (Exception $e) {
    die('Error:' . $e->getMessage());
}
?>


