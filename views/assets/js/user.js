function show_user(){
    $(document).ready(function(){
        var id=document.getElementById('id').value;
        $("#container").load("show_user.php",{
            id_user: id
        });
    });
}

function show_users(){
    $(document).ready(function(){
        $("#container").load("show_users.php");
    });
    
}

function updatePinfo(){
    $(document).ready(function(){
        var id=document.getElementById('id').value;
        $("#container").load("edit_user.php",{
            id_user: id
        });
    });
}

function update_user(){
    $(document).ready(function(){
        var id=document.getElementById('id').value;
        var first_name=document.getElementById('first_name').value;
        var last_name=document.getElementById('last_name').value;
        var email=document.getElementById('email').value;
        var role=document.getElementById('role').value;
        var password=document.getElementById('password').value;
        $("#container").load("update_user.php",{
            id_user: id,
            first_name: first_name,
            last_name: last_name,
            email: email,
            role: role,
            password: password
        });
    });
}

function verifyMail(){
   
    $(document).ready(function(){
        
        
        var id=document.getElementById('id').value;
        console.log("sending");
        $("#container").load("verifMail.php",{
            id_user: id
        });
    });
}


