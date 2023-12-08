<?php
include 'C:\xampp\htdocs\final\controller\donC.php';
$d = new donC();
$d->deleteDons($_GET["ID_don"]);
header('Location:listDon.php');
?>
