function verify() {
    
    var f = document.getElementById("f");

    function username(value) {
        var i = 0;
        while (i < value.length && /[a-zA-Z0-9]/.test(value[i])) {
            i++;
        }
        return i === value.length && value.length>2;
    }
    

    var username = f.uname.value;
    if (!username(username)) {
        alert("Username is not valid (only numbers and letters, and must be at least 8 characters long).");
        return false;
    }

    var nom = f.nom.value;
    if (!isLettersOnly(nom) || nom.length < 2) {
        alert("Enter a valid last name (only letters, at least 2 characters).");
        return false;
    }

    var prenom = f.prenom.value;
    if (!isLettersOnly(prenom) || prenom.length < 2) {
        alert("Enter a valid first name (only letters, at least 2 characters).");
        return false;
    }

    var description = f.desc.value;
    if (!/^[A-Za-z0-9]*$/.test(description) || description.length < 8) {
        alert("Description is not valid (only letters and numbers, and must be at least 8 characters long).");
        return false;
    }

    // Similar validations for email, role, and password...

    function isStrongPassword(password) {
        var passwordRegex = /^(?=.*[A-Z])(?=.*[a-z])(?=.*[!@#$%^&*()_+{}\[\]:;<>,.?~\\-]).{8,}$/;
        return passwordRegex.test(password);
    }

    var password = f.pass.value;
    if (!isStrongPassword(password)) {
        alert("Password is not strong enough (must contain at least one uppercase letter, one lowercase letter, one special character, and be at least 8 characters long).");
        return false;
    }

    alert("Form is valid.");
    return true;

    function isLettersOnly(value) {
        var i = 0;
        while (i < value.length && /[a-zA-Z]/.test(value[i])) {
            i++;
        }
        return i === value.length;
    }
}
