
<?php
include '../../../controller/amine/emploic.php';
include '../../../model/amine/emploi.php';




$error = "";

// create classe
$emploi = null;

// create an instance of the controller
$emploic = new emploic();
if (
    isset($_POST["date"]) &&
    isset($_POST["dateDebut"]) &&
    isset($_POST["dateFin"])

    ) {
    if (
        !empty($_POST['date']) &&
        !empty($_POST['dateDebut']) &&
        !empty($_POST['dateFin'])
    ) {
        $emploi = new emploi(
            null,
            $_POST['date'],
            $_POST['dateDebut'],
            $_POST['dateFin']

        );
        $emploic->add($emploi);
        header('Location:showemploi.php');
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
<link rel="stylesheet" href="../../../model/amine/style2.css">
<style>
    body {
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      margin: 200;
      background-color: #fff; 
      background-image: url('ko.png'); 
      background-size: cover; 
      background-position: center; 
    }
</style>
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
        <a href="../../Front Office/index.php" class="item "><h1>home</h1></a>
        <a href="./listclasse.php" class="item "><h1>classe</h1></a>
        <div class="seperator"></div>
        <a href="./addclasse.php"><h2>ADD Classe</h2></a>
        <div class="seperator"></div>
          <a href="./showemploi.php" class="item "><h1>emploi</h1></a>
          <div class="seperator"></div>
          <a href="./addemploi.php"><h2>ADD emploi</h2></a>
          <div class="seperator"></div>
        </div>
        <div class="log-out"><h2><a href="../../Front Office/user_management/logout.php">LOG OUT</a></h2></div>
      </div>
      <div class="view">
      <form action="" method="POST" onsubmit="return validateForm();">
        <table border="1" align="center">
            <tr>
                <td>
                    <label for="date">Date:</label>
                </td>
                <td><input type="date" name="date" id="date" maxlength="20"></td>
            </tr>
            <tr>
                <td>
                    <label for="dateDebut">Date de début:</label>
                </td>
                <td><input type="text" name="dateDebut" id="dateDebut" maxlength="20"></td>
            </tr>
            <tr>
                <td>
                    <label for="dateFin">Date de fin:</label>
                </td>
                <td><input type="text" name="dateFin" id="dateFin" maxlength="20"></td>
            </tr>
           
            <tr align="center">
                <td>
                    <input type="submit" value="Save">
                </td>
                <td>
                    <input type="reset" value="Reset">
                </td>
            </tr>
        </table>
    </form>
      </div>
</body>
<!-- partial -->
  <script  src="./script.js"></script>

</body>
</html>
