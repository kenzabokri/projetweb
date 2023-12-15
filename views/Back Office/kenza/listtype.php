<?php
include "../../../controller/kenza/typet.php";

$t = new typet();
$tab = $t->listtype();

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
        <h1> <a href="./searchevent.php" class="item selected">search event</a></h1>
        <div class="seperator"></div>
        <h1> <a href="./listformulaire.php" class="item ">form</a></h1>
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
        <th>Id type</th>
        <th>nomtype</th>
        <th>Update</th>
        <th>Delete</th>
    </tr>


    <?php
    foreach ($tab as $type) {
    ?>
        <tr>
            <td><?= $type['idtype']; ?></td>
            <td><?= $type['nomtype']; ?></td>
            <td align="center">
                <form method="POST" action="./updatetype.php">
                    <input type="submit" name="update" value="Update">
                    <input type="hidden" value=<?PHP echo $type['idtype']; ?> name="idtype">
                </form>
            </td>
            <td>
                <a href="./deletetype.php?idtype=<?php echo $type['idtype']; ?>">Delete</a>
            </td>
        </tr>
    <?php
    }
    ?>
</table>