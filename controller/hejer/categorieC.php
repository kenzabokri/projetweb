<?php
require 'C:\xampp\htdocs\Ajax - Copy\config2.php';
require 'C:\xampp\htdocs\Ajax - Copy\model\hejer\categorie.php';

class CategorieC
{
    public function listCategories()
    {
        $sql = "SELECT * FROM categories";
        $db = configuration::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function deleteCategory($id)
    {
        $sql = "DELETE FROM categories WHERE id_cat = :id";
        $db = configuration::getConnexion();
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
        $sql = "INSERT INTO categories VALUES (NULL, :nom, :url)";
        $db = configuration::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'nom' => $category->getNomCat(),
                'url' => $category->getUrlCat(),
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function showCategory($id)
    {
        $sql = "SELECT * FROM categories WHERE id_cat = :id";
        $db = configuration::getConnexion();
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
            $db = configuration::getConnexion();
            $query = $db->prepare(
                'UPDATE categories SET 
                    nom_cat = :nom, 
                    url_cat = :url
                WHERE id_cat = :idCategory'
            );

            $query->bindValue(':idCategory', $id);
            $query->bindValue(':nom', $category->getNomCat());
            $query->bindValue(':url', $category->getUrlCat());

            $query->execute();
            $success = $query->execute();
            
        } catch (PDOException $e) {
            throw new Exception('Error updating category: ' . $e->getMessage());
        }
    }
}
?>
