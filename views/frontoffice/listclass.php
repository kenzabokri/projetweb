<?php


include '../../controller/classec.php';



$c = new Classec();
$tab = $c->list();

?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>ADMIN PANEL</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="../../model/style2.css">
<link rel="stylesheet" href="../../model/style.css">
    <link rel="stylesheet" href="../../model/icofont.css">
    <style>
    body {
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      margin: 200;
      background-color: #fff; 
      background-image: url('./back.png'); 
      background-size: cover; 
      background-position: center; 
    }
</style>
<style>
 
 table {
  width: 100%;
  max-width: 800px; /* Exemple de largeur maximale du tableau */
  border-collapse: collapse;
  margin-top: 20px;
}

    th,
    td {
      border: 1px solid #ddd;
      padding: 8px;
      text-align: left;
    }

    th {
      background-color: #f2f2f2;
      color: #333;
    }

    tr:nth-child(even) {
      background-color: #f9f9f9;
    }

    tr:hover {
      background-color: #f5f5f5;
    }
    /* Style pour la première ligne du tableau (en-têtes) */
table tr:first-child {
  background-color: #f2f2f2; /* Couleur différente pour la première ligne */
}

/* Style pour les lignes autres que la première */
table tr:not(:first-child) {
  background-color: #ffffff; /* Couleur pour les autres lignes */
}

  </style>
</head>
<body>
<header>
        <a href="#" class="logo"><img src="logo.png" alt=""></a>
        <div class="menuToggle" onclick="toggleMenu();"></div>
        <ul class="navbar">
            <li><a href="#banniere" onclick="toggleMenu();">Home</a></li>
            <li><a href="#apropos" onclick="toggleMenu();">About</a></li>
            <li><a href="#menu" onclick="toggleMenu();">Lessons</a></li>
            <li><a href="event.html">Events</a></li>
            <li><a href="#expert" onclick="toggleMenu();">Our Art thearpists</a></li>
            <li><a href="#temoignage" onclick="toggleMenu();">Temoignage</a></li>
            <li><a href="#contact" onclick="toggleMenu();">Contact</a></li>
            <li><a href="#donation" onclick="toggleMenu();">Donation</a></li>
            <li><a href="showemploi.php" onclick="toggleMenu();">Votre emploi</a></li>
            <a href="#login" class="btn-reserve"onclick="toggleMenu();">Login</a>
        </ul>
    </header>
  <div class="background"></div>
      <div class="view">
       <h1> <div class="main-title">classe</div></h1>
        <div class="seperator"></div>
        <table border="1" align="center" width="70%">
    <tr>
        <th>id classe</th>
        <th>Nom Classe</th>
        <th>nombre de patient</th>
    </tr>
    <?php
    foreach ($tab as $classe) {
    ?>
        <tr>
            <td><?= $classe['idclasse']; ?></td>
            <td><?= $classe['nomclasse']; ?></td>
            <td><?= $classe['nbpatient']; ?></td>
            
            
        </tr>
        
         
        
        
    <?php
    }
    ?>
</table>
      </div>
    </div>
  </div>
</body>

</html>
