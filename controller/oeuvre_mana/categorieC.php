<?php
require "C:/xampp/htdocs/Ajax - Copy/config.php";
require "C:/xampp/htdocs/Ajax - Copy/model/oeuvre_mana/categorie.php";


class CategorieC
{
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
    public function deleteCategory($id)
    {
        $sql = "DELETE FROM categorie WHERE ID_cat = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function addCategory($category)
    {
        $sql = "INSERT INTO categorie VALUES (NULL, :nom_cat)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'nom_cat' => $category->getNomCat(),
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function showCategory($id)
    {
        $sql = "SELECT * FROM categorie WHERE ID_cat = :id";
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
    public function updateCategory($category, $id)
{
    try {
        $db = config::getConnexion();
        $query = $db->prepare('UPDATE categorie SET nom_cat = :nom WHERE ID_cat = :idCategory');

        $query->bindValue(':idCategory', $id);
        $categoryName = $category->getNomCat();
        $query->bindValue(':nom', $categoryName);

        $success = $query->execute();

        if (!$success) {
            throw new Exception('Update failed. SQL Error: ' . implode(', ', $query->errorInfo()));
        } else {
            error_log('Update successful!');
        }
    } catch (PDOException $e) {
        error_log('PDO Exception: ' . $e->getMessage());
    } catch (Exception $e) {
        error_log('Error updating category: ' . $e->getMessage());
    }
}

}
?>
