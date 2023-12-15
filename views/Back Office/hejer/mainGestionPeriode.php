<?php


include '../../../controller/hejer/periodeC.php';



$p = new PeriodeC();
$tab = $p->listPeriode();

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
    <a href="../../Front Office/index.php" class="item ">home</a>
        <div class="seperator"></div>
        <div class="list">
        <a href="./mainGestionCours.php" class="item  ">COURS</a>
        <div class="seperator"></div>
        <a href="./add_cours.php" class="item">ADD COURS</a>
        <div class="seperator"></div>
        <a href="./mainGestionCat.php" class="item ">CATEGORIES</a>
        <div class="seperator"></div>
        <a href="./add_categories.php" class="item  ">ADD CATEG</a>
        <div class="seperator"></div>
        <a href="./mainGestionPeriode.php" class="item selected">PERIODE</a>
        <div class="seperator"></div>
        <a href="./add_periode.php" class="item ">ADD PERIODE</a>
        <div class="seperator"></div>
        <a href="./mainGestionInscription.php" class="item">INSCRIPTION</a>
        <div class="seperator"></div>
        <a href="./add_inscription.php" class="item ">ADD INSCRIPTION</a>
        <div class="seperator"></div>
      </div>
      <a href="../../Front Office/user_management/logout.php" class="btn-reserve" style="color: black;">Log Out</a>
      </div>
      <div class="view">
        <div class="sub-title">HEJER'S PANEL</div>
        <div class="main-title">Toutes les periodes</div>
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
    <th>Id Periode</th>
    <th>Longueur</th>
    <th>NB Seance</th>
  </tr>
  <?php
    foreach ($tab as $periode) {
    ?>
  <tr>
    <td data-th="Movie Title" ><?= $periode['id_periode']; ?></td>
    <td data-th="Genre"><?= $periode['longueur']; ?></td>
    <td data-th="Genre"><?= isset($periode['nb_seance']) ? $periode['nb_seance'] : 'N/A'; ?></td>
    <td>
    <form method="POST" action="./update_periode.php">
                    <input type="submit" name="update" value="Update ">
                    <input type="hidden" value=<?PHP echo $periode['id_periode']; ?> name="id_periode">
                    <td>
      <button ><a href="delete_periode.php?id_periode=<?php echo $periode['id_periode']; ?>"class="item">Delete </a></button>
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
