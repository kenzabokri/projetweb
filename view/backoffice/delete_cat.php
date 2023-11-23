<?php
include '../../controller/categorieC.php';
$categ = new CategorieC();
$categ->deleteCategory($_GET["id_cat"]);
header('Location:mainGestionCat.php');
?>
