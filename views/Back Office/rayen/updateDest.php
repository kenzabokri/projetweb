<?php

include '../../../model/rayen/destination2.php';
include '../../../controller/rayen/destinationC.php';

// If the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the form data
    $id = $_POST['id_Dest'];
    $newDestination = $_POST['destination'];

    // Create an instance of the destinationC class
    $destinationController = new destinationC();

    // Retrieve the existing destination data
    $existingDestination = $destinationController->showDest($id);

    // Check if the destination exists
    if ($existingDestination) {
        // Update the destination
        $destination = new dest($id, $newDestination);
        $success = $destinationController->updateDest($id, $destination);

        if ($success) {
            header('Location: listDest.php');
            exit();
        } else {
            echo "Failed to update destination.";
        }
    } else {
        echo "Destination not found.";
    }
}

// If the form is not submitted, retrieve the list of destinations
$destinationController = new destinationC();
$destinations = $destinationController->listdest();
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>ADMIN PANEL</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="./styletab.css">

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
        <a href="listDon.php" class="item  ">DONS</a>
        <div class="seperator"></div>
        <a href="addDon.php" class="item ">ADD DONS</a>
        <div class="seperator"></div>
        <a href="listDest.php" class="item selected ">Destination</a>
        <div class="seperator"></div>
        <a href="addDest.php" class="item  ">ADD DES</a>
        <div class="seperator"></div>
        <a href="statDon.php" class="item ">STAT</a>
        <div class="seperator"></div>
        <a href="exportDonations.php" class="button">Download CSV</a>
        <div class="seperator"></div>
        </div>
      </div>
      <div class="view">
        <div class="sub-title">RAYEN'S PANEL</div>
        <div class="main-title">Update Destination:</div>
        <div class="seperator"></div>

        <style>
  .scrollable-table {
    max-height: 400px; /* ajustez la hauteur maximale selon vos besoins */
    overflow-y: auto;
  }
</style>


<h2>Update Destination</h2>
    <?php foreach ($destinations as $dest) : ?>
        <form method="post" action="updateDest.php" onsubmit="return validateForm();">
            <input type="hidden" name="id_Dest" value="<?php echo $dest['id_Dest']; ?>">
            
            
            <input type="text" name="destination" value="<?php echo $dest['destination']; ?>" required>

            <button type="submit">Update Destination</button>
        </form>
    <?php endforeach; ?>






 
        
</body>
<!-- partial -->
  <script  src="./script.js"></script>
  <script>
    function validateForm() {
        // Récupérez la valeur de la destination
        var destination = document.getElementsByName("destination")[0].value;

        // Vérifiez si la destination est une chaîne de caractères
        if (!isNaN(destination)) {
            alert("La destination doit être une chaîne de caractères");
            return false;
        }
        // Si tout est valide, retournez true pour soumettre le formulaire
        return true;
    }
</script>
</body>
</html>