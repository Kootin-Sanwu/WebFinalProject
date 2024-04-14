document.addEventListener('DOMContentLoaded', function () {

    var addButton = document.querySelector(".submit button[name=addButton]");
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
        addButton.style.transform = 'translateY(2px)';
        addButton.style.backgroundColor = '#1f4a94';
        addButton.style.boxShadow = '1px 1px grey';
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
        addChore(this);
    });

    closeButton.addEventListener('mouseover', function () {
        closeHover(this);
    });

    closeButton.addEventListener('mouseout', function () {
        closeResetStyles();
    });

    closeButton.addEventListener('mousedown', function (event) {
        event.preventDefault();
        window.location.href = "../directions/close_request_direction.php?msg=close";
    });
    
    // function closePopup(event) {
    //     event.preventDefault();
    //     window.location.href = "../directions/close_request_direction.php?msg=close";
    // };

    // const closeButton = document.getElementById("closePopup");

    // closeButton.addEventListener("click", function(event) {
    //     event.preventDefault();
    //     window.location.href = "../directions/close_request_direction.php?msg=close";
    // });
});

function openPopup() {
    document.getElementById('overlay').style.display = 'block';
    document.getElementById('popup').style.display = 'block';
}