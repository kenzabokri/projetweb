<?php

include '../../Controller/typet.php';
include '../../model/type.php';
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
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin Display</title>
    <style>
body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 60vh;
            margin: 200;
            background-color: #fff; 
            background-image: url('ba.png'); 
            background-size: cover; 
            background-position: center; 
        }
    </style>
</head>

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