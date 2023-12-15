<?php
include '../../../controller/rayen/donC.php';

$d = new donC();
$d->deleteDons($_GET["ID_don"]);
header('Location:listDon.php');
?>
