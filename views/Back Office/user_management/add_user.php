<html>
<head><script src="https://code.jquery.com/jquery-3.7.1.min.js"></script></head>
<div class="contactform" >
   <h3>Add user</h3>
 
    
      <div class="inputboite">
         <input type="text" placeholder="first_name" id="first_name"  >
      </div>
      <div class="inputboite">
         <input type="text" placeholder="last_name" id="last_name"  >
      </div>
      <div class="inputboite">
         <input type="text" placeholder="email" id="email" >
      </div>
      <div class="inputboite">
        <select name="" id="role">
         <option value="">role</option>
         <option value="PATIENT">PATIENT</option>
         <option value="ART THERAPIST">ART THERAPIST</option>
         <option value="UserAdmin">User Admin</option>
         <option value="artpiecesAdmin">artpieces Admin</option>
         <option value="LessionsAdmin">Lessions Admin</option>
        </select>
      </div>
      <div class="inputboite">
         <input type="password" placeholder="password" id="password" >
      </div>
      <div class="inputboite">
         <button class="btn-reserve" onclick="return validateRegistrationForm()" >confirm</button>
         <div id="erreur" style="color: red;" ></div>
      </div> 
      
   
</div>
 
<script>
   function add_user(){
        $(document).ready(function(){
            var first_name=document.getElementById('first_name').value;
            var last_name=document.getElementById('last_name').value;
            var email=document.getElementById('email').value;
            var role=document.getElementById('role').value;
            var password=document.getElementById('password').value;
            $("#erreur").load("add_user1.php",{
                first_name: first_name,
                last_name: last_name,
                email: email,
                role: role,
                password: password
            });
        });
    }
   
   function validateRegistrationForm() {
            var firstName = document.getElementById('first_name').value;
            var lastName = document.getElementById('last_name').value;
            var role = document.getElementById('role').value;
            var email = document.getElementById('email').value;
            var password = document.getElementById('password').value;
    
            // Check if required fields are empty
            if (firstName.length== 0 || lastName.length== 0   || password.length== 0) {
                document.getElementById('erreur').innerHTML="Please fill in all required fields"
                return false; // Prevent form submission
            }
    
            // Check if a valid email address is entered
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                document.getElementById('erreur').innerHTML="Please enter a valid email address."
                return false; // Prevent form submission
            }
    
            // You can add more specific validation if needed
    
            // If all validations pass, the form will be submitted
            add_user();
            return true;
        }
</script>
 
</html>