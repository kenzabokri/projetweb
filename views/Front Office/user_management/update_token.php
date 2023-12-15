<?php
// update_token.php
require('../../../config.php');
$db=config::getConnexion();
// Assuming $db is your database connection
$query = $db->prepare('UPDATE users SET token = 1 WHERE user_id = :id');
$query->bindParam(':id', $_POST['id_user']);
$query->execute();

// You can send a response back if needed
echo '
    <ul class="info">
        <li><h5>mail verified successfully<h5></li>
    </ul>
';
?>
