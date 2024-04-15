document.addEventListener('DOMContentLoaded', function () {

    var addButton = document.querySelector(".submit button[name=submitButton]");
    var closeButton = document.querySelector(".close-form-group button[name=closeButton]");
    var projectName = document.getElementById("assign_project_name");
    var projectDepartment = document.getElementById("assign_project_department");

    function submitHover(button) {
        button.style.transform = 'translateY(-2px)';
        button.style.backgroundColor = '#3d84ff';
        button.style.boxShadow = '5px 5px grey';
    }

    function closeHover(button) {
        button.style.transform = 'translateY(-2px)';
        button.style.backgroundColor = '#red';
        button.style.boxShadow = '5px 5px grey';
    }

    function resetStyles() {
        addButton.style.transform = 'translateY(2px)';
        addButton.style.backgroundColor = '#1f4a94';
        addButton.style.boxShadow = '1px 1px grey';
    }

    function closeResetStyles() {
        closeButton.style.transform = 'translateY(2px)';
        closeButton.style.backgroundColor = '#red';
        closeButton.style.boxShadow = '1px 1px grey';
    }

    function closePressEffect() {
        closeButton.style.transform = 'translateY(2px)';
        closeButton.style.backgroundColor = '#red';
        closeButton.style.boxShadow = 'none';
    }

    function applyAddPressedEffect(button) {
        button.style.transform = 'translateY(4px)';
        button.style.backgroundColor = "black";
        button.style.boxShadow = 'none';
    }

    function toggleRequired() {
        projectName.required = !projectName.required;
        projectDepartment.required = !projectDepartment.required;
    }

    addButton.addEventListener('mouseover', function () {
        submitHover(this);
    });

    addButton.addEventListener('mouseout', function () {
        resetStyles();
    });

    addButton.addEventListener('mousedown', function () {
        applyAddPressedEffect(this);
    });

    addButton.addEventListener('mouseup', function () {
        submitHover(this);
    });

    closeButton.addEventListener('mouseover', function () {
        closeHover(this);
    });

    closeButton.addEventListener('mouseout', function () {
        closeResetStyles();
    });

    closeButton.addEventListener('mousedown', function () {
        closePressEffect(this);
    });

    closeButton.addEventListener('mouseup', function () {
        closeHover(this);
        toggleRequired();
    });

});
