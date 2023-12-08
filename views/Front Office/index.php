<?php
session_start();

if(isset($_SESSION['id'])){

    $role=$_SESSION['role'];
    $id=$_SESSION['id'];
    if($role=="PATIENT"){
        $url="patient_panel.php?id=$id&role=$role";
    }
    elseif($role=="ART THERAPIST"){
        $url="patient_panel.php?id=$id&role=$role";
    }
    elseif($role=="Administrator"){
        $url="../Back Office/admin.php?id=$id&role=$role";
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
    <link rel="stylesheet" href="../assets/icofont.css">
    <link rel = "preconnect" href = "https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script  >
        function add_rec(){
    $(document).ready(function(){
        var first_name=document.getElementById('first_name').value;
        var email=document.getElementById('email').value;
        var message=document.getElementById('message').value;
        $("#content").load("AddRec.php",{
            first_name: first_name,
            email: email,
            message: message
        });
    });
}
    </script>
    <title>ART THERAPY</title>
    


<body>
<header>
    <a href="#" class="logo"><img src="../images/logo_2.png" alt=""></a>
    <div class="menuToggle" ></div>
    <ul class="navbar">
        <li><a href="#banniere" >Home</a></li>
        <li><a href="#apropos" >About</a></li>
        <li><a href="#menu" >Lessons</a></li>
        <li><a href="#event" >Events</a></li>
        <li><a href="#expert" >Our Art thearpists</a></li>
        <li><a href="#temoignage" >Temoignage</a></li>
        <li><a href="#contact" >Contact</a></li>
        <li><a href="#donation" >Donation</a></li>
        <li><a href="#Oeuvres" >Art Pieces</a></li>
        <a href="./register.php" class="btn-reserve" id='log'>Login</a>
        <a href="./register.php" class="btn-reserve" id='sign'>SignUp</a>
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
</header>
<section class="banniere" id="banniere">
    <div class="contenu">
        <h2>Discover the transformative power of creativity, healing, and self-expression through the art of therapy</h2>
    </div>
</section>
<section id="event"> 
   <h1>Events</h1>
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
                <div class="image fade">
                <img src="../images/musiqua.jpg" >
                </div>        
                <div class="image fade">
                <img src="../images/dessin.jpg" >
                </div>
              </div>
        </div>
    </div>
</section>
<section class="menu" id="menu">
    <div class="titre">
        <h2 class="titre-texte">Lessons</h2>
    </div>
    <div class="contenu">
        <div class="box">
            <div class="imbox">
                <img src="../images/musiqua.jpg" alt="">
            </div>
            <div class="text">
                <h3>music</h3>
            </div>
        </div>
        <div class="box">
            <div class="imbox">
                <img src="../images/dessin.jpg" alt="">
            </div>
            <div class="text">
                <h3>drawing</h3>
            </div>
        </div>
        <div class="box">
            <div class="imbox">
                <img src="../images/dense.jpg" alt="">
            </div>
            <div class="text">
                <h3>dansing</h3>
            </div>
        </div>
        
    </div>
 </div>

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
    <div class="contenu">
        <div class="box">
            <div class="imbox">
                <img src="../images/t1.jpeg" alt="">
            </div>
            <div class="text">
                <p>Outstanding work, keep up the good work.</p>
                <h3>Amine</h3>
            </div>
        </div>
        <div class="box">
            <div class="imbox">
                <img src="../images/t2.jpg" alt="">
            </div>
            <div class="text">
                <p>Feels like a family, very caring therapists.</p>
                <h3>Ilyes</h3>
            </div>
        </div>
        <div class="box">
            <div class="imbox">
                <img src="../images/t3.jpg" alt="">
            </div>
            <div class="text">
                <p>Very passionate therapists, keep it up.</p>
                <h3>Japa</h3>
            </div>
        </div>
    </div>
 </section>

 <section class="expert" id="Oeuvres">
    <div class="titre">
        <h2 class="titre-texte">Our <span>A</span>rt Pieces</h2>
        <p>Here's just a glimpse of our clients's Work</p>
    </div>
    <div class="contenu">
        <div class="box">
            <div class="imbox">
                <img src="../images/art1.jpeg" alt="Oeuvres1">
            </div>
            <div class="text">
                <h3>
                    <div>Nom : Aly</div>
                    <div>Prenom : Farhat</div>
                    <div>Ref : 1</div>
                </h3>
            </div>
        </div>
        <div class="box">
            <div class="imbox">
                <img src="../images/art2.jpeg" alt="Oeuvres2">
            </div>
            <div class="text">
                <h3>
                    <div>Nom : Bechir</div>
                    <div>Prenom : Mejri</div>
                    <div>Ref : 2</div>
                </h3>
            </div>
        </div>
        <div class="box">
            <div class="imbox">
                <img src="../images/art3.jpeg" alt="Oeuvres3">
            </div>
            <div class="text">
                <h3>
                    <div>Nom : Hejer</div>
                    <div>Prenom : Ayadi</div>
                    <div>Ref : 3</div>
                </h3>
            </div>
        </div>
        <div class="box">
            <div class="imbox">
                <img src="../images/art4.jpeg" alt="Oeuvres4">
            </div>
            <div class="text">
                <h3>
                    <div>Nom : Rayen</div>
                    <div>Prenom : Ghrairi</div>
                    <div>Ref : 4</div>
                </h3>
            </div>
        </div>
    </div>
 </div>
</section>


<section class="contact" id="contact">
    <div class="titre blanc">
         <h2 class="titre-text"><span>C</span>ontact</h2>
         <p>Contactez-nous à tous moments.</p>
    </div>
    <div class="contactform">
         <h3>Envoyer un message</h3>
         <div class="inputboite">
             <input type="text" placeholder="Nom" id="first_name" >
         </div>
         <div class="inputboite">
            <input type="text" placeholder="email" id="email" >
         </div>
         <div class="inputboite">
            <textarea placeholder="message" id="message" ></textarea>
         </div>
         <div class="inputboite">
             <button class="btn-reserve" id="submit-btn" onclick="validateForm()" >Envoyer</button>
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

<section class="signup" id="insc">
    <div class="titre noir">
        <h2 class="titre-text"><span>S</span>ign Up</h2>
    </div>
    <div class="contactform">
        <h3>inscription</h3>
        <div class="inputboite">
            <input type="text" placeholder="userName or Mail" id="input11" >
        </div>
        <div class="inputboite">
           <input type="text" placeholder="Nom" id="input22" >
        </div>
        <div class="inputboite">
            <input type="text" placeholder="Prenom" id="input22" >
         </div>
         <div class="inputboite">
            <input type="text" placeholder="Mail" id="input22" >
         </div>
         <div class="inputboite">
            <input type="text" placeholder="Role" id="input22" >
         </div>
         <div>
            <p>cours</p>
         </div>
         <div id="insc">
            <select name="d1">
                <option value="">danse</option>
                <option value="">draw</option>
                <option value="">music</option>
            </select>
        </div>
         <div class="inputboite">
            <input type="text area" placeholder="description" id="input22" >
         </div>
         <div class="inputboite">
            <input type="password" placeholder="mot de passe" id="input22" >
         </div>
        <div class="inputboite">
            <button class="btn-reserve" id="submit-btn1" >register</button>
        </div>
        
        
    </div>
 
</section>




<section class="login" id="donation">
    <div class="titre noir">
        <h2 class="titre-text"><span>D</span>onation</h2>
    </div>
    <div class="contactform">
        <h3>Donate</h3>
        <div class="inputboite">
            <input type="text" placeholder="Mantant" id="input11" >
        </div>
        <div>
            <p>Destination</p>
            <select name="" id="">
                <option value="">Patient</option>
                <option value="">Event</option>
            </select>
        </div>
        <p>description</p>
        <textarea name="" id="" cols="30" rows="10"  placeholder="message"></textarea>
        <br>
        <div class="inputboite">
            <button class="btn-reserve" id="submit-btn1" >Donate</button>
        </div>
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

</html>