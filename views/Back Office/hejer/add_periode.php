<?php


include '../../../controller/hejer/periodeC.php';
include '../../../model/hejer/periode2.php';

$error = "";


$p = null;

$periodeC = new PeriodeC();
if ($_SERVER["REQUEST_METHOD"] === "POST") {
if (
    isset($_POST["nb_seance"]) &&
    isset($_POST["longueur"]) 
) {
    if (
        !empty($_POST["nb_seance"]) &&
        !empty($_POST["longueur"]) 
    ) {
        $p = new Periodes(
            null,
            $_POST['longueur'],
            $_POST['nb_seance']
        );
        
        $periodeC->addPeriode($p);

        header('Location:mainGestionPeriode.php');
    } else
        $error = "Missing information";
}
}

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
        <a href="./mainGestionCat.php" class="item ">CATEGORIES</a>
        <div class="seperator"></div>
        <a href="./add_categories.php" class="item  ">ADD CATEG</a>
        
        <div class="seperator"></div>
        <a href="./mainGestionPeriode.php" class="item">PERIODE</a>
        <div class="seperator"></div>
        <a href="./add_periode.php" class="item selected">ADD PERIODE</a>
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
        <div class="main-title">Add Period</div>
        <div class="seperator"></div>


        <form action="" method="POST">
        
                    <div>
                    <label for="nom">longueur:</label>
                    <input type="text" id="longueur" name="longueur" />
                    </div>
                    <div>
                    <label for="nom">Nombre de seance:</label>
                    <input type="number" id="nb_seance" name="nb_seance" />
                    </div>
                <div>
                <input type="submit" value="Save">
            
                <input type="reset" value="Reset">
                </div>

    </form>
</body>
      </div>
    </div>
  </div>
</body>
<!-- partial -->
  <script  src="./script.js"></script>
  
</body>
</html>
