<?php


include '../../controller/categorieC.php';
include '../../model/categorie2.php';
$error = "";

$categorie = null;


$catC = new CategorieC();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  
if (
    isset($_POST["id_cat"]) &&
    isset($_POST["nom_cat"]) &&
    isset($_POST["url_cat"]) 
) {
  
    if (
        !empty($_POST["id_cat"]) &&
        !empty($_POST['nom_cat']) &&
        !empty($_POST["url_cat"])
    ) {
      
        $categorie = new Categories(
            $_POST['id_cat'],
            $_POST['nom_cat'],
            $_POST['url_cat']);
    
           
        $catC->updateCategory($categorie, $_POST["id_cat"]);
        
        header('Location: ./mainGestionCat.php');
        exit();
    } else
        $error = "Missing information";
}
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
        <div class="seperator"></div>
        <div class="list">
        <div class="item ">Cours</div>
        <div class="seperator"></div>
        <div class="item "> Add Cours</div>
        <div class="seperator"></div>
        <div class="item selected ">Categorie</div>
        <div class="seperator"></div>
        <div class="item ">Add Categorie</div>
        </div>
        <div class="log-out">LOG OUT</div>
      </div>
      <div class="view">
        <div class="sub-title">HEJER'S PANEL</div>
        <div class="main-title">Update Category</div>
        <div class="seperator"></div>


        <button><a href="./mainGestionCat.php">Back to list categories</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['id_cat'])) {
        $categorie = $catC->showCategory($_POST['id_cat']);

    ?>

<form action="./update_cat.php" method="POST" border="1" align="center">
    <input type="hidden" name="id_cat" id="id_cat" value="<?php echo $categorie['id_cat']; ?>" >
                <div>
                <label for="nom">nom categorie:</label>
            <input type="text" name="nom_cat" id="nom_cat" value="<?php echo is_array($categorie) ? $categorie['nom_cat'] : ''; ?>" >
            </div>
                <label for="url">url:</label>
           <input type="text" name="url_cat" id="url_cat" value="<?php echo is_array($categorie) ? $categorie['url_cat'] : ''; ?>" >
        
            <div>
                <input type="submit" value="Update category">
                
            </div>
        
</form>

    <?php
    }
    ?>
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
