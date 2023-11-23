function verify() {


    var f = document.getElementById("f");
    
    var nom = f.nom.value;
    if (!/^[A-Za-z]+$/.test(nom) || nom.length < 2) {
        alert("you must  enter a valid lastname (only letters, at least 2 caracters)");
        return false;
    }

    var prenom = f.prenom.value;
    if (!/^[A-Za-z]+$/.test(prenom) || prenom.length < 2) {
        alert("you must  enter a valid lastname (only letters, at least 2 caracters)");
        return false;
    }

    var email = f.mail.value;
    if (!/^\S+@\S+\.\S+$/.test(email)) {
        alert("the email that you have entred is not valid");
        return false;
    }

    var role = f.role;
    var selectedValue = role.options[role.selectedIndex].value;
    if (selectedValue=="no" ){
        alert("you must choose a role");
        return false;
    }

    function isValidUsername(username) {
        var UserNameRegex = /^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])/;
    
        return UserNameRegex.test(username)&&username.length>8;
    }

    var username = f.uname.value;
    if (!isValidUsername(username)) {
        alert("userName is not valid (just caracters and numbers,lenght must be =>8 ).");
        return false;
    }
    
    function isValidDesc( description) {
        var descRegex = /^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])/;
    
        return descRegex.test(description)&&description.length>8;
    }
    var description = f.desc.value;
    var username = f.uname.value;
    if (!isValidDesc( description)) {
        alert("description is not valid (just caracters and numbers,lenght must be =>8 ).");
        return false;
    }

    function isStrongPassword(password) {
        var passwordRegex = /^(?=.*[A-Z])(?=.*[a-z])(?=.*[!@#$%^&*()_+{}\[\]:;<>,.?~\\-])/;
    
        return passwordRegex.test(password)&&password.length>8;
    }
    
    var password = f.pass.value;
    if (!isStrongPassword(password)) {
        alert("Password is not strong enough.");
        return false;
    }


    




    alert("valide");
    return true; 
}