document.addEventListener('DOMContentLoaded', function () {

    var deleteButton = document.querySelector(".submit button[name=deleteButton]");
    var closeButton = document.querySelector(".close-form-group button[name=closeButton]");

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
        deleteButton.style.transform = 'translateY(2px)';
        deleteButton.style.backgroundColor = '#1f4a94';
        deleteButton.style.boxShadow = '1px 1px grey';
    }

    function closeResetStyles() {
        closeButton.style.transform = 'translateY(2px)';
        closeButton.style.backgroundColor = '#red';
        closeButton.style.boxShadow = '1px 1px grey';
    }

    function applyAddPressedEffect(button) {
        button.style.transform = 'translateY(4px)';
        button.style.backgroundColor = "black";
        button.style.boxShadow = 'none';
    }

    deleteButton.addEventListener('mouseover', function () {
        submitHover(this);
    });

    deleteButton.addEventListener('mouseout', function () {
        resetStyles();
    });

    deleteButton.addEventListener('mousedown', function () {
        applyAddPressedEffect(this);
    });

    deleteButton.addEventListener('mouseup', function () {
        submitHover(this);
        addChore(this);
    });

    closeButton.addEventListener('mouseover', function () {
        closeHover(this);
    });

    closeButton.addEventListener('mouseout', function () {
        closeResetStyles();
    });

    closeButton.addEventListener('mousedown', function () {
        applyAddPressedEffect(this);
    });

    closeButton.addEventListener('mouseup', function () {
        closeHover(this);
    });
});

function openPopup() {
    document.getElementById('overlay').style.display = 'block';
    document.getElementById('popup').style.display = 'block';
}

