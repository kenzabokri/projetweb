<?php
    require "../config.php";
    include "../model/User.php";
    include "../controller/user_control.php";
    $id_user=$_POST["id"];
    $user=new user($_POST["first_name"],$_POST["last_name"],$_POST["email"],$_POST["role"],$_POST["password"]);
    $db=config::getConnexion();
    User_control::update_user($db,$user,$id_user);
    header("location: .\back_office\Simple_Admin_Panel_In_PHP_With_Source_code\admin_panel");
?>