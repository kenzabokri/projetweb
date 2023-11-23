
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/icofont.css">
    <link rel = "preconnect" href = "https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="./js/login.js"></script>
    <script src="./js/sign.js"></script>
    <title>ART THERAPY</title>
<body>
<header>
    <a href="#" class="logo"><img src="../images/logo_2.png" alt=""></a>
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


 <section class="login" id="login">
    <div class="titre noir">
        <h2 class="titre-text"><span>L</span>ogin</h2>
    </div>
    <div class="contactform">
        <h3>Connecter</h3>
        <form action="./php/login/login.php" method="post" id="f1">
            <div class="inputboite">
                <input type="text" placeholder="userName or Mail" name="user">
            </div>
            <div class="inputboite">
               <input type="password" placeholder="mot de passe" name="password" >
            </div>
            <div class="inputboite">
                <button class="btn-reserve" id="submit-btn1" type="submit" onclick="return verify1()">Login</button>
            </div>
        </form>
        
    </div>
 
</section>

<section class="signup" id="signup">
    <div class="titre noir">
        <h2 class="titre-text"><span>S</span>ign Up</h2>
    </div>
    <div class="contactform">
        <h3>register</h3>
        <form action="./php/signup.php" method="post" id="f">
            <div class="inputboite">
                <input type="text" placeholder="userName" name="un" id="uname">
            </div>
            <div class="inputboite">
                <input type="text" placeholder="Nom" name="n" id="nom">
            </div>
            <div class="inputboite">
                <input type="text" placeholder="Prenom" name="p" id="prenom">
            </div>
            <div class="inputboite">
                <input type="text" placeholder="Mail" name="m" id="mail">
            </div>
            <div class="inputboite">
                <select name="r" id="role">
                    <option value="">Role</option>
                    <option value="Art thearpists">Art thearpists</option>
                    <option value="Patient">Patient</option>
                    <option value="Administrator">Administrator</option>
                </select>
            </div>
            <div class="inputboite">
                <input type="text area" placeholder="description" name="desc" id="desc">
            </div>
            <div class="inputboite">
                <input type="password" placeholder="mot de passe" name="pass" id="pass">
            </div>
            <div class="inputboite">
                <button class="btn-reserve" id="submit-btn1" type="submit" onclick="return verify()">register</button>
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
 <script src="./js/main.js"></script>
</body>
</html>