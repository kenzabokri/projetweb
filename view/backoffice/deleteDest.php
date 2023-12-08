<?php
include 'C:\xampp\htdocs\final\controller\destinationC.php';
$d = new destinationC();
$d->deleteDest($_GET["id_Dest"]);
header('Location:listDest.php');
?>
