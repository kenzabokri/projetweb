<?php
include '../../Controller/formulairef.php';
include '../../model/formulaire.php';

$error = "";


$formulaire = null;

$formulairef = new formulairef();
if (
    isset($_POST["nom"]) &&
    isset($_POST["prenom"]) &&
    isset($_POST["ticket"]) &&
    isset($_POST["role"]) &&
    isset($_POST["nome"]) &&
    isset($_POST["numero"]) 
) {
    if (
        !empty($_POST['nom']) &&
        !empty($_POST["prenom"]) &&
        !empty($_POST["ticket"]) &&
        !empty($_POST["role"]) &&
        !empty($_POST['nome']) &&
        !empty($_POST["numero"])
    ) {
        $formulaire = new formulaire(
            null,
            $_POST['nom'],
            $_POST['prenom'],
            $_POST['ticket'],
            $_POST['role'],
            $_POST['nome'],
            $_POST['numero']
        );

        $formulairef->add($formulaire);
        //header('Location:listformulaire.php');
    } else {
        $error = "Missing information";
        echo $error; // Ajout de message pour le débogage
    }
}

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 60vh;
            margin: 200;
            background-color: #fff;
            background-image: url('ra.jpg');
            background-size: cover;
            background-position: center;
        }
    </style>
    <title>formulaire</title>
</head>

<body>
    <a href="./listformulaire.php">Back to list </a>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>
    <form action="" method="POST" >
        <table border="1" align="center" >

            <tr>
                <td>
                    <label for="nom">nom:
                    </label>
                </td>
                <td><input type="text" name="nom" id="nom" maxlength="20"></td>
            </tr>
            <tr>
                <td>
                    <label for="prenom">prenom:
                    </label>
                </td>
                <td><input type="text" name="prenom" id="prenom" maxlength="20"></td>
            </tr>
            <tr>
                <td>
                    <label for="ticket">ticket:
                    </label>
                </td>
                <td>
                    <input type="text" name="ticket" id="ticket">
                </td>
            </tr>
            <tr>
    <td>
        <label for="role">role dans event:</label>
    </td>
    <td>
        <select name="role" id="role">
            <option value="visiteur">visiteur</option>
            <option value="participant">participant</option>
        </select>
    </td>
</tr>
<tr>
    <td>
        <label for="nome">nom event:</label>
    </td>
    <td>
        <select name="nome" id="nome">
            <option value="paint">paint</option>
            <option value="draw">draw</option>
        </select>
    </td>
</tr>
<tr>
                <td>
                    <label for="numero">numero de telephone:
                    </label>
                </td>
                <td>
                    <input type="text" name="numero" id="numero">
                </td>
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
</body>

</html>          