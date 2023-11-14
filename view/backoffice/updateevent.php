<!-- updateevent.php -->

<?php
require_once 'C:\xampp\htdocs\projet\views\Back Office\config.php';
$pdo = config::getConnexion();

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idevent_to_update = htmlspecialchars($_POST["idevent_to_update"]);

    // Récupérer les informations actuelles de l'événement
    $query = $pdo->prepare("SELECT * FROM event WHERE idevent = :idevent");
    $query->bindParam(':idevent', $idevent_to_update);
    $query->execute();
    $event = $query->fetch(PDO::FETCH_ASSOC);

    // Vérifier si l'événement existe
    if (!$event) {
        echo "Événement non trouvé.";
        exit();
    }

    $nomevent = htmlspecialchars($_POST["nomevent"]);
    $date = htmlspecialchars($_POST["date"]);
    $description = htmlspecialchars($_POST["description"]);
    $heuredebut = htmlspecialchars($_POST["heuredebut"]);
    $heurefin = htmlspecialchars($_POST["heurefin"]);
    $capacite = htmlspecialchars($_POST["capacite"]);
    $image = htmlspecialchars($_POST["image"]);
    $type = htmlspecialchars($_POST["type"]);
    $lieu = htmlspecialchars($_POST["lieu"]);

    try {
        // Mettre à jour les informations dans la table 'event'
        $query = $pdo->prepare("UPDATE event SET nomevent = :nomevent, date = :date, description = :description, heuredebut = :heuredebut, heurefin = :heurefin, capacite = :capacite, image = :image, type = :type, lieu = :lieu WHERE idevent = :idevent");
        $query->bindParam(':idevent', $idevent_to_update);
        $query->bindParam(':nomevent', $nomevent);
        $query->bindParam(':date', $date);
        $query->bindParam(':description', $description);
        $query->bindParam(':heuredebut', $heuredebut);
        $query->bindParam(':heurefin', $heurefin);
        $query->bindParam(':capacite', $capacite);
        $query->bindParam(':image', $image);
        $query->bindParam(':type', $type);
        $query->bindParam(':lieu', $lieu);

        $query->execute();

        // Redirection après une mise à jour réussie
        header("Location: ./updateevent.php?idevent=$idevent_to_update");
        exit();
    } catch (PDOException $e) {
        // Gérer les erreurs de la base de données
        // die('Error: ' . $e->getMessage());
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- ... (autres balises meta et lien) ... -->
</head>

<body class="g-sidenav-show  bg-gray-100">
    <!-- ... (autres balises HTML) ... -->

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-body p-3">
                            <form action="updateevent.php" method="POST">
                                <label for="idevent_to_update">ID de l'event à modifier:</label>
                                <input type="text" name="idevent_to_update" id="idevent_to_update" required>
                                <br>

                                <label for="nomevent">Nom event:</label>
                                <input type="text" name="nomevent" id="nomevent"  required>
                                <br>

                                <label for="date">Date:</label>
                                <input type="text" name="date" id="date"  required>
                                <br>
                            
                                <label for="description">Description event:</label>
                                <input type="text" name="description" id="description"  required>
                                <br>

                                <label for="heuredebut">Heure début:</label>
                                <input type="text" name="heuredebut" id="heuredebut"  required>
                                <br>

                                <label for="heurefin">Heure fin:</label>
                                <input type="text" name="heurefin" id="heurefin"  required>
                                <br>

                                <label for="capacite">Capacité:</label>
                                <input type="text" name="capacite" id="capacite"  required>
                                <br>
                            
                                <label for="image">Image:</label>
                                <input type="text" name="image" id="image"  required>
                                <br>

                                <label for="type">Type:</label>
                                <input type="text" name="type" id="type"  required>
                                <br>

                                <label for="lieu">Lieu:</label>
                                <input type="text" name="lieu" id="lieu" required>
                                <br>

                                <input type="submit" value="Enregistrer">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- ... (autres balises script) ... -->
</body>

</html>
