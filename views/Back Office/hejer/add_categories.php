<?php


include '../../../controller/hejer/categorieC.php';
include '../../../model/hejer/categorie2.php';

$error = "";


$categ = null;


$categC = new CategorieC();
if (
    isset($_POST["nom_cat"]) &&
    isset($_POST["url_cat"]) 
) {
    if (
        !empty($_POST['nom_cat']) &&
        !empty($_POST["url_cat"]) 
    ) {
        $categ = new Categorie(
            null,
            $_POST['nom_cat'],
            $_POST['url_cat']
        );
        $categC->addCategory($categ);
        header('Location:mainGestionCat.php');
    } else
        $error = "Missing information";
}

?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>ADMIN PANEL</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

<link rel="stylesheet" href="./style.css">


</head>
<body>
<!-- partial:index.partial.html -->
<body>
  <div class="background"></div>
  <div class="body-wrapper">
    <div class="panel">
      <div class="aside"> 
      <a href="../../Front Office/index.php" class="item ">home</a>
        <div class="seperator"></div>
        <div class="list">
        <a href="./mainGestionCours.php" class="item ">COURS</a>
        <div class="seperator"></div>
        <a href="./add_cours.php" class="item">ADD COURS</a>
        <div class="seperator"></div>
        <a href="./mainGestionCat.php" class="item ">CATEGORIES</a>
        <div class="seperator"></div>
        <a href="./add_categories.php" class="item selected ">ADD CATEG</a>
        
        <div class="seperator"></div>
        <a href="./mainGestionPeriode.php" class="item">PERIODE</a>
        <div class="seperator"></div>
        <a href="./add_periode.php" class="item ">ADD PERIODE</a>
        <div class="seperator"></div>
        <a href="./mainGestionInscription.php" class="item">INSCRIPTION</a>
        <div class="seperator"></div>
        <a href="./add_inscription.php" class="item ">ADD INSCRIPTION</a>
        <div class="seperator"></div>
        </div>
        <a href="../../Front Office/user_management/logout.php" class="btn-reserve" style="color: black;">Log Out</a>
      </div>
      <div class="view">
        <div class="sub-title">HEJER'S PANEL</div>
        <div class="main-title">Ajouter Categorie</div>
        <div class="seperator"></div>


        <form action="./add_categories.php" method="POST">
        
                    <div>
                    <label for="nom">Nom categorie:</label>
                    <input type="text" id="nom_cat" name="nom_cat" />
                    </div>
                <div>
                <label for="prenom">Url image Cat :</label>
                <input type="file" id="url" name="url_cat" />
                </div>
                <div>
                <input type="submit" value="Save">
            
                <input type="reset" value="Reset">
                </div>

    </form>
</body>
      </div>
    </div>
  </div>
</body>
<!-- partial -->
  <script  src="./script.js"></script>
  <script>
  document.addEventListener("DOMContentLoaded", function() {
    const form = document.querySelector("form");

    form.addEventListener("submit", function(event) {
      const nomCatInput = document.getElementById("nom_cat").value;
      const urlCatInput = document.getElementById("url").value;

      // Validation pour le champ "Nom categorie"
      if (!isValidAlpha(nomCatInput)) {
        alert("Le champ 'Nom categorie' ne doit contenir que des lettres alphabétiques.");
        event.preventDefault(); // Empêche l'envoi du formulaire
        return;
      }

      // Validation pour le champ "Url image Cat"
      if (!isValidImage(urlCatInput)) {
        alert("Le champ 'Url image Cat' doit contenir une URL valide pour une image.");
        event.preventDefault(); // Empêche l'envoi du formulaire
        return;
      }
    });

    // Fonction de validation pour les lettres alphabétiques
    function isValidAlpha(value) {
      return /^[a-zA-Z]+$/.test(value);
    }

    // Fonction de validation pour une URL d'image
    function isValidImage(value) {
      // Utilisez une expression régulière simple pour vérifier si c'est une URL d'image
      return /\.(png|jpe?g)$/i.test(value);
    }
  });
</script>


</body>
</html>
