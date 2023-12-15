


<html>
    <head>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    </head>
</html>

<?php
    require('../../../config.php');
    include '../../../controller/user_management/user_control.php';
    $db=config::getConnexion();
    $res=User_control::show_users($db);
    $found=0;
    foreach($res as $t){
        if($t['email']==$_POST['email']){
            $first_name = $t['first_name'];
            $last_name = $t['last_name'];
            $found=1;
            break;
        }
    }

    if($found){
        $email = $_POST['email'];
        $message = $_POST['message'];
        // Using placeholders to prevent SQL injection
        $query = 'INSERT INTO temoignages VALUES (NULL, :first_name, :last_name, :email, :message)';
        $statement = $db->prepare($query);

        // Bind parameters
        $statement->bindParam(':first_name', $first_name);
        $statement->bindParam(':last_name', $last_name);
        $statement->bindParam(':email', $email);
        $statement->bindParam(':message', $message);

        // Execute the query
        $statement->execute();
        echo"<p style='color: green'>comment sent successfully</p>";
    }
     else{
            echo"<p style='color:red' >email not registered</p>";
    }
    
?>

