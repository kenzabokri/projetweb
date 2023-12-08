<?php
include '../../controller/donC.php';
include '../../model/don2.php';

$error = "";


$d = null;


$donC = new donC();
$destination = $donC->getDest();

// ... (your existing code)

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
        $donC->addDons($d);

        // Retrieve the values from the added donation for redirection
        $Montant = $_POST["Montant"];
        $destination = $_POST["destination"];
        $description = $_POST["description"];

        header("location:tabDons.php?Montant=" . urlencode($Montant) . "&destination=" . urlencode($destination) . "&description=" . urlencode($description));
        exit();
    } else {
        $error = "Missing information";
    }
}
?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="icofont.css">
    <link rel = "preconnect" href = "https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>ART THERAPY</title>
<body>
<header>
    <a href="#" class="logo"><img src="./images/logo_2.png" alt=""></a>
    <div class="menuToggle" onclick="toggleMenu();"></div>
    <ul class="navbar">
        <li><a href="#banniere" onclick="toggleMenu();">Home</a></li>
        <li><a href="#apropos" onclick="toggleMenu();">About</a></li>
        <li><a href="#menu" onclick="toggleMenu();">Lessons</a></li>
        <li><a href="#event" onclick="toggleMenu();">Events</a></li>
        <li><a href="#expert" onclick="toggleMenu();">Our Art thearpists</a></li>
        <li><a href="#temoignage" onclick="toggleMenu();">Temoignage</a></li>
        <li><a href="#contact" onclick="toggleMenu();">Contact</a></li>
        <li><a href="#donation" onclick="toggleMenu();">Donation</a></li>
        <li><a href="#signup" onclick="toggleMenu();">signUp</a></li>
        <a href="#login" class="btn-reserve"onclick="toggleMenu();">Login</a>
    </ul>
</header>



<section class="login" id="donation">
    <div class="titre noir">
        <h2 class="titre-text"><span>D</span>onation</h2>
    </div>
    <div class="contactform">
        <h3>Donate</h3>
        <form action="" method="post"  onsubmit="return validateForm();" >
            <div class="inputboite">
                <input type="text" placeholder="Montant $$" id="man" name="Montant">
            </div>
            <div>
                <h3>Destination</h3>
                <select id="dest" name="destination">
          <?php
            if (empty($destination)) {
           echo "<option>No destination found.</option>";
            } else {
              foreach ($destination as $category) {
                echo "<option value='" . $category['id_Dest'] . "'>" . $category['destination'] . "</option>";
              }
             }
          ?>
          </select>
            </div>
            <h3>Description</h3>
            <textarea name="description" id="desc" cols="60" rows="5" placeholder="Message"></textarea>
            <br>
            <div class="inputboite">
                <button class="btn-reserve" id="submit-btn1" type="submit" name="submit">Donate</button>
            </div>
        </form>
    </div>
</section>


<div class="single-footer">
</div>
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