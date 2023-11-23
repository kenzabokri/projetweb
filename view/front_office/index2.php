<?php
require ('C:\xampp\htdocs\ESPRIT\PROJET_WEB_Bechir\config.php    ');
include ('../../controller/user_control.php');
$db=config::getConnexion();
$res=User_control::show_users($db);
$id= $_GET['id'];
foreach($res as $t){
  if($id==$t['id_user']){
    $username=$t['username'];
    $mail=$t['mail'];
    $firstName=$t['first_name'];
    $lastName=$t['last_name'];
    $role=$t['role'];
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="./css/espace.css">
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
       
        <a href="#profile" class="btn-reserve"onclick="toggleMenu();">profile</a>
    </ul>
</header>


<section id="profile" >
<div class="background"></div>
  <div class="body-wrapper">
    <div class="panel">
      <div class="aside">
        <div class="avatar"><img src="https://66.media.tumblr.com/avatar_faa95867d2b3_128.png"/></div>
        <div class="seperator"></div>
        <div class="list">
          <div class="item selected">GENERAL</div>
          <div class="item">EMPLOI</div>
          <div class="item">CLASSES</div>
          <a href="#signup"><div class="item">update info</div></a>
          
    
        </div>
        <a href="./index.php"><div class="log-out">LOG OUT</div></a>
      </div>
      <div class="view">
       <div class="sub-title"><h1>welcome: <span style="color:black "><?php echo $username?></span></h1></div>
        <div class="main-title">GENERAL</div>
        <div class="seperator"></div>
        <div class="health-charts">
          <div class="chart system">
            <div class="title">FIRST name</div>
            
          </div>
          <div class="chart network">
            <div class="title">LAST name</div>
          
          </div>
          <div class="chart storage">
            <div class="title">MAIL</div>
            <div class="info">
              <div class="circle"></div>
            </div>
          </div>
          
          <div class="clear-fix"></div>
        </div>
        <pre>            <?php echo $firstName;?>                     <?php echo $lastName;?>                  <?php echo $mail;?></pre> 
        <div class="min-seperator"></div>
        <div class="general-settings">
         
         
          
        </div>
      </div>
      <div class="clear-fix"></div>
    </div>
  </div>
</section>

<section class="signup" id="signup">
    <div class="titre noir">
    <h2 class="titre-text"><span>U</span>pdate information</h2>
    </div>
    <div class="contactform">
        <h3>fill the information to change: </h3>
        <form action="./php/update.php" method="post" id="f">
        <div class="inputboite">
                <input hidden   type="text" placeholder="userName" name="id" value="<?php echo$id?>">
            </div>
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
            <input hidden type="text" name="r" value="<?php echo $role?>">
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
</html>s