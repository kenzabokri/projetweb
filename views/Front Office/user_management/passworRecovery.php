


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../../assets/style1.css">
    <script src="https://www.google.com/recaptcha/api.js" async defer ></script>
    <title>Ludiflex | Login & Registration</title>
</head>

<body >
<div id='body'>
    <?php
    require '../../../config.php';

    if (isset($_POST['Password'])) {
    
        $id= $_GET['id'];
      
        $password = $_POST['Password'];

        if (!empty($id) && !empty($password)) {
            // Sanitize and validate inputs if needed

            $db = config::getConnexion();

            // Use prepared statements to prevent SQL injection
            $query = $db->prepare("
                UPDATE users
                SET 
                password = :password 
                WHERE 
                user_id = :id
            ");

            $query->bindParam(':id', $id, PDO::PARAM_INT);
            $query->bindParam(':password', $password, PDO::PARAM_STR);

            // Execute the query and handle errors
            try {
                $query->execute();
                ?>
                <script>
                    console.log("sdfvqsgz");
                    document.getElementById('body').innerHTML = "<h1 style='text-align: center;color:black'>Password updated successfully<h1>";
                </script>
                <?php
            } catch (PDOException $e) {
                // Handle database errors
                echo "Error updating password: " . $e->getMessage();
            }
        } else {
            // Handle invalid or missing parameters
            echo "Invalid or missing parameters";
        }
    }
    ?>
    <div class="wrapper">
        <nav class="nav">
            <div class="translate" id="google_translate_element"></div>

            <script type="text/javascript">
                function googleTranslateElementInit() {  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');}
            </script>
            <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
            
            <pre>

            <h1 style="text-align: center;color:aliceblue" >password recovery</h1>   
            </pre>
            <div class="nav-logo">
                <p><img src="../../images/logo_2.png" height="70px" width="70px"></p>
                
            </div>
            <div class="nav-menu-btn">
                <i class="bx bx-menu" onclick="myMenuFunction()"></i>
                
            </div>
        </nav>

    <!----------------------------- Form box ----------------------------------->    
        <div class="form-box"  >
            
            <!------------------- login form -------------------------->

            <div class="login-container" id="login">
                
                <form action="" method="POST">
                    <div class="input-box">
                        <input type="text" class="input-field" placeholder="New Password" name="Password">
                        <i class="bx bx-lock-alt"></i>
                    </div>
                    <div class="g-recaptcha" data-siteket="6LdLGCYpAAAAAPRdMH3nhQC6um-rTQz3Q97xYCEq"> </div>
                    <div class="input-box">
                        <input type="submit" class="submit" value="confirm">
                    </div>
                </form>
                
            </div>
        </div>
    </div>   

</div>



</body>
</html>