<?php
include '../../Controller/evente.php';
$eventc = new eventc();
$eventc->delete($_GET["idevent"]);
header('Location:listevent.php');

