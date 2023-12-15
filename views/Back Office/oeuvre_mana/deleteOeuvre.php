<?php
include 'C:/xampp/htdocs/Ajax - Copy/controller/oeuvre_mana/oeuvreC.php';
$cou = new oeuvreC();
$cou->deleteoeuvre($_GET["id_oeuvre"]);
header('Location:gestionOeuvre.php');
?>