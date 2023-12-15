<?php

include '../../../controller/kenza/typet.php';
include '../../../model/kenza/type.php';

$error = "";

// create client
$type = null;

// create an instance of the controller
$typet = new typet();
if (
    isset($_POST["nomtype"])
) {
    if (
        !empty($_POST['nomtype']) 
    ) {
        $type = new type(
            null,
            $_POST['nomtype']
        );
        $typet->addtype($type);
        header('Location:listtype.php');
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
  <div class="background">   
  </div>
  <div class="body-wrapper">
    <div class="panel">
      <div class="aside"> 
      <a href="../../Front Office/index.php">Home </a>
      <p><a href="../../Front Office/user_management/logout.php">Log out</a></p>
        <div class="seperator"></div>
        <div class="list">
       <h1> <a href="./listevent.php" class="item ">events</a></h1>
        <div class="seperator"></div>
        <h1><a href="./addevent.php" class="item ">ADD event</a></h1>
        <div class="seperator"></div>
        <h1> <a href="./listtype.php" class="item ">type</a></h1>
        <div class="seperator"></div>
        <h1> <a href="./addtype.php" class="item selected">ADD type</a></h1>
        <div class="seperator"></div>
        <h1> <a href="./searchevent.php" class="item ">search event</a></h1>
        <h1> <a href="./listformulaire.php" class="item ">form</a></h1>
        <h1> <a href="./statistique.php" class="item ">stat</a></h1>
        </div>
        <div class="log-out">LOG OUT</div>
      </div>
      <div class="view">
        <div class="sub-title">kenza'S PANEL</div>
        <div class="main-title">Add event</div>
        <div class="seperator"></div>
<body>
    <a href="listtype.php">Back to list </a>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <form action="" method="POST"  onsubmit="return validateForm();" >
        <table border="1" align="center" >

            <tr>
                <td>
                    <label for="nomtype">nomtype:
                    </label>
                </td>
                <td><input type="text" name="nomtype" id="nomtype" maxlength="20"></td>
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
    <script src="../../../model/kenza/verifi.js"></script>
</body>

</html>