<?php
include '../../../controller/amine/classec.php';
include '../../../model/amine/classe.php';



$error = "";

// create classe
$classe = null;

// create an instance of the controller
$classec = new classec();
if (
    isset($_POST["nomclasse"]) &&
    isset($_POST["nbpatient"]) 
) {
    if (
        !empty($_POST['nomclasse']) &&
        !empty($_POST["nbpatient"]) 
    ) {
        $classe = new classe(
            null,
            $_POST['nomclasse'],
            $_POST['nbpatient']
        );
        $classec->add($classe);
        header('Location:listclasse.php');
    } else
        $error = "Missing information";
}


?>



<!DOCTYPE html>
<html lang="en" >
<head>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
    <script src="./verification.js"></script>
    <style>
    body {
  display: flex;
  align-items: center;
  justify-content: center;
  text-align: center; /* Ajoutez cette ligne */
  height: 100vh;
  margin: 50;
  background-color: #fff;
  background-image: url('ko.png');
  background-size: cover;
  background-position: center;
}

</style>
  <meta charset="UTF-8">
  <title>ADMIN PANEL</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="../../../model/amine/style2.css">

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
                    <label for="nomclasse">nom de la classe:
                    </label>
                </td>
                <td><input type="text" name="nomclasse" id="nomclasse" maxlength="20"></td>
            </tr>
            <tr>
                <td>
                    <label for="nbpatient">nombre de patient:
                    </label>
                </td>
                <td><input type="text" name="nbpatient" id="nbpatient" maxlength="20"></td>
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
    </div>
  </div>
</body>
<!-- partial -->
  <script  src="./script.js"></script>

</body>
</html>
