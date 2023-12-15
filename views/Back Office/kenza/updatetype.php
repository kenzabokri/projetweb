<?php

include '../../../controller/kenza/typet.php';
include '../../../model/kenza/type.php';
$error = "";

// create client
$type = null;

// create an instance of the controller
$typet = new typet();
if (
    isset($_POST["idtype"]) &&
    isset($_POST["nomtype"])
) {
    if (
        !empty($_POST["idtype"]) &&
        !empty($_POST['nomtype']) 
    ) {
        $type = new type(
            $_POST['idtype'],
            $_POST['nomtype']
        );
        $typet->updatetype($type, $_POST["idtype"]);
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
        <h1> <a href="./addtype.php" class="item ">ADD type</a></h1>
        <div class="seperator"></div>
        <h1> <a href="./searchevent.php" class="item ">search event</a></h1>
        <div class="seperator"></div>
        <h1> <a href="./listformulaire.php" class="item selected">form</a></h1>
        <div class="seperator"></div>
        <h1> <a href="./statistique.php" class="item ">stat</a></h1>
        </div>
        <div class="log-out">LOG OUT</div>
      </div>
      <div class="view">
        <div class="sub-title">kenza'S PANEL</div>
        <div class="main-title">Add event</div>
        <div class="seperator"></div>
<body>
    <button><a href="./listtype.php">Back to list</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['idtype'])) {
        $type = $typet->showtype($_POST['idtype']);

    ?>

        <form action="" method="POST" onsubmit="return validateForm();">
            <table border="1" align="center">
                <tr>
                    <td>
                        <label for="idtype">Id type:
                        </label>
                    </td>
                    <td><input type="text" name="idtype" id="idtype" value="<?php echo $type['idtype']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="nomtype">nomtype:
                        </label>
                    </td>
                    <td><input type="text" name="nomtype" id="nomtype" value="<?php echo $type['nomtype']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Update">
                    </td>
                    <td>
                        <input type="reset" value="Reset">
                    </td>
                </tr>
            </table>
        </form>
    <?php
    }
    ?>
        <script src="../../model/verifi.js"></script>

</body>

</html>