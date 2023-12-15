<?php


include '../../../controller/hejer/coursC.php';
include '../../../model/hejer/cours2.php';
$error = "";


$cours = null;



$coursC = new CoursC();
if (
    isset($_POST["id_cours"]) &&
    isset($_POST["categorie"]) &&
    isset($_POST["nom_cours"]) &&
    isset($_POST["prix_cours"]) 
) {
    if (
        !empty($_POST["id_cours"]) &&
        !empty($_POST['categorie']) &&
        !empty($_POST['nom_cours']) &&
        !empty($_POST["prix_cours"])
    ) {
        $cours = new Courses(
            $_POST['id_cours'],
            $_POST['categorie'],
            $_POST['nom_cours'],
            $_POST['prix_cours']);
    
        $coursC->updateCours($cours, $_POST["id_cours"], $_POST["categorie"]);
        header('Location:./mainGestionCours.php');
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
        <div class="seperator"></div>
        <div class="list">
        <div class="item selected">Cours</div>
        <div class="seperator"></div>
        <div class="item "> Add Cours</div>
        <div class="seperator"></div>
        <div class="item ">Categorie</div>
        <div class="seperator"></div>
        <div class="item ">Add Categorie</div>
        <div class="seperator"></div>
        <div class="item ">Periode</div>
        <div class="seperator"></div>
        <div class="item "> Add Periode</div>
        <div class="seperator"></div>
        <div class="item  ">Inscription</div>
        <div class="seperator"></div>
        <div class="item ">Add Inscription</div>
        </div>
      </div>
      <div class="view">
        <div class="sub-title">HEJER'S PANEL</div>
        <div class="main-title">Update Cours</div>
        <div class="seperator"></div>


        <button><a href="./mainGestionCours.php">Back to list cours</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['id_cours'])) {
        $cours = $coursC->showCours($_POST['id_cours']);

    ?>

        <form action="update_cours.php" method="POST" border="1" align="center">
            
        <input type="hidden" name="id_cours" id="id_cours" value="<?php echo $cours['id_cours']; ?>" >
                
         <input type="hidden" name="categorie" id="categorie" value="<?php echo $cours['categorie']; ?>" >
                
               
                        <label for="nom">nom :</label>
                        <input type="text" name="nom_cours" id="nom_cours" value="<?php echo is_array($cours) ? $cours['nom_cours'] : ''; ?>" >
                        <label for="prix">prix :</label>
                        <input type="number" name="prix_cours" id="prix" value="<?php echo is_array($cours) ? $cours['prix_cours'] : ''; ?>" >
                
                        <input type="submit" value="Update">
                    
                        <input type="reset" value="Reset">
                   
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
