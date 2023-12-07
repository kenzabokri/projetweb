<?php
include 'C:/xampp/htdocs/gestio_oeuvre2/controller/categorieC.php';
$cou = new CategorieC();
$cou->deleteCategory($_GET["ID_cat"]);
header('Location:showcategory.php');
?>