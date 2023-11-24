<?php
include '../../controller/emploic.php';
$emploic = new emploic();

// Utilisez 'idclasse' au lieu de 'idc' pour correspondre à l'URL
$emploic->delete($_GET["idemploi"]);

// Utilisez le bon nom pour rediriger
header('Location:showemploi.php');
