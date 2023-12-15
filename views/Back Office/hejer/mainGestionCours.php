<?php


include '../../../controller/hejer/coursC.php';



$c = new CoursC();
$tab = $c->listCours();

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
        <a href="./mainGestionCours.php" class="item selected ">COURS</a>
        <div class="seperator"></div>
        <a href="./add_cours.php" class="item">ADD COURS</a>
        <div class="seperator"></div>
        <a href="./mainGestionCat.php" class="item ">CATEGORIES</a>
        <div class="seperator"></div>
        <a href="./add_categories.php" class="item  ">ADD CATEG</a>
        
        <div class="seperator"></div>
        <a href="./mainGestionPeriode.php" class="item">PERIODE</a>
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
        <div class="main-title">Tous les cours</div>
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
    <th>Id Cours</th>
    <th>Categorie</th>
    <th>Nom Cours</th>
    <th>Prix Cours</th>
    <th>Update</th>
    <th>Delete</th>
  </tr>
  <?php
    foreach ($tab as $cours) {
    ?>
  <tr>
    <td data-th="Movie Title" ><?= $cours['id_cours']; ?></td>
    <td data-th="Genre"><?= $cours['categorie']; ?></td>
    <td data-th="Year"><?= $cours['nom_cours']; ?></td>
    <td data-th="Gross" ><?= $cours['prix_cours']; ?></td>
    <td>
    <form method="POST" action="update_cours.php">
                    <input type="submit" name="update" value="Update Cours">
                    <input type="hidden" value=<?PHP echo $cours['id_cours']; ?> name="id_cours">
                    <td>
      <button ><a href="delete_cours.php?id_cours=<?php echo $cours['id_cours']; ?>"class="item">Delete Cours</a></button>
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
