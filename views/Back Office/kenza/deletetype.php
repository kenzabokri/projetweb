<?php
include '../../../controller/kenzatypet.php';

$typet = new typet();

// Supprimer les enregistrements liés dans la table `eve`
$typet->deleteEventsByType($_GET["idtype"]);

// Supprimer le type
$typet->deletetype($_GET["idtype"]);

header('Location:listtype.php');
