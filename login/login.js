function validate() {
    var emailInput = document.getElementById('email');
    var emailError = document.getElementById('emailError');
    var passwordInput = document.getElementById('password');
    var passwordError = document.getElementById('passwordError');

    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (!emailRegex.test(emailInput.value)) {
            emailError.style.visibility = 'visible';
            emailError.style.display = 'block';
            return false;
    }
    
    else {
        emailError.style.visibility = 'invisible';
        emailError.style.display = 'none';
    }

    if (passwordInput.value.length < 8) {
        passwordError.style.visibility = 'visible';
        passwordError.style.display = 'block';
        return false;
    }

    else {
        passwordError.style.visibility = 'invisible';
        passwordError.style.display = 'none';
    }

    return true;
}
