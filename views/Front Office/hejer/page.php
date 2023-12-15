<?php
session_start();
require '../../../config.php';
include '../../../controller/hejer/inscriptionC.php';
include "../../../model/hejer/inscription2.php";
include "../../../controller/user_management/user_control.php";
$sql = "SELECT * FROM categories";
$db = config::getConnexion();

try {
    $imageList = $db->query($sql);
} catch (Exception $e) {
    die('Error:' . $e->getMessage());
}

$sql = "SELECT * FROM cours";
try {
    $cours = $db->query($sql);
} catch (Exception $e) {
    die('Error:' . $e->getMessage());
}
if(isset($_SESSION['id'])){

    $role=$_SESSION['role'];
    $id=$_SESSION['id'];
    $url="../user_management/patient_panel.php?id=$id&role=$role";
  
  
}


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
                $resultat = $nb * (float)$prix_cours;
                // Insert into the database
                $sql = "INSERT INTO inscription VALUES (NULL, :user, :cours, :periode,:emploi,:class)";
                $query = $db->prepare($sql);
                $query->execute([
                    'user' => $id,
                    'cours' => $_POST['cours'],
                    'periode' => $_POST['periode'],
                    'emploi' => 0,
                    'class' => 0,
                ]);

                header('location: mail.php');
                
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
    <link rel="stylesheet" href="./style.css">
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
<body  >
<header>
<a href="<?php echo $url ?>" id='submit-btn' class="btn1"> <-</a>
    <a href="#" class="logo"><img src="./image/logo_2.png" alt=""></a>
    <div class="menuToggle" onclick="toggleMenu();"></div>

   
    
    
</header>
<section id="banniere">
            <div class="col50">
                <style>
                    .titre-texte{
                        color: #040808;
                        font-size: 2em;
                        font-weight: 300px;
                        text-transform: capitalize;
                    }
                    .titre-texte span{
                        color: #fb911f;
                        font-size: 1.5em;
                        font-weight: 700px;
                    }
                </style>
                <h2 class="titre-texte"><span>O</span>ur lessons</h2>
            </div>
    <article class="gallery">
        <?php
        if ($imageList->rowCount() > 0) {
            $imageList = $imageList->fetchAll(PDO::FETCH_ASSOC);

            foreach ($imageList as $image) {
                echo "<div class='image-container'>";
                echo "<img src='./image/{$image['url_cat']}' alt='Image'>";
                echo "<div class='title'>{$image['nom_cat']}</div>";
                echo "</div>";

                // Fetch and display courses for the current category
                $coursesSql = "SELECT * FROM cours WHERE categorie = :id_cat";
                $coursesQuery = $db->prepare($coursesSql);
                $coursesQuery->bindParam(':id_cat', $image['id_cat']);
                $coursesQuery->execute();
                $courses = $coursesQuery->fetchAll(PDO::FETCH_ASSOC);
            }
        }
        ?>
    </article>
    <section>
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
            <div class="g-recaptcha" data-sitekey="6LfU9iYpAAAAADOOSz5hnO0pEkhW5m-68qDNa4VP"></div>
            <button class="btn-reserve" id="submit-btn1" onclick="return validateForm()">Add </button>
        </div>
        </form>
    </section>
</section>
 <script type="text/javascript">
     window.addEventListener('scroll', function(){
         const header =document.querySelector('header');
         header.classList.toggle("sticky", window.scrollY > 0 );
     });

     function toggleMenu(){
         const tmenuToggle = document.querySelector('.menuToggle');
         const navbar = document.querySelector('.navbar');
         navbar.classList.toggle('active');
         menuToggle.classList.toggle('active');

     }

 </script>
 <script src="./dossier css et js/main.js"></script>
</body>
</html>
<script>
    function redirectToSignUpPage() {
        // Change the URL to the path of your "cours_inscri.html" file
        window.location.href ="inscri_form.php";
    }
</script>
<style>
        
        body {
            background-color: #fff;
        }

        #search-input {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px 0 0 4px;
            outline: none;
        }

        #search-button {
            background-color: #fb911f;
            color: #fff;
            border: 1px solid #fb911f;
            padding: 10px;
            border-radius: 0 4px 4px 0;
            cursor: pointer;
            outline: none;
        }

        #search-button:hover {
            background-color: #fb911f;
        }
       .inputboite {
            overflow-x: auto;
            white-space: nowrap;
        }

        .col50 {
            display: inline-block;
        }
    </style>
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const searchInput = document.getElementById('search-input');
        const searchButton = document.getElementById('search-button');
        const sections = document.querySelectorAll('section'); // Adjust this selector based on your sections

        searchButton.addEventListener('click', function () {
            const searchTerm = searchInput.value.toLowerCase();
            let found = false;

            sections.forEach((section, index) => {
                const sectionText = section.textContent.toLowerCase();

                if (sectionText.includes(searchTerm)) {
                    found = true;
                    // Scroll to the section
                    section.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                    // Break out of the loop
                    return;
                }
            });

            if (!found) {
                alert('Information not found!');
            }
        });
    });
</script>



