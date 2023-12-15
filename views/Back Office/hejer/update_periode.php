<?php


include '../../../controller/hejer/periodeC.php';
include '../../../model/hejer/periode2.php';
$error = "";

$periode = null;


$periodeC = new PeriodeC();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  
if (
    isset($_POST["id_periode"]) &&
    isset($_POST["nb_seance"]) &&
    isset($_POST["longueur"]) 
) {
  
    if (
        !empty($_POST["id_periode"]) &&
        !empty($_POST["nb_seance"]) &&
        !empty($_POST['longueur']) 
    ) {
      
        $periode = new Periodes(
            $_POST['id_periode'],
            $_POST['longueur'],
            $_POST['nb_seance']);

            $periodeC->updatePeriode($periode->getIdPeriode(), $periode);


        
        header('Location: ./mainGestionPeriode.php');
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
        <div class="item ">Categorie</div>
        <div class="seperator"></div>
        <div class="item ">Add Categorie</div>
        <div class="seperator"></div>
        <div class="item selected">Periode</div>
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
        <div class="main-title">Update Period</div>
        <div class="seperator"></div>


        <button><a href="./mainGestionPeriode.php">Back to list periodes</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['id_periode'])) {
        $periode = $periodeC->showPeriode($_POST['id_periode']);

    ?>

<form action="" method="POST" border="1" align="center">
    <input type="hidden" name="id_periode" id="id_periode" value="<?php echo $periode['id_periode']; ?>" >
                <div>
                <label for="nom">longueur:</label>
            <input type="text" name="longueur" id="longeuru" value="<?php echo is_array($periode) ? $periode['longueur'] : ''; ?>" >
            </div>
            <div>
                <label for="nom">nombre de seance:</label>
            <input type="text" name="nb_seance" id="nb" value="<?php echo is_array($periode) ? $periode['nb_seance'] : ''; ?>" >
            </div>
               
            <div>
                <input type="submit" value="Update ">
                
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

</body>
</html>
