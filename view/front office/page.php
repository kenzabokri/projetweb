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

    <div class="search-container">
    <input type="text" id="search-input" placeholder="Search...">
    <button type="button" id="search-button">Search</button>
</div>
    <ul class="navbar">
    <a href="./inscri_form.php" class="btn1">Ajouter un cours au panier</a>
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
                        
                        // Fetch and display courses for the current category
                        $coursesSql = "SELECT * FROM cours WHERE categorie = :id_cat";
                        $coursesQuery = $db->prepare($coursesSql);
                        $coursesQuery->bindParam(':id_cat', $image['id_cat']);
                        $coursesQuery->execute();
                        $courses = $coursesQuery->fetchAll(PDO::FETCH_ASSOC);
    
                        foreach ($courses as $course) {
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



