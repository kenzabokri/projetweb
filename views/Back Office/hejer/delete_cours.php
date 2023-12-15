<?php
include '../../../controller/hejer/coursC.php';
$cou = new CoursC();
$cou->deleteCours($_GET["id_cours"]);
header('Location:mainGestionCours.php');
?>
