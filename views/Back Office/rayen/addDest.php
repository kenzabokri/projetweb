<?php

include '../../../model/rayen/destination2.php';
include '../../../controller/rayen/destinationC.php';

$error = "";


$d = null;


$destC = new destinationC();


if (
    isset($_POST["destination"]) 
) {
    if (
        !empty($_POST['destination']) 
    ) {
        $d = new dest(
            null,
            $_POST['destination']
        );
        $destC->addDestination($d);

        
        header("location:listDest.php");
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
        <a href="addDon.php" class="item ">ADD DONS</a>
        <div class="seperator"></div>
        <a href="listDest.php" class="item ">Destination</a>
        <div class="seperator"></div>
        <a href="addDest.php" class="item  selected">ADD DES</a>
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
        <div class="main-title"> Add Destination</div>
        <div class="seperator"></div>

        

        <form action="" method="POST"  onsubmit="return validateForm();">
        
              <div>
                <label for="nom">dest:</label>
                <input type="text" id="dest" name="destination" />
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
        // Récupérez la valeur de la destination
        var destination = document.getElementById("dest").value;

        // Vérifiez si la destination est une chaîne de caractères
        if (!isNaN(destination)) {
            alert("La destination doit être une chaîne de caractères");
            return false;
        }
        // Si tout est valide, retournez true pour soumettre le formulaire
        return true;
    }
</script>
</body>
</html>
