<?php 

session_start();

if(isset($_SESSION['id'])){
    header("location: ../index.php");
}
else{


?>
<html lang="en">
<head>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://www.google.com/recaptcha/api.js" async defer ></script>
    <link rel="stylesheet" href="../../assets/style1.css">
    <link rel="stylesheet" href="../style_event.css">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <title>Ludiflex | Login & Registration</title>
</head>
<body>
 <div class="wrapper">
    <nav class="nav">
        <div class="nav-logo">
            <p>
                <a href="../index.php"><img src="../../images/logo_2.png" height="70px" width="70px">
                <a href="../index.php">home</a>
            </p>
            
        </div>

        <div class="nav-buttonn">
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
            <form action="./login.php" method="post">
                
                <div class="input-box">
                    <input type="text" class="input-field" placeholder=" Email" name="email" id="email">
                    <i class="bx bx-user"></i>
                </div>
                <div class="input-box">
                    <input type="password" class="input-field" placeholder="Password" name="password" id="password">
                    <i class="bx bx-lock-alt"></i>
                </div>
                <div class="g-recaptcha" data-sitekey="6Le7QycpAAAAAGI_ELuaOlYQeNe5uvuoMX68FibY" id="g-recaptcha" > </div>
                <div class="input-box">
                    <input type="submit" class="submit" value="Sign In" onclick="return validateLoginForm()">
                    <div id="erreur" ></div>
                </div>
                
                <div class="two-col">
                    
                    <div class="two">
                        <label><a href="./forget.html">Forgot password?</a></label>
                    </div>
                </div>
            </form>
        </div>

        <!------------------- registration form -------------------------->
        <div class="register-container" id="register" >
            
                <div class="top">
                    <span>Have an account? <a href="#" onclick="login()">Login</a></span>
                 <header><pre>   </pre></header>
                </div>
                <div class="two-forms">
                    <div class="input-box">
                        <input type="text" class="input-field" placeholder="Firstname" name="first_name" id="first_name">
                        <i class="bx bx-user"></i>
                    </div>
                    <div class="input-box">
                        <input type="text" class="input-field" placeholder="Lastname" name="last_name" id="last_name">
                        <i class="bx bx-user"></i>
                    </div>
                </div>
                <div class="input-box">
                    <select class="input-field" name="role" id="role">
                        <option value="" style="color:aliceblue;">Role</option>
                        <option value="PATIENT" style="color: black;">PATIENT</option>
                        <option value="ART THERAPIST" style="color: black;">ART THERAPIST</option>
                    </select>
                    
                </div>
                <pre> </pre>
                <div class="input-box">
                    <input type="text" class="input-field" placeholder="Email" name="email" id="emailR">
                    <i class="bx bx-envelope"></i>
                </div>
                <div class="input-box">
                    <input type="password" class="input-field" placeholder="Password" name="password" id="passwordR">
                    <i class="bx bx-lock-alt"></i>
                </div>
                <div class="g-recaptcha" data-sitekey="6Le7QycpAAAAAGI_ELuaOlYQeNe5uvuoMX68FibY" > </div>
                <div class="input-box">
                    <input type="submit" class="submit" value="Register" onclick="return validateRegisterForm()">
                    <div id="erreurr" ></div>
                </div>
                <pre>
                    
                    
                </pre>
           
        </div>
    </div>
    <ul class="circles">
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
  </ul>
</div>   


<script>
    function add_user(){
        $(document).ready(function(){
            var first_name=document.getElementById('first_name').value;
            var last_name=document.getElementById('last_name').value;
            var email=document.getElementById('emailR').value;
            var role=document.getElementById('role').value;
            var password=document.getElementById('passwordR').value;
            $("#erreurr").load("add_user.php",{
                first_name: first_name,
                last_name: last_name,
                email: email,
                role: role,
                password: password
            });
        });
    }
   
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
   
    function validateRegisterForm() {
        var email = document.getElementById('emailR').value;
        var role = document.getElementById('role').value;
        var password = document.getElementById('passwordR').value;
        var first_name = document.getElementById('first_name').value;
        var last_name = document.getElementById('last_name').value;

        // Check if required fields are empty
        if (email.trim() === '' || password.trim() === '' || role.trim() === '' || first_name.trim() === '' || last_name.trim() === '') {
            document.getElementById('erreurr').innerHTML="<p style='color:red' >Please fill in all required fields.</p>";
            return false; // Prevent form submission
        }

        // Basic email validation
        if (!isValidEmail(email)) {
            document.getElementById('erreurr').innerHTML="<p style='color:red' >Please enter a valid email address.</p>";
            return false; // Prevent form submission
        }

        // You can add more specific validation if needed

        // If all validations pass, the form will be submitted
        add_user();
        return true;
    }
       

    
      
           function validateLoginForm() {
                var email = document.getElementById('email').value;
                var password = document.getElementById('password').value;
        
                // Check if required fields are empty
                if (email.trim() === '' || password.trim() === '') {
                    document.getElementById('erreur').innerHTML="<p style='color:red' >Please fill in all required fields.</p>";
                    return false; // Prevent form submission
                }
        
                // Basic email validation
                if (!isValidEmail(email)) {
                    document.getElementById('erreur').innerHTML="<p style='color:red' >Please enter a valid email address.</p>";
                    return false; // Prevent form submission
                }
        
                // You can add more specific validation if needed
        
                // If all validations pass, the form will be submitted
                return true;
            }
           
        
            function isValidEmail(email) {
                // Basic email validation using indexOf
                return email.indexOf('@') !== -1 && email.indexOf('.') !== -1;
            }

        
    
        
   
    
    
    

</script>

</body>
</html>
<?php
 }
?>