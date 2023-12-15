<html>
    <head>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="contactform" id='container'>
            <div id="edited"></div>
            <h3>Type a comment</h3>
        
            <div class="inputboite">
                <input type="text" placeholder="email" id="email" >
            </div>
        
            <div class="inputboite">
                <input type="text" placeholder="comment" id="message" >
            </div>
            <div class="inputboite">
                <button class="btn-reserve" onclick="return validateRegistrationForm()" >confirm</button>
            </div> 
        </div>
    </body>
</html>
<script>
   function validateRegistrationForm() {
            var email = document.getElementById('email').value;
            var message = document.getElementById('message').value;
    
            // Check if required fields are empty
            if (message.length== 0) {
                alert('Please fill in all required fields.');
                return false; // Prevent form submission
            }
    
            // Check if a valid email address is entered
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                alert('Please enter a valid email address.');
                return false; // Prevent form submission
            }
    
            // You can add more specific validation if needed
    
            // If all validations pass, the form will be submitted
            add_comment();
            return true;
    }
    function add_comment() {
        $(document).ready(function () {
            var email = document.getElementById('email').value;
            var message = document.getElementById('message').value;

            $("#container").load("user_management/add_comment.php", {
                email: email,
                message: message
            });
        });
    }

</script>
    
