<?php


include '../../../controller/hejer/inscriptionC.php';
include '../../../model/hejer/inscription2.php';
$error = "";
$coursC = new InscriptionC();
$cours = $coursC->listCours();


$periodeC = new InscriptionC();  
$periode = $periodeC->listPeriode();

$emploiC = new InscriptionC();
$emploi = $emploiC->listEmploi();

$classC = new InscriptionC();
$class = $classC->listClass();

$i = null;

// create an instance of the controller
$inscriC = new InscriptionC();
if (
    isset($_POST["id_inscri"]) &&
    isset($_POST["user"]) &&
    isset($_POST["cours"]) &&
    isset($_POST["periode"]) 
) {
    if (
        !empty($_POST["id_inscri"]) &&
        !empty($_POST['user']) &&
        !empty($_POST['cours']) &&
        !empty($_POST["periode"])
    ) {
        $i = new Inscri(
            $_POST['id_inscri'],
            $_POST['user'],
            $_POST['cours'],
            $_POST['periode'],
            $_POST['emploi'],
            $_POST['class']
          );
    
        $inscriC->updateInscription( $_POST["id_inscri"], $_POST["user"],$i);
        header('Location:./mainGestionInscription.php');
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
        <div class="item ">Cours</div>
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
        <div class="item  selected">Inscription</div>
        <div class="seperator"></div>
        <div class="item ">Add Inscription</div>
        </div>
      </div>
      <div class="view">
        <div class="sub-title">HEJER'S PANEL</div>
        <div class="main-title">Update inscri</div>
        <div class="seperator"></div>


        <button><a href="./mainGestionInscription.php">Back to list inscription</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['id_inscri'])) {
        $i = $inscriC->showInscri($_POST['id_inscri']);

    ?>

        <form action="" method="POST" border="1" align="center">
            
        <input type="hidden" name="id_inscri" id="id_inscri" value="<?php echo $i['id_inscri']; ?>" >
        <input type="hidden" name="user" id="user" value="<?php echo $i['user']; ?>" >


        <div>
      <h4>Cours</h4>
        <select  name="cours">
          <?php
            if ($cours->rowCount() > 0) {
              // Il y a des résultats
              foreach ($cours as $row) {
                echo "<option value='" . $row['id_cours'] . "'>" . $row['nom_cours'] . "</option>";
                
              }
            } else {
                echo "<option value=''>Aucun utilisateur trouvé</option>";
            }
          ?>
        </select>
        <div>
      <h4>Periode</h4>
        <select  name="periode">
          <?php
            if ($periode->rowCount() > 0) {
              // Il y a des résultats
              foreach ($periode as $row) {
                echo "<option value='" . $row['id_periode'] . "'>" . $row['longueur'] . "</option>";
                
              }
            } else {
                echo "<option value=''>Aucun utilisateur trouvé</option>";
            }
          ?>
        </select>
        </div>

        <div>
      <h4>emploi</h4>
        <select  name="emploi">
          <?php
            if ($emploi->rowCount() > 0) {
              // Il y a des résultats
              foreach ($emploi as $row) {
                echo "<option value='" . $row['idemploi'] . "'>" . $row['idemploi'] . "</option>";
                
              }
            } else {
                echo "<option value=''>Aucun utilisateur trouvé</option>";
            }
          ?>
        </select>
        </div>
        <div>
      <h4>classe</h4>
        <select  name="class">
          <?php
            if ($class->rowCount() > 0) {
              // Il y a des résultats
              foreach ($class as $row) {
                echo "<option value='" . $row['idclasse'] . "'>" . $row['nomclasse'] . "</option>";
                
              }
            } else {
                echo "<option value=''>Aucun utilisateur trouvé</option>";
            }
          ?>
        </select>
        </div>
                <div>       
                            <input type="submit" value="Update">
                        
                            <input type="reset" value="Reset">
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
