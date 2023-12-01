<?php

include '../../controller/inscriptionC.php';
include "../../model/inscription2.php";
$ins = null;

$coursC = new InscriptionC();
$cours = $coursC->listCours();

$userC = new InscriptionC();
$user = $userC->listUser();

$periodeC = new InscriptionC();  // Fix: Use the correct object
$periode = $periodeC->listPeriode();  // Fix: Use the correct object

// Check for successful payment
var_dump($_POST);
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    var_dump($_POST);
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
            echo "heeeeejer";
            var_dump($_POST);

            // Cast $_POST['cours'] to an integer
            $coursValue = (int)$_POST['cours'];

            $ins = new Inscri(
                null,
                $_POST['user'],
                $coursValue,
                $_POST['periode']
            );

            $coursC->addInscription($ins);
            header('location: page.php');
        } else {
            $error = "Missing information";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>SIGN UP for a course</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
<link rel="stylesheet" href="./styleinscri.css">

</head>
<body>
<!-- partial:index.partial.html -->


<form action="./inscri_form.php" method="POST" class="vue-form" onsubmit="return validateForm()">

    
  <fieldset>
    <div>
      <h4>Patient Username</h4>
      <p class="select">
        <select class="budget"  name="user">
          <?php
            if ($user->rowCount() > 0) {
              // Il y a des résultats
              foreach ($user as $row) {
                echo "<option value='" . $row['id_user'] . "'>" . $row['username'] . "</option>";
                
              }
            } else {
                echo "<option value=''>Aucun utilisateur trouvé</option>";
            }
          ?>
        </select>
      </p>
    </div>


      <h4>Periode </h4>
      <p class="select" >
        <select class="budget" name="periode">
          <?php
            if ($periode->rowCount() > 0) {
            // Il y a des résultats
              foreach ($periode as $rows) {
                echo "<option value='" . $rows['id_periode'] . "'>" . $rows['longueur'] . "</option>";
              }
            } else {
              echo "<option value=''>Aucune periode trouvé</option>";
            }
         ?>
        </select>
      </p>
    </div>




   <div>
    <h4>Cours</h4>
    <p class="select">
        <select class="budget" name="cours">
            <?php
            if (empty($cours)) {
                echo "<option value=''>No cours found</option>";
            } else {
                foreach ($cours as $course) {
                    echo "<option value='{$course['id_cours']}'>{$course['nom_cours']} - {$course['prix_cours']} DT</option>";
                }
            }
            ?>
        </select>
    </p>
</div>




    <h4>Les frais vont etre concidérés selon la periode choisie </h4>
    <div class="payment-section">
      <h2>Payment Information</h2>

      <div>
        <label for="cardholderName">Cardholder's Name</label>
        <input type="text" id="cardholderName" v-model="payment.cardholderName" placeholder="Enter the full name as it appears on the card">
      </div>

      <div>
        <label for="cardNumber">Card Number</label>
        <input type="text" id="cardNumber" v-model="payment.cardNumber" placeholder="Enter the 16-digit card number">
      </div>

      <div>
        <label for="expirationDate">Expiration Date</label>
        <input type="date" id="expirationDate" v-model="payment.expirationDate">
      </div>

      <div>
        <label for="cvv">CVV</label>
        <input type="password" id="cvv" v-model="payment.cvv" placeholder="Enter the 3 or 4-digit security code">
      </div>
    </div>

    <div>
    <input type="submit" class="your-button-style" onclick="return validateForm()" value="Sign Up">
    </div>

  </fieldset>
</form>

 <script>
    function validateForm() {
        // Validation du choix du cours

        // Validation du nom de la carte sans chiffre
        const cardholderName = document.getElementById('cardholderName').value;
        if (/\d/.test(cardholderName)) {
            alert('Le nom de la carte ne doit pas contenir de chiffres.');
            return false; // Prevent form submission
        }

        // Validation du card number (16 chiffres)
        const cardNumber = document.getElementById('cardNumber').value;
        if (!/^\d{16}$/.test(cardNumber)) {
            alert('Le numéro de carte doit être composé de 16 chiffres.');
            return false; // Prevent form submission
        }

        // Validation de la date d'expiration (1er janvier ou ultérieur)
        const expirationDate = document.getElementById('expirationDate').value;
        const currentDate = new Date();
        const inputDate = new Date(expirationDate + 'T00:00:00');
        if (inputDate <= currentDate) {
            alert('La date d\'expiration doit être ultérieure à la date actuelle.');
            return false; // Prevent form submission
        }

        // Validation du CVV (3 à 4 chiffres)
        const cvv = document.getElementById('cvv').value;
        if (!/^\d{3,4}$/.test(cvv)) {
            alert('Le CVV doit être composé de 3 à 4 chiffres.');
            return false; // Prevent form submission
        }

        // If all validations pass, allow the form to submit
        return true;
    }
</script> 

</body>
</html>