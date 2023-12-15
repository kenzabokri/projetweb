<?php
include '../../../controller/hejer/inscriptionC.php';
$i = new InscriptionC();
$i->deleteInscription($_GET["id_inscri"]);
header('Location:mainGestionInscription.php');
?>
