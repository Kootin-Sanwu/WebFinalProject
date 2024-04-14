document.addEventListener('DOMContentLoaded', function () {

    var closeButton = document.querySelector(".close-form-group button[name=closeButton]");
    var projectButton = document.querySelector(".form-group input[name=projectname");
    var departmentButton = document.querySelector(".form-group select[name=department_ID]");
    var submitButton = document.querySelector(".submit button[name=submitButton]");

    function submitHover(button) {
        button.style.transform = 'translateY(-3px)';
        button.style.backgroundColor = '#3d84ff';
        button.style.boxShadow = '5px 5px grey';
    }

    function inputHover(button) {
        button.style.transform = 'translateY(-3px)';
        button.style.backgroundColor = '#d2d1d1';
        button.style.boxShadow = '5px 5px grey';
    }

    function closeHover(button) {
        button.style.transform = 'translateY(-2px)';
        button.style.backgroundColor = '#red';
        button.style.boxShadow = '5px 5px grey';
    }

    function resetStyles() {
        closeButton.style.transform = 'translateY(0px)';
        closeButton.style.backgroundColor = '#red';
        closeButton.style.boxShadow = '1px 1px grey';

        projectButton.style.transform = 'translateY(0px)';
        projectButton.style.backgroundColor = '#d2d1d1';
        projectButton.style.boxShadow = '2px 2px grey';

        departmentButton.style.transform = 'translateY(0px)';
        departmentButton.style.backgroundColor = '#d2d1d1';
        departmentButton.style.boxShadow = '2px 2px grey';

        submitButton.style.transform = 'translateY(0px)';
        submitButton.style.backgroundColor = '#1f4a94';
        submitButton.style.boxShadow = '1px 1px grey';
    }

    function submitPressEffect(button) {
        button.style.transform = 'translateY(4px)';
        button.style.backgroundColor = "#d2d1d1";
        button.style.boxShadow = 'none';
    }

    function inputPressEffect(button) {
        button.style.transform = 'translateY(4px)';
        button.style.backgroundColor = "#d2d1d1";
        button.style.boxShadow = 'none';
    }

    function closePressEffect(button) {
        button.style.transform = 'translateY(4px)';
        button.style.backgroundColor = "white";
        button.style.boxShadow = 'none';
    }

    submitButton.addEventListener('mouseover', function () {
        submitHover(this);
    });

    submitButton.addEventListener('mouseout', function () {
        resetStyles();
    });

    submitButton.addEventListener('mousedown', function () {
        submitPressEffect(this);
    });

    submitButton.addEventListener('mouseup', function () {
        submitHover(this);
    });

    closeButton.addEventListener('mouseover', function () {
        closeHover(this);
    });

    closeButton.addEventListener('mouseout', function () {
        resetStyles();
    });

    closeButton.addEventListener('mousedown', function () {
        closePressEffect(this);
        closePopup(this);
    });

    departmentButton.addEventListener('mouseover', function () {
        inputHover(this);
    });

    departmentButton.addEventListener('mouseout', function () {
        resetStyles();
    });

    departmentButton.addEventListener('mousedown', function () {
        inputPressEffect(this);
    });

    departmentButton.addEventListener('mouseup', function () {
        inputHover(this);
    });

    projectButton.addEventListener('mouseover', function () {
        inputHover(this);
    });

    projectButton.addEventListener('mouseout', function () {
        resetStyles();
    });

    projectButton.addEventListener('mousedown', function () {
        inputPressEffect(this);
    });

    projectButton.addEventListener('mouseup', function () {
        inputHover(this);
    });
});

function closePopup() {
    window.location.href = "../directions/close_direction.php";
}

function openPopup() {
    document.getElementById('overlay').style.display = 'block';
    document.getElementById('popup').style.display = 'block';
}
