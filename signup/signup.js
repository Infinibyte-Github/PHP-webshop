function validate() {
    var emailInput = document.getElementById('email');
    var passwordInput = document.getElementById('password');
    var confirmPasswordInput = document.getElementById('confirmPassword');
    var emailError = document.getElementById('emailError');
    var passwordErrorShort = document.getElementById('passwordErrorShort');
    var passwordErrorWrong = document.getElementById('passwordErrorWrong');

    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    // add firstname, lastname and address validation
    var firstnameInput = document.getElementById('firstName');
    var lastnameInput = document.getElementById('lastName');
    var addressInput = document.getElementById('address');
    var firstnameError = document.getElementById('firstNameError');
    var lastnameError = document.getElementById('lastNameError');
    var addressError = document.getElementById('addressError');

    if (firstnameInput.value.length < 1) {
        firstnameError.style.visibility = 'visible';
        firstnameError.style.display = 'block';
        return false;
    }

    firstnameError.style.visibility = 'invisible';
    firstnameError.style.display = 'none';

    if (lastnameInput.value.length < 1) {
        lastnameError.style.visibility = 'visible';
        lastnameError.style.display = 'block';
        return false;
    }

    lastnameError.style.visibility = 'invisible';
    lastnameError.style.display = 'none';

    if (addressInput.value.length < 1) {
        addressError.style.visibility = 'visible';
        addressError.style.display = 'block';
        return false;
    }

    addressError.style.visibility = 'invisible';
    addressError.style.display = 'none';

    if (!emailRegex.test(emailInput.value)) {
        emailError.style.visibility = 'visible';
        emailError.style.display = 'block';
        return false;
    }


    emailError.style.visibility = 'invisible';
    emailError.style.display = 'none';


    if (passwordInput.value !== confirmPasswordInput.value) {
        passwordErrorWrong.style.visibility = 'visible';
        passwordErrorWrong.style.display = 'block';
        return false;
    }


    passwordErrorWrong.style.visibility = 'invisible';
    passwordErrorWrong.style.display = 'none';


    if (passwordInput.value.length < 8) {
        passwordErrorShort.style.visibility = 'visible';
        passwordErrorShort.style.display = 'block';
        return false;
    }


    passwordErrorShort.style.visibility = 'invisible';
    passwordErrorShort.style.display = 'none';


    return true;
}
