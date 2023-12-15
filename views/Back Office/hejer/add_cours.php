<?php


include '../../../controller/hejer/coursC.php';
include '../../../model/hejer/cours2.php';

$error = "";


$cou = null;


$coursC = new CoursC();
$categories = $coursC->getCategories();

if (
    isset($_POST["categorie"]) &&
    isset($_POST["nom_cours"]) &&
    isset($_POST["prix_cours"]) 
) {
    if (
        !empty($_POST['categorie']) &&
        !empty($_POST['categorie']) &&
        !empty($_POST["prix_cours"]) 
    ) {
        $cou = new Courses(
            null,
            $_POST['categorie'],
            $_POST['nom_cours'],
            $_POST['prix_cours']
        );
        
        $coursC->addCours($cou);
        $categories = $coursC->getCategories();
        
        header('Location:mainGestionCours.php');
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
        <a href="./add_cours.php" class="item selected">ADD COURS</a>
        <div class="seperator"></div>
        <a href="./mainGestionCat.php" class="item ">CATEGORIES</a>
        <div class="seperator"></div>
        <a href="./add_categories.php" class="item  ">ADD CATEG</a>
        
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
        <div class="main-title">Ajouter Cours</div>
        <div class="seperator"></div>

        <form action="./add_cours.php" method="POST">
        <div>
        <label for="categorie">Category:</label>
  
          <select id="categorie" name="categorie">
          <?php
            if (empty($categories)) {
           echo "<option>No categories found.</option>";
            } else {
              foreach ($categories as $category) {
                echo "<option value='" . $category['id_cat'] . "'>" . $category['nom_cat'] . "</option>";
              }
             }
          ?>
          </select>
        </div>
              <div>
                <label for="nom">nom cours :</label>
                <input type="text" id="nom_cours" name="nom_cours" />
              </div>
              <div>
                <label for="prenom">prix cours :</label>
                <input type="number" id="prix" name="prix_cours" />
              </div>
              <div>
                <input type="submit" value="Save">
           
                <input type="reset" value="Reset">
              </div>


    </form>
      </div>
    </div>
  </div>
</body>
<!-- partial -->
  <script  src="./script.js"></script>
  <script>
  document.addEventListener("DOMContentLoaded", function () {
    var form = document.querySelector("form");

    form.addEventListener("submit", function (event) {
      // Validation pour le champ nom_cours (pas de chiffres)
      var nomCours = document.getElementById("nom_cours").value;
      if (/\d/.test(nomCours)) {
        alert("Le champ 'nom cours' ne doit pas contenir de chiffres.");
        event.preventDefault(); // Empêcher la soumission du formulaire si la validation échoue
        return;
      }

      // Validation pour le champ prix_cours (chiffres et virgules seulement)
      var prixCours = document.getElementById("prix").value;
      if (!/^[0-9,]+$/.test(prixCours)) {
        alert("Le champ 'prix cours' ne doit contenir que des chiffres et éventuellement des virgules.");
        event.preventDefault(); // Empêcher la soumission du formulaire si la validation échoue
      }
    });
  });
</script>

</body>
</html>
