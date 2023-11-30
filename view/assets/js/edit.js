function verif() {
    // Get form input values
    var firstName = document.getElementById('first_name').value;
    var lastName = document.getElementById('last_name').value;
    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;

    // Simple validation example (you can customize this)
    if (firstName== '' || lastName== '' || email== '' || password== '') {
        alert('Please fill in all fields.');
        return false; // Prevent form submission
    }

    // Additional validation logic can be added here
    // For example, you can check the format of the email using a regular expression
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        alert('Please enter a valid email address.');
        return false; // Prevent form submission
    }

    // You can add more custom validation logic as needed

    // If all validations pass, allow the form to be submitted
    return true;
}

function verif1() {
    // Get form input values
    var firstName = document.getElementById('first_name').value;
    var lastName = document.getElementById('last_name').value;
    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;
    var roleSelect = document.getElementById('role');
    var selectedRole = roleSelect.options[roleSelect.selectedIndex].value;

    // Simple validation example (you can customize this)
    if (firstName== '' || lastName== '' || email== '' || password== '') {
        alert('Please fill in all fields.');
        return false; // Prevent form submission
    }

    // Additional validation logic can be added here
    // For example, you can check the format of the email using a regular expression
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        alert('Please enter a valid email address.');
        return false; // Prevent form submission
    }
    if (selectedRole=="") {
        alert('Please select a role.');
        return false; // Prevent form submission
    }

    // You can add more custom validation logic as needed

    // If all validations pass, allow the form to be submitted
    return true;
}

function verif2() {
    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;
    if (email== '' || password== '') {
        alert('Please fill in all fields.');
        return false; 
    }
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        alert('Please enter a valid email address.');
        return false; // Prevent form submission

    }
    return true;
}