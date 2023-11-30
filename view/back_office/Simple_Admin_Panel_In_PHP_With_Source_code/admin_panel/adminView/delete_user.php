<?php
include_once "../config.php";
include '../controller/user_control.php';


    $userId =$_GET["id"];

    
        $db = config::getConnexion();
        // Call a function to delete the user in your user_control.php or wherever it's handled
        User_control::delete_user($db, $userId);
        // You can echo a success message or any response if needed
        echo "User deleted successfully";
        header("location: ../index.php#productsizes");
   

?>
