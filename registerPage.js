function ValidationFunctions(email, password) {
    //storing both inputs in a variable
    var emailValue = document.getElementById("email");
    var passwordValue = document.getElementById("password");
    var confirmPasswordValue = document.getElementById("confirmPassword");

    // validation for Email
    var emailRegex = /^[a-zA-Z0-9._%+-]+@ashesi\.edu\.gh$/;

    if (!emailValue.value.match(emailRegex)) {
        alert("Invalid email address!");
        return false;
    }

    // validation for Password
    var passwordRegex = /^(?=.*[0-9]{6})(?=.*[a-zA-Z]{2})[a-zA-Z0-9]{8}$/;

    if (!passwordValue.value.match(passwordRegex)) {
        alert("Invalid password! It must be 8 characters with at least 6 digits and 2 letters of any case.");
        return false;
    }

    // Check if the passwords match
    if (passwordValue.value !== confirmPasswordValue.value) {
        alert("Passwords do not match!");
        return false;
    }

    // An else part to validate correct email, password, and confirmation
    alert("Your email address, password, and confirmation are valid!");
    return true;
}
