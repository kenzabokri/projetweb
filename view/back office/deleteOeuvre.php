<?php
include 'C:/xampp/htdocs/gestio_oeuvre2/controller/oeuvreC.php';
$cou = new oeuvreC();
$cou->deleteoeuvre($_GET["id_oeuvre"]);
header('Location:gestionOeuvre.php');
?>