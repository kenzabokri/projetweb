<?php
session_start();
include '../../../controller/hejer/inscriptionC.php';
include "../../../model/hejer/inscription2.php";
include "../../../controller/user_management/user_control.php";
require '../../../config.php';

$db=config::getConnexion();
$res=User_control::show_users($db);
$ins = null;

$coursC = new InscriptionC();
$cours = $coursC->listCours();

$id=$_SESSION['id'];

$periodeC = new InscriptionC();  // Fix: Use the correct object
$periode = $periodeC->listPeriode();  // Fix: Use the correct object


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    if (
        isset($_POST["cours"]) &&
        isset($_POST["periode"])
    ) {
        if (
            !empty($_POST['cours']) &&
            !empty($_POST["periode"])
        ) {
            $sql = "INSERT INTO inscription VALUES (NULL, :user, :cours, :periode)";

            $query = $db->prepare($sql);
            $query->execute([
              'user' => $id,
              'cours' => $_POST['cours'],
              'periode' => $_POST['periode']
            ]);
              header('location: page.php');
     
        }
    }
}

if (isset($_POST["g-recaptcha-response"]) && !empty($_POST["g-recaptcha-response"])) {
  $recaptchaResponse = $_POST["g-recaptcha-response"];
  $secretKey = "6LfU9iYpAAAAAL1rmn03_wsGS-7iTV_DSErH_Ocd"; // Replace with your actual reCAPTCHA secret key

  $recaptchaUrl = "https://www.google.com/recaptcha/api/siteverify";
  $recaptchaData = [
      'secret' => $secretKey,
      'response' => $recaptchaResponse,
  ];

  $recaptchaOptions = [
      'http' => [
          'method' => 'POST',
          'header' => 'Content-type: application/x-www-form-urlencoded',
          'content' => http_build_query($recaptchaData),
      ],
  ];

  $recaptchaContext = stream_context_create($recaptchaOptions);
  $recaptchaResult = json_decode(file_get_contents($recaptchaUrl, false, $recaptchaContext));

  if (!$recaptchaResult->success) {
      $error = "reCAPTCHA verification failed";
  } else {
      // Proceed with the rest of your form processing
      // ...
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
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>
<!-- partial:index.partial.html -->


<form action="./inscri_form.php" method="POST" class="vue-form" onsubmit="return validateForm()">

    
  <fieldset>
  
      <h4>Periode </h4>
      <p class="select" >
        <select class="budget" name="periode" onchange="updatePaymentAmount()" >
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
        <select class="budget" name="cours" onchange="updatePaymentAmount()">
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




    <div>
    <div class="g-recaptcha" data-sitekey="6LfU9iYpAAAAADOOSz5hnO0pEkhW5m-68qDNa4VP"></div>
    <input type="submit" class="your-button-style" onclick="return validateForm()" value="Sign Up">
    </div>

  </fieldset>
</form>



</body>
</html>