<?php
    require "../../../config.php";
    include "../../../model/user_management/User.php";
    include "../../../controller/user_management/user_control.php";
    $id_user=$_POST["id_user"];
    $user=new user($_POST["first_name"],$_POST["last_name"],$_POST["email"],$_POST["role"],$_POST["password"]);
    $db=config::getConnexion();
    User_control::update_user($db,$user,$id_user);
    echo "<ul style='
    
    text-align:center;
    display: flex;
    justify-content: center;
    align-items: center;
    background-size: cover;
    font-size:30px;
    color:  black;'>
             <li><h4>Updated successfully</h4></li>
          </ul>";

?>
