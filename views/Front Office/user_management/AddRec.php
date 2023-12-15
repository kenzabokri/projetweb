<?php
require '../../../config.php';

try {
    $db = config::getConnexion();

    $first_name = $_POST['first_name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $query = $db->prepare('INSERT INTO reclamation VALUES (NULL, :first_name, :email, :message)');

    $query->bindParam(':first_name', $first_name);
    $query->bindParam(':email', $email);
    $query->bindParam(':message', $message);

    $query->execute();

    echo'reclamation sent successfully
    ';
    exit();
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
