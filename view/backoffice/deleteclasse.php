<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Classe</title>

    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            background-color: #f0f0f0; 
        }

        form {
            text-align: center;
            width: 300px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            background-color: #fff;
            background-image: url('../Back Office/logo_2.png');
            background-size: cover;
            background-position: center; 
        }
    </style>
</head>

<body>

    <form action="./deleteclasse.php" method="GET">
        <h1>
            <input type="text" name='idclasse' placeholder="ID Classe">
            <input type="submit" value="OK">
        </h1>
    </form>

    <?php
    require_once 'C:\xampp\htdocs\projetamine\views\Back Office\config.php';

    $pdo = config::getConnexion();
    $idclasse = isset($_GET['idclasse']) ? htmlspecialchars($_GET['idclasse']) : null;

    if ($idclasse !== null) {
        try {
            
            $query = $pdo->prepare("DELETE FROM class WHERE idclasse = :idclasse");
            $query->bindParam(':idclasse', $idclasse);
            $query->execute();

            
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    ?>

</body>

</html>
