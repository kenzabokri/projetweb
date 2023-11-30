<?php
    require '../config.php';
    include '../controller/user_control.php';
    include '../model/User.php';

    $user=new user($_POST["first_name"],$_POST["last_name"],$_POST["email"],$_POST["role"],$_POST["password"]);
    $db=config::getConnexion();
    User_control::add_user($db,$user);
    header("location: register.html");
    
?>