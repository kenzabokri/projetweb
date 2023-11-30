<?php
    require "../config.php";
    include "../model/User.php";
    include "../controller/user_control.php";
    $id_user=$_POST["id"];
    $user=new user($_POST["first_name"],$_POST["last_name"],$_POST["email"],$_POST["role"],$_POST["password"]);
    $db=config::getConnexion();
    User_control::update_user($db,$user,$id_user);
    if ($_POST["role"]=="ART THERAPIST") {
        header("location: ./arttherapist_panel/index.php?id=$id_user");
    }
    else{
        header("location: ./patient_panel/index.php?id=$id_user");
    }
    
?>