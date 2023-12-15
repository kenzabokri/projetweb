<?php
include '../../../controller/hejer/categorieC.php';
$categ = new CategorieC();
$categ->deleteCategory($_GET["id_cat"]);
header('Location:mainGestionCat.php');
?>
