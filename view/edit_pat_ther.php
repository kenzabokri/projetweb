
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="./assets/css/style.css">
    <title>Ludiflex | Login & Registration</title>
    <script src="./assets/js/edit.js" ></script>
</head>
<body>

<script>
    var a = document.getElementById("loginBtn");
    var b = document.getElementById("registerBtn");
    var x = document.getElementById("login");
    var y = document.getElementById("register");
window.onload =function(){
        x.style.left = "-510px";
        y.style.right = "5px";
        a.className = "btn";
        b.className += " white-btn";
        x.style.opacity = 0;
        y.style.opacity = 1;

};
</script>
<script type="text/javascript">
    function googleTranslateElementInit() {  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');}
</script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
 <div class="wrapper">
    <nav class="nav">
    <div class="translate" id="google_translate_element"></div>
        <div class="nav-logo">
            <p><img src="./assets/img/logo_2.png" height="70px" width="70px"></p>
        </div>

        <div class="nav-button">
            <button class="btn" id="registerBtn" onclick="register()">Edit</button>
        </div>
        <div class="nav-menu-btn">
            <i class="bx bx-menu" onclick="myMenuFunction()"></i>
        </div>
    </nav>

<!----------------------------- Form box ----------------------------------->    
    <div class="form-box">
        
        <!------------------- login form -------------------------->

        <div class="login-container" id="login">
            <form action="./login.php" method="POST" hidden>
               
                <div class="input-box">
                    <input type="text" class="input-field" placeholder="Username or Email" name="email">
                    <i class="bx bx-user"></i>
                </div>
                <div class="input-box">
                    <input type="password" class="input-field" placeholder="Password" name="password">
                    <i class="bx bx-lock-alt"></i>
                </div>
                <div class="input-box">
                    <input type="submit" class="submit" value="Sign In">
                </div>
                <div class="two-col">
                    
                    <div class="two">
                        <label><a href="./forget.html">Forgot password?</a></label>
                    </div>
                </div>
            </form>
        </div>

        <!------------------- registration form -------------------------->
        <?php
            include_once "../config.php";
            include '../controller/user_control.php';
            $db=config::getConnexion();
            $id=$_GET['id'];
            $query=$db->prepare("select * from users where user_id='$id'");
            $query->execute(); 
            $result = $query->fetchAll($db::FETCH_ASSOC);
            foreach ($result as $t) {
            }
        ?>
        <div class="register-container" id="register">
            <form action="./edit_pat_ther1.php" method="post" id='f'>
                <div class="top">
                    <span>Have an account? <a href="#" onclick="login()">Login</a></span>
                    <header>Edit</header>
                </div>
                <div class="input-box">
                        <input type="text" class="input-field" placeholder="Firstname" name="id" value="<?php echo$t['user_id']?>" hidden>
                        
                    </div>
                <div class="two-forms">
                    
                    <div class="input-box">
                        <input type="text" class="input-field" placeholder="Firstname" id="first_name" name="first_name" value="<?php echo$t['first_name']?>">
                        <i class="bx bx-user"></i>
                    </div>
                    <div class="input-box">
                        <input type="text" class="input-field" placeholder="Lastname" id="last_name" name="last_name" value="<?php echo$t['last_name']?>">
                        <i class="bx bx-user"></i>
                    </div>
                </div>
                <div class="input-box">
                    <input type="text" class="input-field" placeholder="Email" id="role" name="role" value="<?php echo$t['role']?>" hidden>
                    
                </div>
                <div class="input-box">
                    <input type="text" class="input-field" placeholder="Email" id="email" name="email" value="<?php echo$t['email']?>">
                    <i class="bx bx-envelope"></i>
                </div>
                <div class="input-box">
                    <input type="password" class="input-field" placeholder="Password" id="password" name="password" value="<?php echo$t['password']?>">
                    <i class="bx bx-lock-alt"></i>
                </div>
                <div class="input-box">
                    <button onclick="return verif()" type="submit" class="submit" >Confirm</button>
                    
                </div>
                <pre>
                    
                </pre>
            </form>
        </div>
    </div>
</div>   


<script>
   
   function myMenuFunction() {
    var i = document.getElementById("navMenu");

    if(i.className === "nav-menu") {
        i.className += " responsive";
    } else {
        i.className = "nav-menu";
    }
   }
 
</script>

<script>

    var a = document.getElementById("loginBtn");
    var b = document.getElementById("registerBtn");
    var x = document.getElementById("login");
    var y = document.getElementById("register");

    /*function login() {
        x.style.left = "4px";
        y.style.right = "-520px";
        a.className += " white-btn";
        b.className = "btn";
        x.style.opacity = 1;
        y.style.opacity = 0;
    }*/

    function register() {
        x.style.left = "-510px";
        y.style.right = "5px";
        a.className = "btn";
        b.className += " white-btn";
        x.style.opacity = 0;
        y.style.opacity = 1;
    }

</script>

</body>
</html>
