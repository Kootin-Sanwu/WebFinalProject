document.addEventListener('DOMContentLoaded', function () {

    var homeButton = document.querySelector(".container-three button[name=homeButton]");
    var manageButton = document.querySelector(".container-three button[name=manageButton]");
    var choreButton = document.querySelector(".container-three button[name=choreButton]");
    var requestButton = document.querySelector(".container-three button[name=requestButton]");
    var settingsButton = document.querySelector(".container-four button[name=settingsButton]");
    var allButton = document.querySelector(".statistic-container button[name=allChoresButton]");
    var progressButton = document.querySelector(".statistic-container button[name=inProgressButton]");
    var completeButton = document.querySelector(".statistic-container button[name=completeButton]");
    var incompleteButton = document.querySelector(".statistic-container button[name=incompleteButton]");
    var generalAssignmentButton = document.querySelector(".assigned-container button[name=generalAssignmentButton]");

    function submitHover(button) {
        button.style.transform = 'translateY(-2px)';
        button.style.backgroundColor = '#ef17eb';
        button.style.boxShadow = '5px 5px rgb(65, 65, 65)';
    };

    function submitHoverGeneralAssignmentButton(button) {
        button.style.transform = 'translateY(-2px)';
        button.style.backgroundColor = 'rgb(110, 110, 110)';
        button.style.boxShadow = '5px 5px rgb(65, 65, 65)';
    };

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
        settingsButton.style.boxShadow = '1px 1px rgb(65, 65, 65)';

        allButton.style.transform = 'translateY(0px)';
        allButton.style.backgroundColor = '#6f006d';
        allButton.style.boxShadow = '1px 1px rgb(65, 65, 65)';

        progressButton.style.transform = 'translateY(0px)';
        progressButton.style.backgroundColor = '#6f006d';
        progressButton.style.boxShadow = '1px 1px rgb(65, 65, 65)';

        completeButton.style.transform = 'translateY(0px)';
        completeButton.style.backgroundColor = '#6f006d';
        completeButton.style.boxShadow = '1px 1px rgb(65, 65, 65)';

        incompleteButton.style.transform = 'translateY(0px)';
        incompleteButton.style.backgroundColor = '#6f006d';
        incompleteButton.style.boxShadow = '1px 1px rgb(65, 65, 65)';

        requestButton.style.transform = 'translateY(0px)';
        requestButton.style.backgroundColor = '#6f006d';
        requestButton.style.boxShadow = '1px 1px rgb(65, 65, 65)';

        generalAssignmentButton.style.transform = 'translateY(0px)';
        generalAssignmentButton.style.backgroundColor = 'rgb(110, 110, 110)';
        generalAssignmentButton.style.boxShadow = '1px 1px rgb(65, 65, 65)';
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

    allButton.addEventListener('mouseover', function () {
        submitHover(this);
    });

    allButton.addEventListener('mouseout', function () {
        resetStyles();
    });

    allButton.addEventListener('mousedown', function () {
        applyAddPressedEffect(this);
    });

    allButton.addEventListener('mouseup', function () {
        submitHover(this);
    });

    progressButton.addEventListener('mouseover', function () {
        submitHover(this);
    });

    progressButton.addEventListener('mouseout', function () {
        resetStyles();
    });

    progressButton.addEventListener('mousedown', function () {
        applyAddPressedEffect(this);
    });

    progressButton.addEventListener('mouseup', function () {
        submitHover(this);
    });

    completeButton.addEventListener('mouseover', function () {
        submitHover(this);
    });

    completeButton.addEventListener('mouseout', function () {
        resetStyles();
    });

    completeButton.addEventListener('mousedown', function () {
        applyAddPressedEffect(this);
    });

    completeButton.addEventListener('mouseup', function () {
        submitHover(this);
    });

    incompleteButton.addEventListener('mouseover', function () {
        submitHover(this);
    });

    incompleteButton.addEventListener('mouseout', function () {
        resetStyles();
    });

    incompleteButton.addEventListener('mousedown', function () {
        applyAddPressedEffect(this);
    });

    incompleteButton.addEventListener('mouseup', function () {
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

    generalAssignmentButton.addEventListener('mouseover', function () {
        submitHoverGeneralAssignmentButton(this);
    });

    generalAssignmentButton.addEventListener('mouseout', function () {
        resetStyles();
    });

    generalAssignmentButton.addEventListener('mousedown', function () {
        applyAddPressedEffect(this);
    });

    generalAssignmentButton.addEventListener('mouseup', function () {
        submitHoverGeneralAssignmentButton(this);
    });
});
