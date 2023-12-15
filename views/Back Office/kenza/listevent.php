<?php
include "../../../controller/kenza/evente.php";

$e = new eventc();
$tab = $e->list();

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
       <h1> <a href="./listevent.php" class="item selected">events</a></h1>
        <div class="seperator"></div>
        <h1><a href="./addevent.php" class="item">ADD event</a></h1>
        <div class="seperator"></div>
        <h1> <a href="./listtype.php" class="item ">type</a></h1>
        <div class="seperator"></div>
        <h1> <a href="./addtype.php" class="item ">ADD type</a></h1>
        <div class="seperator"></div>
        <h1> <a href="./searchevent.php" class="item ">search event</a></h1>
        <h1> <a href="./listformulaire.php" class="item ">form</a></h1>
        <h1> <a href="./statistique.php" class="item ">stat</a></h1>
        </div>
        <div class="log-out">LOG OUT</div>
      </div>
      <div class="view">
        <div class="sub-title">kenza'S PANEL</div>
        <div class="main-title">Tous les evenements</div>
        <div class="seperator"></div>
<table border="1" align="center" width="70%">
    <tr>
            <th>ID</th>
            <th>Nom de l'événement</th>
            <th>Date</th>
            <th>Description</th>
            <th>Heure de début</th>
            <th>Heure de fin</th>
            <th>Capacité</th>
            <th>Image</th>
            <th>Lieu</th>
            <th>idtype</th>
            <th>Update</th>
            <th>Delete</th>
    </tr>


    <?php
    foreach ($tab as $event) {
    ?>




        <tr>
        <td><?= $event['idevent']; ?></td>
                <td><?= $event['nomevent']; ?></td>
                <td><?= $event['date']; ?></td>
                <td><?= $event['description']; ?></td>
                <td><?= $event['heuredebut']; ?></td>
                <td><?= $event['heurefin']; ?></td>
                <td><?= $event['capacite']; ?></td>
                <td><?= $event['image']; ?></td>
                <td><?= $event['lieu']; ?></td>
                <td><?= $event['idtype']; ?></td>
            <td align="center">
                <form method="POST" action="./updateevent.php">
                    <input type="submit" name="update" value="Update">
                    <input type="hidden" value=<?PHP echo $event['idevent']; ?> name="idevent">
                </form>
            </td>
            <td>
               <!-- <a href="deleteClient.php?id=<?php echo $event['idevent']; ?>">Delete</a>-->
                <a href="./deleteevent.php?idevent=<?php echo $event['idevent']; ?>">Delete</a>
            </td>
        </tr>
    <?php
    }
    ?>
</table>