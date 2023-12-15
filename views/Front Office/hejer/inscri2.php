<?php
session_start();
include '../../../controller/hejer/inscriptionC.php';
include "../../../model/hejer/inscription2.php";
include "../../../controller/user_management/user_control.php";
require '../../../config.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

$db=config::getConnexion();
$res=User_control::show_users($db);
$ins = null;
$resultat = null;

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
            $periode_id = $_POST["periode"];
            $cours_id = $_POST["cours"];
            echo'hejer';
            try {
                // Get the number of periods
                $periode_query = "SELECT nb_seance FROM periode WHERE id_periode = :periode_id";
                $periode_statement = $db->prepare($periode_query);
                $periode_statement->execute(['periode_id' => $periode_id]);
                $periode_result = $periode_statement->fetch(PDO::FETCH_ASSOC);
                $nb = $periode_result['nb_seance'];

                // Get the price of the course
                $cours_query = "SELECT prix_cours FROM cours WHERE id_cours = :cours_id";
                $cours_statement = $db->prepare($cours_query);
                $cours_statement->execute(['cours_id' => $cours_id]);
                $cours_result = $cours_statement->fetch(PDO::FETCH_ASSOC);
                $prix_cours = $cours_result['prix_cours'];
                 // Debug: Print values for verification
                 echo "nb: $nb, prix_cours: $prix_cours";

                // Calculate the total
                $resultat = $nb * $prix_cours;

                // Insert into the database
                $sql = "INSERT INTO inscription VALUES (NULL, :user, :cours, :periode)";
                $query = $db->prepare($sql);
                $query->execute([
                    'user' => $id,
                    'cours' => $_POST['cours'],
                    'periode' => $_POST['periode']
                ]);

                header('location: page.php');
            } catch (Exception $e) {
                die('Error: ' . $e->getMessage());
            }
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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./dossier css et js/style.css">
    <link rel="stylesheet" href="./dossier css et js/icon.css">
    <link rel = "preconnect" href = "https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>ART THERAPY</title>
<body>
<header>
    <a href="page.php" class="logo"><img src="./image/logo_2.png" alt=""></a>
    <div class="menuToggle" onclick="toggleMenu();"></div>
    <ul class="navbar">
    
    </ul>
</header>
            
            
    <form action="#" method="POST"  class="contactform" onsubmit="return validateForm()">
        <div class="col50">
                <h2 class="titre-texte"><span>S</span>ing up for a course</h2>
            </div>
        <h3>Nombre de séance</h3>
        <div class="inputboite">
        <select class="budget" name="periode" >
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
        </div>

        <h3>Cours</h3>
        <div class="inputboite">
        <select class="budget" name="cours" >
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
        </div>
        <div class="inputboite">
            <label> Total : </label>
            <span id="resultat"><?php echo $resultat; ?></span>
                </div>
        <div class="inputboite">
            <div class="g-recaptcha" data-sitekey="6LfU9iYpAAAAADOOSz5hnO0pEkhW5m-68qDNa4VP"></div>
            <button class="btn-reserve" id="submit-btn1" onclick="return validateForm()">Add </button>
        </div>
        </form>
    <div class="single-footer">
</div>
<?php echo $resultat; ?>
<script type="text/javascript">
    window.addEventListener('scroll', function () {
        const header = document.querySelector('header');
        header.classList.toggle("sticky", window.scrollY > 0);
    });

    function toggleMenu() {
        const tmenuToggle = document.querySelector('.menuToggle');
        const navbar = document.querySelector('.navbar');
        navbar.classList.toggle('active');
        menuToggle.classList.toggle('active');
    }
</script>


 <script src="./dossier css et js/main.js"></script>
 <script>
    function updateResult(result) {
        document.getElementById("resultat").innerText = result;
    }
</script>
</body>
</html>

   