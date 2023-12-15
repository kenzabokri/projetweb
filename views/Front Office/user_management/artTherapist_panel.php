<?php
    $id=$_GET['id'];
    $role=$_GET['role'];
    $url="../index.php?id=$id&role=$role";

    session_start();
    if($_SESSION['loggedIn']==1){
?>
<input type="text" id='id' value="<?php echo$id ?>" hidden>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/style.css">
    <link rel="stylesheet" href="../../assets/icofont.css">
    <link rel = "preconnect" href = "https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>ART THERAPY</title>
    <script src="../../assets/js/user.js" ></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    
    <script>
        show_user();
        var id=<?php echo$id?>;
    </script>
</head>
<body style="background-image: url(../../images/ArtTherapistBack.png);">
<header>
    <a href="<?php echo $url?>" class="logo"><img src="../../images/logo_2.png" alt=""></a>
    
    <div class="menuToggle" onclick="toggleMenu();"></div>
    <ul class="navbar">
        <li><a href="<?php echo $url?>">home</a></li>
        <li><a href="#banniere" onclick="show_user();">Profile</a></li>
        <li><a href="#banniere" onclick="toggleMenu();">Classes</a></li>
        <li><a href="#menu" onclick="toggleMenu();">emploi</a></li>
        <li><a href="#apropos" onclick="updatePinfo();">UpdatePinfo</a></li>
        <pre>                                                                                                                                                      </pre>
        <a href="./logout.php" class="btn-reserve" style="color: black;">Log Out</a>
    </ul>
</header>
<div id="container" >
    
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
 <script src="../../model/main.js"></script>

 
</body>
</html>
<?php
}else{
    
   header("location: ./logout.php");
}
?>