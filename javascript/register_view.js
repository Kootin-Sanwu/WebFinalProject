document.addEventListener("DOMContentLoaded", function () {
    var registerButton = document.querySelector(".register-button");
    var logInButton = document.querySelector(".signIn-button");
    var firstNameInput = document.querySelector(".register-form input[name=firstName]");
    var lastNameInput = document.querySelector(".register-form input[name=lastName]");
    var phoneInput = document.querySelector(".register-form input[name=phoneNumber]");
    var departmentInput = document.querySelector(".register-form select[name=department_ID]");
    var roleInput = document.querySelector(".register-form select[name=role_ID]");
    var emailInput = document.querySelector(".register-form input[name=email]");
    var passwordInput = document.querySelector(".register-form input[name=password]");
    var confirmInput = document.querySelector(".register-form input[name=confirmpassword]");

    function resetStyles() {
        registerButton.style.backgroundColor = '#1f4a94';
        registerButton.style.boxShadow = '2px 2px grey';
        logInButton.style.backgroundColor = '#1f4a94';
        logInButton.style.boxShadow = '2px 2px grey';
        firstNameInput.style.boxShadow = 'none';
        lastNameInput.style.boxShadow = 'none';
        phoneInput.style.boxShadow = 'none';
        departmentInput.style.boxShadow = 'none';
        roleInput.style.boxShadow = 'none';
        emailInput.style.boxShadow = 'none';
        passwordInput.style.boxShadow = 'none';
        confirmInput.style.boxShadow = 'none';
    }

    function applyRegisterPressedEffect(button) {
        button.style.boxShadow = 'none';
        button.style.transform = 'translateY(4px)';
        button.style.backgroundColor = "black";
    }

    function removeRegisterPressedEffect(button) {
        button.style.boxShadow = '6px 6px grey';
        button.style.backgroundColor = "#3d84ff";
        button.style.transform = 'translateY(0px)';
    }

    function applyHover(button) {
        button.style.backgroundColor = '#3d84ff';
        button.style.boxShadow = '6px 6px grey';
    }

    registerButton.addEventListener('mouseover', function () {
        applyHover(this);
    });

    registerButton.addEventListener('mouseout', function () {
        resetStyles();
    });

    registerButton.addEventListener('mousedown', function () {
        applyRegisterPressedEffect(this);
    });

    registerButton.addEventListener('mouseup', function () {
        removeRegisterPressedEffect(this);
    });

    logInButton.addEventListener('mouseover', function () {
        applyHover(this);
    });

    logInButton.addEventListener('mouseout', function () {
        resetStyles();
    });

    logInButton.addEventListener('mousedown', function () {
        applyRegisterPressedEffect(this);
    });

    logInButton.addEventListener('mouseup', function () {
        removeRegisterPressedEffect(this);
    });

    firstNameInput.addEventListener('click', function () {
        resetStyles();
        this.style.boxShadow = '6px 6px grey';
    });

    lastNameInput.addEventListener('click', function () {
        resetStyles();
        this.style.boxShadow = '6px 6px grey';
    });

    phoneInput.addEventListener('click', function () {
        resetStyles();
        this.style.boxShadow = '6px 6px grey';
    });

    departmentInput.addEventListener('click', function () {
        resetStyles();
        this.style.boxShadow = '6px 6px grey';
    });

    roleInput.addEventListener('click', function () {
        resetStyles();
        this.style.boxShadow = '6px 6px grey';
    });

    emailInput.addEventListener('click', function () {
        resetStyles();
        this.style.boxShadow = '6px 6px grey';
    });

    passwordInput.addEventListener('click', function () {
        resetStyles();
        this.style.boxShadow = '6px 6px grey';
    });

    confirmInput.addEventListener('click', function () {
        resetStyles();
        this.style.boxShadow = '6px 6px grey';
    });

    // DEPARTMENT AND ROLE COMBINATION
    function validateDepartmentRoleCombination() {
        var departmentID = departmentInput.value;
        var roleID = roleInput.value;
        var messages = [];

        var validRolesForDepartment = {
            1: [1],          // Head quarters can have Primary Project Manager
            2: [2, 9],       // Plumbing Department can have Head of Plumbers or General Worker
            3: [3, 9],       // Electrical Department can have Head of Electricians or General Worker
            4: [4, 9],       // Concretery Department can have Head of Concrete Workers or General Worker
            5: [5, 9],       // Carpentery Department can have Head of Carpenters or General Worker
            6: [6, 9],       // Roofing Department can have Head of Roofers or General Worker
            7: [7, 9],       // Surveying & Mapping Department can have Head of Surveyors or General Worker
            8: [8, 9]        // Welding Department can have Head of Welders or General Worker
        };

        if (!validRolesForDepartment[departmentID] || !validRolesForDepartment[departmentID].includes(Number(roleID))) {
            messages.push('Department and Role Mismatch');
        }

        return { isValid: messages.length === 0, messages: messages };
    }

    // PASSWORD VALIDATION
    function validatePassword() {
        var userPassword = passwordInput.value;
        var confirmPassword = confirmInput.value;

        var lengthCheck = userPassword.length >= 8;
        var lowerCaseCheck = /[a-z]/.test(userPassword);
        var upperCaseCheck = /[A-Z]/.test(userPassword);
        var numbersCheck = /\d/.test(userPassword);
        var specialCharactersCheck = /[!@#$%^&*(),.?":{}|<>]/.test(userPassword);
        var confirm = userPassword === confirmPassword;

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

        if (!confirm) {
            messages.push('Password Mismatch')
        }

        return { isValid: lengthCheck && lowerCaseCheck && upperCaseCheck && numbersCheck && specialCharactersCheck && confirm, messages: messages };

    }

    function handleFormSubmission(event) {
        var departmentValidation = validateDepartmentRoleCombination();
        var passwordValidation = validatePassword();
        
        var combinedMessages = [...departmentValidation.messages, ...passwordValidation.messages];

        var criteriaMessagesDiv = document.getElementById('password-criteria-messages');
        criteriaMessagesDiv.innerHTML = '';

        // Display messages one at a time with animation
        combinedMessages.forEach(function (message, index) {
            setTimeout(function () {
                var messageElement = document.createElement('div');
                messageElement.classList.add('password-message');
                messageElement.textContent = message;
                criteriaMessagesDiv.appendChild(messageElement);
            }, index * 500);
        });

        if (!departmentValidation.isValid || !passwordValidation.isValid) {
            event.preventDefault();
        }
    }

    document.querySelector(".register-container").addEventListener('submit', handleFormSubmission);
});
