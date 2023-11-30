<?php
  require '../config.php';
  include '../controller/user_control.php';
  include '../model/User.php';

  $db=config::getConnexion();
  $user=new user($_POST['first_name'],$_POST['last_name'],$_POST['email'],$_POST['role'],$_POST['password']);
  User_control::update_user($db,$user,$_POST['id']);
  header("location: ../index.php#productsizes");

?>