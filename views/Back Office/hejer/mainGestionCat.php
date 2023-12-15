<?php


include '../../../controller/hejer/categorieC.php';



$c = new CategorieC();
$tab = $c->listCategories();

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
        <a href="./mainGestionCours.php" class="item ">COURS</a>
        <div class="seperator"></div>
        <a href="./add_cours.php" class="item">ADD COURS</a>
        <div class="seperator"></div>
        <a href="./mainGestionCat.php" class="item selected">CATEGORIES</a>
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
        <div class="main-title">Tous les categories</div>
        <div class="seperator"></div>




<style>
  .scrollable-table {
    max-height: 400px; /* ajustez la hauteur maximale selon vos besoins */
    overflow-y: auto;
  }
</style>
<div class="scrollable-table">
        <table class="rwd-table"  border="1" align="center" width="70%" >
  <tr>
        <th>Id Categorie</th>
        <th>Nom Categorie</th>
        <th>Url image </th>
        <th>Update  </th>
        <th>Delete </th>
  </tr>
  <?php
    foreach ($tab as $categ) {
    ?>
  <tr>
    <td data-th="Movie Title" ><?= $categ['id_cat']; ?></td>
    <td data-th="Genre"><?= $categ['nom_cat']; ?></td>
    <td data-th="Year"><?= $categ['url_cat']; ?></td>
      <form method="POST" action="update_cat.php">
        <td>
                    <input type="submit" name="update" value="Update Category">
                    <input type="hidden" value=<?PHP echo $categ['id_cat']; ?> name="id_cat">
        </td>
        <td>
                    <a href="./delete_cat.php?id_cat=<?php echo $categ['id_cat']; ?>"class="item">Delete Category</a>
        </td>
      </form>
     
    
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
