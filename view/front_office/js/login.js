function verify1() {


    var f1 = document.getElementById("f1");
    

    function isValidUsername(username) {
        var UserNameRegex = /^(?=.*[a-z])/;
    
        return UserNameRegex.test(username)&&username.length>8;
    }

    var username = f1.user.value;
    if (!isValidUsername(username)) {
        alert("!!userName");
        return false;
    }
    
    
    function isStrongPassword(password) {
        var passwordRegex = /^(?=.*[A-Z])(?=.*[a-z])(?=.*[!@#$%^&*()_+{}\[\]:;<>,.?~\\-])/;
    
        return passwordRegex.test(password)&&password.length>8;
    }
    
    var password = f1.pass.value;
    if (!isStrongPassword(password)) {
        alert("!!password");
        return false;
    }


    




    alert("valide");
    return true; 
}