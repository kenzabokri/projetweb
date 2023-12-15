<?php
include "../../../controller/kenza/formulairef.php";

$f = new formulairef();
$tab = $f->list();
?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>ADMIN PANEL</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="./style.css">
</head>

<body>
  <div class="background">   
  </div>
  <div class="body-wrapper">
    <div class="panel">
      <div class="aside"> 
      <a href="../../Front Office/index.php">Home </a>
      <p><a href="../../Front Office/user_management/logout.php">Log out</a></p>
        <div class="seperator"></div>
        <div class="list">
       <h1> <a href="./listevent.php" class="item ">events</a></h1>
        <div class="seperator"></div>
        <h1><a href="./addevent.php" class="item ">ADD event</a></h1>
        <div class="seperator"></div>
        <h1> <a href="./listtype.php" class="item ">type</a></h1>
        <div class="seperator"></div>
        <h1> <a href="./addtype.php" class="item ">ADD type</a></h1>
        <div class="seperator"></div>
        <h1> <a href="./searchevent.php" class="item ">search event</a></h1>
        <div class="seperator"></div>
        <h1> <a href="./listformulaire.php" class="item selected">form</a></h1>
        <div class="seperator"></div>
        <h1> <a href="./statistique.php" class="item ">stat</a></h1>
        </div>
        <div class="log-out">LOG OUT</div>
      </div>
      <div class="view">
        <div class="sub-title">kenza'S PANEL</div>
        <div class="main-title">Add event</div>
        <div class="seperator"></div>
<body>
<table border="1" align="center" width="70%">
    <tr>
            <th>ID</th>
            <th>Nom personne</th>
            <th>prenom personne</th>
            
            <th>role</th>
            <th>nome</th>
            <th>numero</th>
    </tr>


    <?php
    foreach ($tab as $formulaire) {

    ?>




        <tr>
            <td><?= $formulaire['id']; ?></td>
            <td><?= $formulaire['nom']; ?></td>
            <td><?= $formulaire['prenom']; ?></td>
            
            <td><?= $formulaire['role']; ?></td>
            <td><?= $formulaire['nome']; ?></td>
            <td><?= $formulaire['numero']; ?></td>
        </tr>
    <?php
    }
    ?>