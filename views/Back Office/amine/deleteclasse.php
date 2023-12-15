<?php
include '../../../controller/amine/classec.php';
$classec = new classec();

// Utilisez 'idclasse' au lieu de 'idc' pour correspondre à l'URL
$classec->delete($_GET["idclasse"]);

// Utilisez le bon nom pour rediriger
header('Location:listclasse.php');
