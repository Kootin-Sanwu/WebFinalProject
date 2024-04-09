document.addEventListener("DOMContentLoaded", function () {
    var logInButton = document.querySelector(".log-In-button button[name=login]");
    var usernameInput = document.querySelector(".logIn-form input[name=email]");
    var passwordInput = document.querySelector(".logIn-form input[name=password]");
    var googleButton = document.querySelector(".Google-button button[name=google-button]");
    var microsoftButton = document.querySelector(".Microsoft-button button[name=microsoft-button]");

    function resetStyles() {
        logInButton.style.backgroundColor = '#1f4a94';
        logInButton.style.boxShadow = '2px 2px grey';
        usernameInput.style.boxShadow = 'none';
        passwordInput.style.boxShadow = 'none';
        googleButton.style.boxShadow = '4px 4px grey';
        microsoftButton.style.boxShadow = '4px 4px grey';
    }

    function applyPressedEffect(button) {
        button.style.boxShadow = 'none';
        button.style.transform = 'translateY(4px)';
    }

    function removePressedEffect(button) {
        button.style.boxShadow = '4px 4px grey';
        button.style.transform = 'translateY(0px)';
    }

    function applyLogInPressedEffect(button) {
        button.style.boxShadow = 'none';
        button.style.transform = 'translateY(4px)';
        button.style.backgroundColor = "black";
    }

    function removeLogInPressedEffect(button) {
        button.style.boxShadow = '4px 4px grey';
        button.style.backgroundColor = "#3d84ff";
        button.style.transform = 'translateY(0px)';
    }

    function applyHover(button) {
        button.style.backgroundColor = '#3d84ff';
        button.style.boxShadow = '4px 4px grey';
    }

    logInButton.addEventListener('mouseover', function () {
        applyHover(this);
    });

    logInButton.addEventListener('mouseout', function () {
        resetStyles();
    });

    logInButton.addEventListener('mousedown', function () {
        applyLogInPressedEffect(this);
    });

    logInButton.addEventListener('mouseup', function () {
        removeLogInPressedEffect(this);
    });

    usernameInput.addEventListener('click', function () {
        resetStyles();
        this.style.boxShadow = '6px 6px grey';
    });

    passwordInput.addEventListener('click', function () {
        resetStyles();
        this.style.boxShadow = '6px 6px grey';
    });

    googleButton.addEventListener('mousedown', function () {
        applyPressedEffect(this);
    });

    googleButton.addEventListener('mouseup', function () {
        removePressedEffect(this);
    });

    microsoftButton.addEventListener('mousedown', function () {
        applyPressedEffect(this);
    });

    microsoftButton.addEventListener('mouseup', function () {
        removePressedEffect(this);
    });

    // PASWORD VALIDATION

    function validatePassword() {
        var userPassword = passwordInput.value;

        var numbersCheck = /\d/.test(userPassword);
        var lengthCheck = userPassword.length >= 8;
        var lowerCaseCheck = /[a-z]/.test(userPassword);
        var upperCaseCheck = /[A-Z]/.test(userPassword);
        var specialCharactersCheck = /[!@#$%^&*(),.?":{}|<>]/.test(userPassword);

        var messages = [];

        if (!numbersCheck) {
            messages.push('Must contain a number.');
        }

        if (!specialCharactersCheck) {
            messages.push('Must contain special characters');
        }

        if (!lengthCheck) {
            messages.push('Must contain at least 8 characters.');
        }

        if (!lowerCaseCheck) {
            messages.push('Must contain lowercase characters.');
        }

        if (!upperCaseCheck) {
            messages.push('Must contain uppercase characters.');
        }

        var criteriaMessagesDiv = document.getElementById('password-criteria-messages');
        criteriaMessagesDiv.innerHTML = '';

        // Display messages one at a time with animation
        messages.forEach(function (message, index) {
            setTimeout(function () {
                var messageElement = document.createElement('div');
                messageElement.classList.add('password-message');
                messageElement.textContent = message;
                criteriaMessagesDiv.appendChild(messageElement);
            }, index * 500);
        });

        return lengthCheck && lowerCaseCheck && upperCaseCheck && numbersCheck && specialCharactersCheck;
    }

    function handleFormSubmission(event) {
        if (!validatePassword()) {
            event.preventDefault();
        }
    }

    document.querySelector(".logIn-container").addEventListener('submit', handleFormSubmission);
});