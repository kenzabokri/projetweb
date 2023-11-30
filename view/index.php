<?php
session_start();

if (isset($_SESSION['email'])) {
     header('Location: https://www.google.com');
    exit();
         
}else{

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="./assets/css/style.css">
    <title>Ludiflex | Login & Registration</title>
    <script src="assets/js/edit.js" ></script>
    <style>
        /* Add your custom styles for the Google Translate widget here */
        #google_translate_element {
            
            padding: 50px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>


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
            <button class="btn white-btn" id="loginBtn" onclick="login()">Sign In</button>
            <button class="btn" id="registerBtn" onclick="register()">Sign Up</button>
        </div>
        <div class="nav-menu-btn">
            <i class="bx bx-menu" onclick="myMenuFunction()"></i>
        </div>
    </nav>

<!----------------------------- Form box ----------------------------------->    
    <div class="form-box">
        
        <!------------------- login form -------------------------->

        <div class="login-container" id="login">
            <form action="./login.php" method="POST">
                <div class="top">
                    <span>Don't have an account? <a href="#" onclick="register()">Sign Up</a></span>
                    <header>Login</header>
                </div>
                <div class="input-box">
                    <input type="text" class="input-field" placeholder="Username or Email" id="email" name="email">
                    <i class="bx bx-user"></i>
                </div>
                <div class="input-box">
                    <input type="password" class="input-field" placeholder="Password" id="password" name="password">
                    <i class="bx bx-lock-alt"></i>
                </div>
                <div class="input-box">
                    <input onclick="return verif2()" type="submit" class="submit" value="Sign In">
                </div>
                <div class="two-col">
                    
                    <div class="two">
                        <label><a href="./forget.html">Forgot password?</a></label>
                    </div>
                </div>
            </form>
        </div>

        <!------------------- registration form -------------------------->
        <div class="register-container" id="register">
            <form action="./register.php" method="post">
                <div class="top">
                    <span>Have an account? <a href="#" onclick="login()">Login</a></span>
                    <header>Sign Up</header>
                </div>
                <div class="two-forms">
                    <div class="input-box">
                        <input type="text" class="input-field" placeholder="Firstname" id="first_name" name="first_name">
                        <i class="bx bx-user"></i>
                    </div>
                    <div class="input-box">
                        <input type="text" class="input-field" placeholder="Lastname" id="last_name" name="last_name">
                        <i class="bx bx-user"></i>
                    </div>
                </div>
                <div class="input-box">
                    <select class="input-field" id="role" name="role">
                        <option value="" style="color:aliceblue;">Role</option>
                        <option value="PATIENT" style="color: black;">PATIENT</option>
                        <option value="ART THERAPIST" style="color: black;">ART THERAPIST</option>
                    </select>
                    
                </div>
                <pre> </pre>
                <div class="input-box">
                    <input type="text" class="input-field" placeholder="Email" id="email" name="email">
                    <i class="bx bx-envelope"></i>
                </div>
                <div class="input-box">
                    <input type="password" class="input-field" placeholder="Password" id="password" name="password">
                    <i class="bx bx-lock-alt"></i>
                </div>
                <div class="input-box">
                    <input onclick="return verif()" type="submit" class="submit" value="Register">
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

    function login() {
        x.style.left = "4px";
        y.style.right = "-520px";
        a.className += " white-btn";
        b.className = "btn";
        x.style.opacity = 1;
        y.style.opacity = 0;
    }

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
<?php
}
?>