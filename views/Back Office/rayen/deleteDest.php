<?php

include '../../../controller/rayen/destinationC.php';
$d = new destinationC();
$d->deleteDest($_GET["id_Dest"]);
header('Location:listDest.php');
?>
