<?php

include '../../../controller/rayen/destinationC.php';



$d = new destinationC();
$tab = $d->listdest();
?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>ADMIN PANEL</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="./styletab.css">

<link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="./style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<body>
  <div class="background"></div>
  <div class="body-wrapper">
    <div class="panel">
    <div class="aside">
    <a href="../../Front Office/index.php">home</a> 
    <div class="seperator"></div>
        <div class="list">
        <a href="listDon.php" class="item  ">DONS</a>
        <div class="seperator"></div>
        <a href="addDon.php" class="item ">ADD DONS</a>
        <div class="seperator"></div>
        <a href="listDest.php" class="item selected ">Destination</a>
        <div class="seperator"></div>
        <a href="addDest.php" class="item  ">ADD DES</a>
        <div class="seperator"></div>
    <a href="statDon.php" class="item ">STAT</a>
        <div class="seperator"></div>
        <a href="exportDonations.php" class="button">Download CSV</a>
        <div class="seperator"></div>
        </div>
        <a href="../../Front Office/user_management/logout.php">logout</a>
      </div>
      <div class="view">
        <div class="sub-title">RAYEN'S PANEL</div>
        <div class="main-title"> les Destinations </div>
        <div class="seperator"></div>

        <style>
  .scrollable-table {
    max-height: 400px; /* ajustez la hauteur maximale selon vos besoins */
    overflow-y: auto;
  }
</style>

<div class="scrollable-table">    
<table class="rwd-table"  border="1" align="center" width="70%">
<tr>
    <th>Id destination</th>
    <th>destination</th>
  </tr>
  <?php
    foreach ($tab as $d) {
    ?>
  <tr>
    <td data-th="Movie Title" ><?= $d['id_Dest']; ?></td>
    <td data-th="Genre"><?= $d['destination']; ?></td>
    <td>
    <form method="POST" action="./updateDest.php">
                    <input type="submit" name="update" value="Update ">
                    <input type="hidden" value=<?PHP echo $d['id_Dest']; ?> name="destination">
                    <td>
                    <button><a href="deleteDest.php?id_Dest=<?php echo $d['id_Dest']; ?>" class="item">Delete </a></button>
      </td>
      </form>
      </td>
      
  </tr>

  <?php
    }
    ?>






</table>
 </div>
        
</body>
<!-- partial -->
  <script  src="./script.js"></script>

</body>
</html>