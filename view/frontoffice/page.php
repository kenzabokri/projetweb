<?php
require '../../config.php';
$sql = "SELECT * FROM categories";
$db = config::getConnexion();
 
try {
    $imageList = $db->query($sql);
} catch (Exception $e) {
    die('Error:' . $e->getMessage());
}
$sql = "SELECT * FROM cours";
$db = config::getConnexion();
 
try {
    $cours = $db->query($sql);
} catch (Exception $e) {
    die('Error:' . $e->getMessage());
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
    <a href="#" class="logo"><img src="./image/logo_2.png" alt=""></a>
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
        <li><a href="#Oeuvres" onclick="toggleMenu();">Art Pieces</a></li>
        <li><a href="#signup" onclick="toggleMenu();">signUp</a></li>
        <a href="#login" class="btn-reserve"onclick="toggleMenu();">Login</a>
    </ul>
</header>
<section class="banniere" id="banniere">
    <div class="contenu">
        <h2>Welcome to our courses where you will find a variety of art-therapy sessions </h2>
    </div>
</section>

<section class="cours" id="cours">
    <div class="row">
        <div class="col50">
            <div class="image-slideshow">
                <div class="image fade">
                <img src="./image/dense.jpg" >
                </div>        
                <div class="image fade">
                <img src="./image/dessin.jpg" >
                </div>        
                <div class="image fade">
                <img src="./image/draw.png" >
                </div>
              </div>
        </div>
    </div>
</section>

<!-- debut dont touch -->
<section class="contact" id="contac">
    <div class="contactform"> 
        <div class="inputboite" style="text-align: center;"> <!-- Add text-align: center; style -->
            <div class="col50">
                <h2 class="titre-texte"><span>O</span>ur lessons</h2>
            </div>

            <?php
                if ($imageList->rowCount() > 0) {
                    $imageList = $imageList->fetchAll(PDO::FETCH_ASSOC);

                    foreach ($imageList as $image) {
                        echo "&nbsp;&nbsp;&nbsp;&nbsp;";
                        echo "<hr>"; 
                        echo "<hr>";
                        echo "<hr>"; 
                        echo "&nbsp;&nbsp;&nbsp;&nbsp;";
                        echo "<button class='btn-reserve' id='submit-btn'>{$image['nom_cat']}</button>";
                        echo "<img src='./image/{$image['url_cat']}' alt='Image'>";
                        
                        // Filter courses based on the current category
                        $filteredCourses = array_filter($cours->fetchAll(PDO::FETCH_ASSOC), function ($course) use ($image) {
                            return $course['categorie'] == $image['id_cat'];
                        });

                        // Display courses for the current category
                        foreach ($filteredCourses as $course) {
                            echo "<hr>";
                            echo "&nbsp;&nbsp;&nbsp;&nbsp;";
                            echo "<button class='btn-reserve' id='submit-btn1'>{$course['nom_cours']} - {$course['prix_cours']} DT</button>";
                            
                            echo "&nbsp;&nbsp;&nbsp;&nbsp;";
                        }
                    }
                } else {
                    echo "<p>No data available.</p>";
                }
            ?>         
        </div>
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
 <script src="./dossier css et js/main.js"></script>
</body>
</html>
<script>
    function redirectToSignUpPage() {
        // Change the URL to the path of your "cours_inscri.html" file
        window.location.href ='./cours_inscri.html';
    }
</script>
<!-- end dont touch -->



