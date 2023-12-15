<?php

include '../../../controller/rayen/donC.php';
include '../../../model/rayen/don2.php';

$error = "";


$d = null;


$donC = new donC();
$destination = $donC->getDest();


if (
    isset($_POST["Montant"]) &&
    isset($_POST["destination"]) &&
    isset($_POST["description"]) 
) {
    if (
        !empty($_POST['Montant']) &&
        !empty($_POST['destination']) &&
        !empty($_POST["description"]) 
    ) {
        $d = new dons(
            null,
            $_POST['Montant'],
            $_POST['destination'],
            $_POST['description']
        );
        $destination = $donC->getDest();
        $donC->addDons($d);

        
        header("location:listDon.php");
        exit();
    } else {
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
        <a href="addDon.php" class="item selected">ADD DONS</a>
        <div class="seperator"></div>
        <a href="listDest.php" class="item ">Destination</a>
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
        <div class="main-title">Add DONS</div>
        <div class="seperator"></div>

        

        <form action="" method="POST" onsubmit="return validateForm();">
        <div>
        <label for="categorie">Destination:</label>
  
          <select id="destination" name="destination">
          <?php
            if (empty($destination)) {
           echo "<option>No des found.</option>";
            } else {
              foreach ($destination as $d) {
                echo "<option value='" . $d['id_Dest'] . "'>" . $d['destination'] . "</option>";
              }
             }
          ?>
          </select>
        </div>
              <div>
                <label for="nom">Montant :</label>
                
                <input type="text" id="man" name="Montant">
               
              </div>
              <div>
                <label for="prenom">description :</label>
                <input type="text" id="desc" name="description" />
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
  <script>
    function validateForm() {
        // Récupérez la valeur du montant
        var montant = document.getElementById("man").value;

        // Vérifiez si le montant est un nombre
        if (isNaN(montant) || montant === "") {
            alert("Le montant doit être un nombre");
            return false;
        }
        // Si tout est valide, retournez true pour soumettre le formulaire
        return true;
    }
</script>

</body>
</html>
