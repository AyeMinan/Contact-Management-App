document.getElementById('contactForm').addEventListener('submit', function (event) {
    var firstName = document.getElementById('firstName').value;
    var lastName = document.getElementById('lastName').value;
    var phoneNumber = document.getElementById('phoneNumber').value;
    var email = document.getElementById('email').value;
    var address = document.getElementById('address').value;
    var firstNameError = document.getElementById('firstNameError');
    var lastNameError = document.getElementById('lastNameError');
    var phoneNumberError = document.getElementById('phoneNumberError');
    var emailError = document.getElementById('emailError');
    var addressError = document.getElementById('addressError');
    var isValid = true;

    firstNameError.textContent = '';
    lastNameError.textContent = '';
    phoneNumberError.textContent = '';
    emailError.textContent = '';
    addressError.textContent = '';

    // Validating First Name (should not be empty and should contain only letters)
    if (!firstName.trim()) {
        firstNameError.textContent = 'First Name is required';
        isValid = false;
    } else if (!/^[a-zA-Z]+$/.test(firstName)) {
        firstNameError.textContent = 'First Name must contain only letters';
        isValid = false;
    }
    //validating email address (should not be empty)
    if (!email.trim()) {
        emailError.textContent = 'Email is required';
        isValid = false;
    }
    //validating address(should not be empty)
    if (!address.trim()) {
        addressError.textContent = 'Address is required';
        isValid = false;
    }
    // Validating Last Name (should not be empty and should contain only letters)
    if (!lastName.trim()) {
        lastNameError.textContent = 'Last Name is required';
        isValid = false;
    } else if (!/^[a-zA-Z]+$/.test(lastName)) {
        lastNameError.textContent = 'Last Name must contain only letters';
        isValid = false;
    }

    // Validating Phone Number (should not be empty and should contain only digits)
    if (!phoneNumber.trim()) {
        phoneNumberError.textContent = 'Phone Number is required';
        isValid = false;
    } else if (!/^[0-9]+$/.test(phoneNumber)) {
        phoneNumberError.textContent = 'Phone Number must contain only digits';
        isValid = false;
    }

    // Preventing form submission if validation fails
    if (!isValid) {
        event.preventDefault();
    }
});