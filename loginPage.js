function ValidationLogin(email, password) {
    //storing both inputs in a variable
    var emailValue = document.getElementById("email");
    var passwordValue = document.getElementById("password");

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

    // An else part to validate correct email and password formats
    alert("Your email address and password is valid!");
    return true;
}
