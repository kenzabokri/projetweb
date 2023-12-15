<?php
require '../../../config.php';
$pdo = config::getConnexion();

try {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Check if the file was uploaded without errors
        if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
            // Read the image file
            $imageData = file_get_contents($_FILES['photo']['tmp_name']);

            // Close the existing connection to handle potential "MySQL server has gone away" issue
            $pdo = null;

            // Reconnect to the database
            $pdo = new PDO('mysql:host=localhost;dbname=user_management', 'root', '');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Insert the image data into the database using a prepared statement
            $stmt = $pdo->prepare('INSERT INTO images (image_data) VALUES (?)');
            $stmt->bindParam(1, $imageData, PDO::PARAM_LOB);

            if ($stmt->execute()) {
                echo 'Image uploaded and stored in the database.';
            } else {
                echo 'Error storing the image in the database.';
            }
        } else {
            echo 'Error uploading the file.';
        }
    }
} catch (PDOException $e) {
    // Handle PDO exceptions
    echo 'PDO Exception: ' . $e->getMessage();
} finally {
    // Close the connection in the "finally" block to ensure it happens regardless of success or failure
    $pdo = null;
}
?>
