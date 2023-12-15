<?php
session_start();
include '../../controller/rayen/donC.php';
require('../../config2.php');
$db = config::getConnexion();
$query = "SELECT * FROM temoignages ORDER BY id_tem DESC LIMIT 3";
$res = $db->query($query);

$query1 = "SELECT * FROM oeuvre ORDER BY id_oeuvre DESC LIMIT 4";
$res1 = $db->query($query1);

$query2 = "SELECT * FROM events ORDER BY idevent DESC LIMIT 1";
$res2 = $db->query($query2);

$query3 = "SELECT * FROM categories";
$imageList = $db->query($query3);

$donC = new donC();
$destination = $donC->getDest();
if(isset($_SESSION['id'])){

    $role=$_SESSION['role'];
    $id=$_SESSION['id'];
    if($role=="PATIENT"){
        $url="./user_management/patient_panel.php?id=$id&role=PATIENT";
    }
    elseif($role=="ART THERAPIST"){
        $url="./user_management/artTherapist_panel.php?id=$id&role=ART THERAPIST";
    }
    elseif($role=="UserAdmin"){
        $url="..\Back Office\user_management\admin.php?id=$id&role=Administrator";
    }
    elseif($role=="LessionsAdmin"){
        $url="../Back Office/hejer/mainGestionCat.php?id=$id&role=LessionsAdmin";
    }
    elseif($role=="artpiecesAdmin"){
        $url="../Back Office/oeuvre_mana/gestionOeuvre.php?id=$id&role=artpiecesAdmin";
    }
    elseif($role=="DonAdmin"){
        $url="../Back Office/rayen/listDon.php?id=$id&role=artpiecesAdmin";
    }
    elseif($role=="EventAdmin"){
        $url="../Back Office/kenza/back.php?id=$id&role=artpiecesAdmin";
    }
    elseif($role=="EmploiAdmin"){
        $url="../Back Office/amine/mainGestionCat.php?id=$id&role=artpiecesAdmin";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../assets/style.css">
        <link rel="stylesheet" href="./style_event.css">
        <link rel="stylesheet" href="../assets/icofont.css">
        <link rel="stylesheet" href="C:\xampp\htdocs\Ajax - Copy\views\Front Office\hejer\style.css">
        <link rel = "preconnect" href = "https://fonts.gstatic.com">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="./style.css">
        <script  >
            function add_rec(){
                $(document).ready(function(){
                    var first_name=document.getElementById('first_name').value;
                    var email=document.getElementById('email').value;
                    var message=document.getElementById('message').value;
                    $("#content").load("./user_management/AddRec.php",{
                        first_name: first_name,
                        email: email,
                        message: message
                    });
                });
            }
            function comment(){
                $(document).ready(function(){
                    $("#temoignage").load("./user_management/comments.php");
                });
            }
            function eventP(){
                $(document).ready(function(){
                    $("#hejer").load("./kenza/addformulaire.php");
                });
            }
        </script>
        <title>ART THERAPY</title>
    </head>   


    <body>
        
    <header class="sticky" >

        <a href="#" class="logo"><img src="../images/logo_2.png" alt=""></a>
        <div class="menuToggle" ></div>
        <ul class="navbar">
            <li><a href="#banniere" >Home</a></li>
            <li><a href="#apropos" >About</a></li>
            <li><a href="#menu" >Lessons</a></li>
            <li><a href="#event" >Events</a></li>
            <li><a href="#expert" >Our Art thearpists</a></li>
            <li><a href="#temoignage" >Comments</a></li>
            <li><a href="#contact" >Contact</a></li>
            <li><a href="#donation" >Donation</a></li>
            <li><a href="#Oeuvres" >Art Pieces</a></li>
            <a href="./user_management/register.php" class="btn-reserve" id='log'>Login</a>
            <a href="./user_management/register.php" class="btn-reserve" id='sign'>SignUp</a>
            <a href="<?php echo $url?>" class="btn-reserve" id='pro'>profile</a>
        </ul>
        <script>
            <?php
            if(isset($_SESSION['email'])){
            ?>
                var hide1 = document.getElementById('log');
                var hide2 = document.getElementById('sign');
                var hide3 = document.getElementById('pro');
                hide1.style.display = 'none';
                hide2.style.display = 'none';
                hide3.style.display = 'inline';
                console.log("User is logged in");
            <?php
            }
            else{
            ?>
                var hide1 = document.getElementById('log');
                var hide2 = document.getElementById('sign');
                var hide3 = document.getElementById('pro');
                hide1.style.display = 'inline';
                hide2.style.display = 'inline';
                hide3.style.display = 'none';
                console.log("User is not logged in");
            <?php    
            }
            ?>
        </script>
        <script>
            <?php
                if ($_GET['add'] == 5) {    
                    $jsCode = "document.getElementById('mess').innerHTML='<p style=\"color: green;font-size:30px;background-color: #f0f0f0;\">donation affected successfully</p>';";
                } else {
                    $jsCode = ""; // No action if the condition is not met
                }
            ?>
        </script>
    </header>
    <section class="banniere" id="banniere">
        <div class="contenu">
        <div  id="mess">
            <script>
                <?php echo $jsCode; ?>
            </script>
        </div>
            <h2>Discover the transformative power of creativity, healing, and self-expression through the art of therapy</h2>
        </div>
    </section>
    <?php 
        foreach($res2 as $t){
            $img=$t['image'];
            $nomevent=$t['nomevent'];
            $description=$t['description'];
            $date=$t['date'];
            $heuredebut=$t['heuredebut'];
            $heurefin=$t['heurefin'];
            $capacite=$t['capacite'];
            $lieu=$t['lieu'];
        }
    ?>
    <ul class="circles">
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>
    <section id="event" class='section'>
        
    <div class="contentt" id='hejer'>
            <div class="info">
                <div style="color: aliceblu;" >
                    Welcome to our event <?php echo  $nomevent?> where <?php echo  $description?> on <?php echo$date?>
                    from <?php echo $heuredebut?>PM to <?php echo $heurefin?>PM
                    and it includes <?php echo$capacite?> people in <?php echo $lieu?>        
                </div>
            
                                
                            
                                <button class="btn" onclick="eventP()" >Participate</button>
            </div>
            <div class="swiperr">
            <div class="swiper-wrapper">
                
                <div class="swiper-slide">
                <span>The event</span>
                
                </div>
                <img src="<?php echo$img?>" alt="Oeuvres1" height="380px" >
            </div>
        </div>

    </div>
    
    <ul class="circles">
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>
    </section>

    <section class="apropos" id="apropos">
        <div class="row">
            <div class="col50">
                <h2 class="titre-texte"><span>A</span>bout us</h2>
                <p>At HealArt, we are driven by a profound belief in the healing power of art. Our mission is clear: to transform lives and promote wellness through the therapeutic use of diverse art forms. We are not just an institute; we are a passionate community of dedicated art therapists, artists, and individuals who have witnessed the remarkable impact of art on the healing journey.</p>
            </div>
            <div class="col50">
                <div class="image-slideshow">
                    <div class="image fade">
                        <img src="../images/dense.jpg" >
                    </div>        
                </div>
            </div>
        </div>
    </section>
    <section class="menu" id="menu">
    <div class="col50">
                    <h2 class="titre-texte"><span>O</span>ur lessons</h2>
                </div>
                <article class="gallery">
        <?php
        if ($imageList->rowCount() > 0) {
            $imageList = $imageList->fetchAll(PDO::FETCH_ASSOC);

            foreach ($imageList as $image) {
                echo "<div class='image-container'>";
                echo "<img src='./hejer/image/{$image['url_cat']}' alt='Image'>";
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
    </section>
    <section class="expert" id="expert">
        <div class="titre">
            <h2 class="titre-texte">Our <span>A</span>rt therapist</h2>
            <p>More than 15 years of experience and close to 1000 patients treated and more to come...</p>
        </div>
        <div class="contenu">
            <div class="box">
                <div class="imbox">
                    <img src="../images/bechir.jpg" alt="">
                </div>
                <div class="text">
                    <h3>Bechir</h3>
                </div>
            </div>
            <div class="box">
                <div class="imbox">
                    <img src="../images/rayen.jpg" alt="">
                </div>
                <div class="text">
                    <h3>Rayen</h3>
                </div>
            </div>
            <div class="box">
                <div class="imbox">
                    <img src="../images/yassine.jpg" alt="">
                </div>
                <div class="text">
                    <h3>Yassine</h3>
                </div>
            </div>
            <div class="box">
                <div class="imbox">
                    <img src="../images/hejer.jpg" alt="">
                </div>
                <div class="text">
                    <h3>hajer</h3>
                </div>
            </div>
        </div>
    </div>
    </section>
    <section class="temoignage" id="temoignage">
        <div class="titre blanc">
            <h2 class="titre-texte">What our <span>P</span>atients point of vue</h2>
        </div>
        <div class="contenu" id="comment">
            <?php
                foreach($res as $t){
            ?>
                <div class="box">

                    <div class="text">
                        <p><?php echo$t['message'];?></p>
                        <h3><?php echo$t['first_name']." ".$t['last_name'] ?></h3>
                    </div>
                </div>
            <?php
            }
            ?>
            
            
            <div><button class="btn-reserve" onclick="comment()" >add comment</button></div>
        </div>
        
    </section>

    <section class="expert" id="Oeuvres">
        <div class="titre">
            <h2 class="titre-texte">Our <span>A</span>rt Pieces</h2>
            <p>Here's just a glimpse of our clients's Work</p>
        </div>
        <div class="contenu">
        <?php
        foreach ($res1 as $t) {
            $query2 = "SELECT * FROM users";
            $res2 = $db->query($query2);
            foreach ($res2 as $t1) {
                if ($t1['user_id'] == $t['user']) {
                    $first_name = $t1['first_name'];
                    $last_name = $t1['last_name'];
                }
            }
        ?>
            <div class="box">
                <div class="imbox">
                    <img src="<?php echo$t['url']?>" alt="Oeuvres1">
                </div>
                <div class="text">
                    <h3>
                        <div>Nom : <?php echo $first_name ?></div>
                        <div>Prenom : <?php echo $last_name ?></div>
                        <div>Ref : <?php echo $t['id_oeuvre'] ?></div>
                    </h3>
                </div>
            </div>
        <?php } ?>
    </div>

    </section>


    <section id="contact" style="background-color: aliceblue;" >
        <div class="titre blanc">
            <h2 class="titre-text"><span>C</span>ontact</h2>
            <p>Contact us anytime</p>
        </div>
        <div class="contactform">
            <h3>Send a message</h3>
            <div class="inputboite">
                <input type="text" placeholder="Name" id="first_name" >
            </div>
            <div class="inputboite">
                <input type="text" placeholder="email" id="email" >
            </div>
            <div class="inputboite">
                <textarea placeholder="message" id="message" ></textarea>
            </div>
            <div class="inputboite">
                <button class="btn-reserve" id="" onclick="validateForm()" >Send</button>
            </div>
            <div id="erreur" style="color: red;"></div>
            <div id='content' style="color: green;"></div>
            <a href="https://www.facebook.com/profile.php?id=61553485674898" target="_blank" class="fa fa-facebook">acebook</a>
            
            <!-- Social -->
            <div class="fa">
            
            
            </div>
        
            <!-- End Social -->
        </div>
    </section>





    <section id="donation"  style="background-color: aliceblue;">
        <div class="titre noir">
            <h2 class="titre-text"><span>D</span>onation</h2>
        </div>
        <div class="contactform">
            <h3>Donate</h3>
            <form action="./rayen/donation.php" method="post"  onsubmit="return validateForm1();" >
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

</body>
<script>
    function validateForm() {
        var firstName = document.getElementById('first_name').value;
        var email = document.getElementById('email').value;
        var message = document.getElementById('message').value;

        // Check if required fields are empty
        if (firstName.trim() === '' || email.trim() === '' || message.trim() === '') {
            document.getElementById('erreur').innerHTML="Veuillez remplir tous les champs obligatoires.";
            return false; // Prevent form submission
        }

        // Email validation using a regular expression
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            document.getElementById('erreur').innerHTML="Veuillez saisir une adresse e-mail valide.";
            return false; // Prevent form submission
        }

        // If all validations pass, the form will be submitted
        add_rec();
        return true;
        
    }
</script>
<script>
    function validateForm1() {
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
<script src='https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.4.5/swiper-bundle.min.js'></script><script  src="./js_event.js"></script>

</html>