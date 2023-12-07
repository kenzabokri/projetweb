<?php
include '../../controller/periodeC.php';
$p = new PeriodeC();
$p->deletePeriode($_GET["id_periode"]);
header('Location:mainGestionPeriode.php');
?>
