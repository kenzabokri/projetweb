<?php


include '../../../controller/hejer/inscriptionC.php';
include '../../../model/hejer/inscription2.php';
$error = "";


$i = null;
$coursC = new InscriptionC();
$cours = $coursC->listCours();


$emploiC = new InscriptionC();
$emploi = $emploiC->listEmploi();

$classC = new InscriptionC();
$class = $classC->listClass();

$periodeC = new InscriptionC();  // Fix: Use the correct object
$periode = $periodeC->listPeriode();

$inscriptionC = new InscriptionC();
$user = $inscriptionC->listUser();

if (
    isset($_POST["user"]) &&
    isset($_POST["cours"]) &&
    isset($_POST["periode"]) 
) {
    if (
        !empty($_POST['user']) &&
        !empty($_POST['cours']) &&
        !empty($_POST["periode"]) 
    ) {
        $i = new Inscri(
            null,
            $_POST['user'],
            $_POST['cours'],
            $_POST['periode'],
            $_POST['emploi'],
            $_POST['classe']
        );
        
        $inscriptionC->addInscription($i);
        $user = $inscriptionC->listUser();
        $periode = $periodeC->listPeriode();
        $cours = $coursC->listCours();
        $class = $classC->listClass();
        $emploi = $emploiC->listEmploi();
        header('Location:mainGestionInscription.php');
    } else
        $error = "Missing information";
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
        <a href="./add_cours.php" class="item ">ADD COURS</a>
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
        <a href="./add_inscription.php" class="item selected">ADD INSCRIPTION</a>
        <div class="seperator"></div>
        </div>
        <a href="../../Front Office/user_management/logout.php" class="btn-reserve" style="color: black;">Log Out</a>
      </div>
      <div class="view">
        <div class="sub-title">HEJER'S PANEL</div>
        <div class="main-title">Ajouter Inscription</div>
        <div class="seperator"></div>

        <form action="" method="POST">
            <div>
              <label for="user">User:</label>
        
                <select id="user" name="user">
                <?php
                  if (empty($user)) {
                echo "<option>No users found.</option>";
                  } else {
                    foreach ($user as $u) {
                      echo "<option value='" . $u['user_id'] . "'>" . $u['first_name'] . "</option>";
                    }
                  }
                ?>
                </select>
            </div>
            <div>
                  <label for="cours">Cours:</label>
                  <select id="cours" name="cours">
                      <?php
                      if (empty($cours)) {
                          echo "<option>No cours found.</option>";
                      } else {
                              foreach ($cours as $c) {
                                  echo "<option value='" . $c['id_cours'] . "'>" . $c['nom_cours'] . "</option>";
                      }
                      }
                      ?>
                  </select>
            </div>
            <div>
                  <label for="periode">Periode:</label>
                  <select id="periode" name="periode">
                  <?php
                      if (empty($periode)) {
                          echo "<option>No periode found.</option>";
                      } else {
                              foreach ($periode as $p) {
                                      echo "<option value='" . $p['id_periode'] . "'>" . $p['longueur'] . "</option>";
                      }
                      }
                      ?>
                  </select>
            </div>
            <div>
              <label for="emploi">schedule:</label>
        
                <select id="emploi" name="emploi">
                <?php
                  if (empty($emploi)) {
                echo "<option>No emploi found.</option>";
                  } else {
                    foreach ($emploi as $u) {
                      echo "<option value='" . $u['idemploi'] . "'>" . $u['idemploi'] . "</option>";
                    }
                  }
                ?>
                </select>
            </div>
            <div>
              <label for="class">classe:</label>
        
                <select id="classe" name="classe">
                <?php
                  if (empty($class)) {
                echo "<option>No emploi found.</option>";
                  } else {
                    foreach ($class as $u) {
                      echo "<option value='" . $u['idclasse'] . "'>" . $u['nomclasse'] . "</option>";
                    }
                  }
                ?>
                </select>
            </div>
                  <div>
                      <input type="submit" value="Save">
                
                      <input type="reset" value="Reset">
                    </div>
        


    </form>
      </div>
    </div>
  </div>
</body>
<!-- partial -->
  <script  src="./script.js"></script>
  

</body>
</html>
