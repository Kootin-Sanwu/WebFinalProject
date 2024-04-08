document.addEventListener('DOMContentLoaded', function () {

    var homeButton = document.querySelector(".container-three button[name=homeButton]");
    var manageButton = document.querySelector(".container-three button[name=manageButton]");
    var choreButton = document.querySelector(".container-three button[name=choreButton]");
    var settingsButton = document.querySelector(".container-four button[name=settingsButton]");
    var requestButton = document.querySelector(".container-three button[name=requestButton]");


    function submitHover(button) {
        button.style.transform = 'translateY(-2px)';
        button.style.backgroundColor = '#ef17eb';
        button.style.boxShadow = '5px 5px rgb(65, 65, 65)';
    }

    function resetStyles() {
        homeButton.style.transform = 'translateY(0px)';
        homeButton.style.backgroundColor = '#6f006d';
        homeButton.style.boxShadow = '1px 1px rgb(65, 65, 65)';

        manageButton.style.transform = 'translateY(0px)';
        manageButton.style.backgroundColor = '#6f006d';
        manageButton.style.boxShadow = '1px 1px rgb(65, 65, 65)';

        choreButton.style.transform = 'translateY(0px)';
        choreButton.style.backgroundColor = '#6f006d';
        choreButton.style.boxShadow = '1px 1px rgb(65, 65, 65)';

        settingsButton.style.transform = 'translateY(0px)';
        settingsButton.style.backgroundColor = '#6f006d';

        requestButton.style.transform = 'translateY(0px)';
        requestButton.style.backgroundColor = '#6f006d';
        requestButton.style.boxShadow = '1px 1px rgb(65, 65, 65)';
    }

    function applyAddPressedEffect(button) {
        button.style.transform = 'translateY(4px)';
        button.style.backgroundColor = "black";
        button.style.boxShadow = 'none';
    }

    homeButton.addEventListener('mouseover', function () {
        submitHover(this);
    });

    homeButton.addEventListener('mouseout', function () {
        resetStyles();
    });

    homeButton.addEventListener('mousedown', function () {
        applyAddPressedEffect(this);
    });

    homeButton.addEventListener('mouseup', function () {
        submitHover(this);
    });

    manageButton.addEventListener('mouseover', function () {
        submitHover(this);
    });

    manageButton.addEventListener('mouseout', function () {
        resetStyles();
    });

    manageButton.addEventListener('mousedown', function () {
        applyAddPressedEffect(this);
    });

    manageButton.addEventListener('mouseup', function () {
        submitHover(this);
    });

    choreButton.addEventListener('mouseover', function () {
        submitHover(this);
    });

    choreButton.addEventListener('mouseout', function () {
        resetStyles();
    });

    choreButton.addEventListener('mousedown', function () {
        applyAddPressedEffect(this);
    });

    choreButton.addEventListener('mouseup', function () {
        submitHover(this);
    });

    settingsButton.addEventListener('mouseover', function () {
        submitHover(this);
    });

    settingsButton.addEventListener('mouseout', function () {
        resetStyles();
    });

    settingsButton.addEventListener('mousedown', function () {
        applyAddPressedEffect(this);
    });

    settingsButton.addEventListener('mouseup', function () {
        submitHover(this);
    });

    requestButton.addEventListener('mouseover', function () {
        submitHover(this);
    });

    requestButton.addEventListener('mouseout', function () {
        resetStyles();
    });

    requestButton.addEventListener('mousedown', function () {
        applyAddPressedEffect(this);
    });

    requestButton.addEventListener('mouseup', function () {
        submitHover(this);
    });
});
