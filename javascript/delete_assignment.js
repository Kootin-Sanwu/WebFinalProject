document.addEventListener('DOMContentLoaded', function () {

    var deleteButton = document.querySelector(".submit button[name=deleteButton]");
    var closeButton = document.querySelector(".close-form-group button[name=closeButton]");

    function deleteHover(button) {
        button.style.transform = 'translateY(-2px)';
        button.style.backgroundColor = '#3d84ff';
        button.style.boxShadow = '5px 5px grey';
    }

    function closeHover(button) {
        button.style.transform = 'translateY(-2px)';
        button.style.backgroundColor = '#red';
        button.style.boxShadow = '5px 5px grey';
    }

    function deleteResetStyles() {
        deleteButton.style.transform = 'translateY(2px)';
        deleteButton.style.backgroundColor = '#1f4a94';
        deleteButton.style.boxShadow = '1px 1px grey';
    }

    function closeResetStyles() {
        closeButton.style.transform = 'translateY(2px)';
        closeButton.style.backgroundColor = '#red';
        closeButton.style.boxShadow = '1px 1px grey';
    }


    function submitPressEffect(button) {
        button.style.transform = 'translateY(4px)';
        button.style.backgroundColor = "black";
        button.style.boxShadow = 'none';
    }

    function closePressEffect(button) {
        button.style.transform = 'translateY(4px)';
        button.style.backgroundColor = "red";
        button.style.boxShadow = 'none';
    }

    deleteButton.addEventListener('mouseover', function () {
        deleteHover(this);
    });

    deleteButton.addEventListener('mouseout', function () {
        deleteResetStyles();
    });

    deleteButton.addEventListener('mousedown', function () {
        submitPressEffect(this);
    });

    deleteButton.addEventListener('mouseup', function () {
        deleteHover(this);
        addChore(this);
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
    });
});

function openPopup() {
    document.getElementById('overlay').style.display = 'block';
    document.getElementById('popup').style.display = 'block';
}

