<?php
include 'C:\xampp\htdocs\Ajax - Copy\controller\oeuvre_mana\categorieC.php';
$cou = new CategorieC();
$cou->deleteCategory($_GET["ID_cat"]);
header('Location:showcategory.php');
?>