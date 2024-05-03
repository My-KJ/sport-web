function myFunction() {
    var passwordField = document.getElementById("password");
    var confirmPasswordField = document.getElementById("confirm_password");

    if (passwordField.type === "password" && confirmPasswordField.type === "password") {
        passwordField.type = "text";
        confirmPasswordField.type = "text";
    } else {
        passwordField.type = "password";
        confirmPasswordField.type = "password";
    }
    }