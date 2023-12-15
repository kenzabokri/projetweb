<?php
    include '../../../controller/user_management/user_control.php';
    require '../../../config.php';

    $db=config::getConnexion();
    User_control::delete_user($db,$_POST['user_id']);
    header("location: ./manipulate_users.php");
?>
