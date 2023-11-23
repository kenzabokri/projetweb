<?php
require("../../config.php");
$pdo=config::getConnexion();

$query1 = $pdo->prepare("SELECT * FROM images");
$query1->execute(); 
$results = $query1->fetchAll(PDO::FETCH_ASSOC);
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
        <li><a href="#Oeuvres" onclick="toggleMenu();">Oeuvres</a></li>
        <li><a href="#contact" onclick="toggleMenu();">Contact</a></li>
        <li><a href="#donation" onclick="toggleMenu();">Donation</a></li>
        <li><a href="#signup" onclick="toggleMenu();">SignUp</a></li>
        <a href="#login" class="btn-reserve"onclick="toggleMenu();">Login</a>
    </ul>
</header>
<section class="banniere" id="banniere">
    <div class="contenu">
        <h2>Discover the transformative power of creativity, healing, and self-expression through the art of therapy.</h2>
    </div>
</section>


 <section>
    <div class="Oeuvres" id="Oeuvres">
      <div class="container">
        <div class="titre">
            <h2 class="titre-texte">Our <span>A</span>rt Pieces</h2>
            <p>Here's just a glimpse of our clients's Work</p>
        </div>
            <table>
                <tr>
                    <?php
                    foreach($results as $t){
                            $pat=$t['patient'];
                            $query2=$pdo->prepare("select nom from patient where ID_Pat='$pat'");
                            $res=$query2->execute();
                            
                            
                        echo '
                        <th>
                            <div class="imbox">
                            <img src="'.$t['path'].'" alt="Picture 1">
                            <p>Nom : '.$res.'</p>
                            <p>Ref :2 </p>
                            <p>Categorie :'.$t['categorie'].'</p>
                            </div>
                        </th> ';
                    }
                    ?>
                    
                              
                </tr>
            </table>
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
 <script src="main.js"></script>
</body>
</html>