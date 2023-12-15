<?php


include '../../../controller/hejer/categorieC.php';
include '../../../model/hejer/categorie2.php';
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
        <div class="item selected">Categorie</div>
        <div class="seperator"></div>
        <div class="item ">Add Categorie</div>
        <div class="seperator"></div>
        <div class="item ">Periode</div>
        <div class="seperator"></div>
        <div class="item "> Add Periode</div>
        <div class="seperator"></div>
        <div class="item selected ">Inscription</div>
        <div class="seperator"></div>
        <div class="item ">Add Inscription</div>
        </div>
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

<form action="./update_cat.php" method="POST" border="1" align="center" onsubmit="return validateForm()">
    <input type="hidden" name="id_cat" id="id_cat" value="<?php echo $categorie['id_cat']; ?>" >
                <div>
                <label for="nom">nom categorie:</label>
            <input type="text" name="nom_cat" id="nom_cat" value="<?php echo is_array($categorie) ? $categorie['nom_cat'] : ''; ?>" >
            </div>
                <label for="url">url:</label>
           <input type="file" name="url_cat" id="url_cat" value="<?php echo is_array($categorie) ? $categorie['url_cat'] : ''; ?>" >
        
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
        function validateForm() {
            var nomCat = document.getElementById("nom_cat").value;
            var urlCat = document.getElementById("url_cat").value;

            var nomCatRegex = /^[a-zA-Z\s]*$/; // Ne doit contenir que des lettres et des espaces
            var urlCatRegex = /\.(jpg|jpeg|png|gif)$/; // Doit avoir une extension d'image

            if (!nomCatRegex.test(nomCat)) {
                alert("Le nom de la catégorie ne doit contenir que des lettres et des espaces.");
                return false;
            }

            if (!urlCatRegex.test(urlCat)) {
                alert("L'URL de la catégorie doit avoir une extension d'image (jpg, jpeg, png, gif).");
                return false;
            }

            return true;
        }
    </script>
</body>
</html>
