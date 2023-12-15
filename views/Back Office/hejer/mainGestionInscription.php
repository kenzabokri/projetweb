<?php


include '../../../controller/hejer/inscriptionC.php';

$u = new InscriptionC();
$user = $u->listUser();

$p = new InscriptionC();
$periode = $p->listPeriode();

$c = new InscriptionC();
$cours = $c->listCours();

$i = new InscriptionC();
$tab = $i->listInscription();

$e = new InscriptionC();
$emploi = $i->listEmploi();

$c = new InscriptionC();
$class = $i->listClass();
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
<!-- partial:index.partial.html -->
<body >

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
        <a href="./mainGestionPeriode.php" class="item">PERIODE</a>
        <div class="seperator"></div>
        <a href="./add_periode.php" class="item ">ADD PERIODE</a>
        <div class="seperator"></div>
        <a href="./mainGestionInscription.php" class="item selected">INSCRIPTION</a>
        <div class="seperator"></div>
        <a href="./add_inscription.php" class="item ">ADD INSCRIPTION</a>
        <div class="seperator"></div>
        </div>
        <a href="../../Front Office/user_management/logout.php" class="btn-reserve" style="color: black;">Log Out</a>
      </div>
      <div class="view">
        <div class="sub-title">HEJER'S PANEL</div>
        <div class="main-title">Toutes les inscri</div>
        <div class="seperator"></div>
        <button onclick="showChart()">Show Chart</button>

        <style>
  .scrollable-table {
    max-height: 400px; /* ajustez la hauteur maximale selon vos besoins */
    overflow-y: auto;
  }
</style>

<div class="scrollable-table">    
<table class="rwd-table"  border="1" align="center" width="70%">
  <tr>
    <th>Id inscri</th>
    <th>User</th>
    <th>Cours</th>
    <th>Periode</th>
    <th>emploi</th>
    <th>classe</th>
  </tr>
  <?php
    foreach ($tab as $i) {
    ?>
  <tr>
    <td data-th="Movie Title" ><?= $i['id_inscri']; ?></td>
    <td data-th="Genre"><?= $i['user']; ?></td>
    <td data-th="Year"><?= $i['cours']; ?></td>
    <td data-th="Gross" ><?= $i['periode']; ?></td>
    <td data-th="Gross" ><?= $i['emploi']; ?></td>
    <td data-th="Gross" ><?= $i['class']; ?></td>
    <td>
    <form method="POST" action="./update_inscri.php">
                    <input type="submit" name="update" value="Update ">
                    <input type="hidden" value=<?PHP echo $i['id_inscri']; ?> name="id_inscri">
                    <td>
      <button ><a href="delete_inscri.php?id_inscri=<?php echo $i['id_inscri']; ?>"class="item">Delete </a></button>
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
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
function showChart() {
    window.location.href = 'chartt.php'; // Replace with the actual URL of your chart page
}
</script>


</body>
</html>
