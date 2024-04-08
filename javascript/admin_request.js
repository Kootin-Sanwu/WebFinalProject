document.addEventListener('DOMContentLoaded', function () {

    // // Add event listeners to handle checkbox changes
    // function addCheckboxListeners(approveCheckbox, rejectCheckbox) {
    //     approveCheckbox.addEventListener('change', function () {
    //         if (this.checked) {
    //             rejectCheckbox.checked = false;
    //         }
    //     });

    //     rejectCheckbox.addEventListener('change', function () {
    //         if (this.checked) {
    //             approveCheckbox.checked = false;
    //         }
    //     });
    // }

    // // Loop through each project item and add event listeners
    // const projectItems = document.querySelectorAll('.project-item');

    // projectItems.forEach(projectItem => {
    //     const approveCheckbox = projectItem.querySelector('input[value="approved"]');
    //     const rejectCheckbox = projectItem.querySelector('input[value="rejected"]');

    //     addCheckboxListeners(approveCheckbox, rejectCheckbox);
    // });

























    // const checkboxApprove = document.getElementById('checkBoxApprove');
    // const checkboxReject = document.getElementById('checkBoxReject');

    // // Retrieve checkbox states from localStorage
    // let checkBoxStates = JSON.parse(localStorage.getItem('checkBoxStates')) || {};

    // // Initialize checkboxes based on retrieved states
    // if (checkBoxStates['checkBoxApprove'] === 'checked') {
    //     checkboxApprove.checked = true;
    // }
    // if (checkBoxStates['checkBoxReject'] === 'checked') {
    //     checkboxReject.checked = true;
    // }

    // // Add click event listener to toggle checkboxes and save states
    // checkboxApprove.addEventListener('click', function () {
    //     if (this.checked) {
    //         checkBoxStates['checkBoxApprove'] = 'checked';
    //         checkBoxStates['checkBoxReject'] = 'unchecked';
    //         setFormAction('../actions/request_action.php?msg=approve');
    //     } else {
    //         checkBoxStates['checkBoxApprove'] = 'unchecked';
    //     }
    //     localStorage.setItem('checkBoxStates', JSON.stringify(checkBoxStates));
    // });

    // checkboxReject.addEventListener('click', function () {
    //     if (this.checked) {
    //         checkBoxStates['checkBoxReject'] = 'checked';
    //         checkBoxStates['checkBoxApprove'] = 'unchecked';
    //         setFormAction('../actions/request_action.php?msg=reject');
    //     } else {
    //         checkBoxStates['checkBoxReject'] = 'unchecked';
    //     }
    //     localStorage.setItem('checkBoxStates', JSON.stringify(checkBoxStates));
    // });

    // function setFormAction(action) {
    //     const approveForm = document.getElementById('approveForm');
    //     const rejectForm = document.getElementById('rejectForm');

    //     if (action.includes('approve')) {
    //         approveForm.action = action;
    //         rejectForm.action = '../actions/request_action.php?msg=reject';
    //     } else if (action.includes('reject')) {
    //         rejectForm.action = action;
    //         approveForm.action = '../actions/request_action.php?msg=approve';
    //     }
    // }

    // // Add change event listener to approve checkbox
    // checkboxApprove.addEventListener('change', function () {
    //     if (this.checked) {
    //         document.getElementById('approveForm').submit();
    //     }
    // });

    // // Add change event listener to reject checkbox
    // checkboxReject.addEventListener('change', function () {
    //     if (this.checked) {
    //         document.getElementById('rejectForm').submit();
    //     }
    // });

    // const checkboxApprove = document.getElementById('checkBoxApprove');
    // const checkboxReject = document.getElementById('checkBoxReject');

    // if (localStorage.getItem('checkBoxStateApprove') === 'checked') {
    //     checkboxApprove.checked = true;
    // } else if (localStorage.getItem('checkBoxStateReject') === 'checked') {
    //     checkboxReject.checked = true;
    // }

    // // Add click event listener to toggle checkboxes and save states
    // checkboxApprove.addEventListener('click', function () {
    //     if (this.checked) {
    //         localStorage.setItem('checkBoxStateApprove', 'checked');
    //         checkboxReject.checked = false;
    //         localStorage.removeItem('checkBoxStateReject');
    //         setFormAction('../actions/request_action.php?msg=approve');
    //     } else {
    //         localStorage.setItem('checkBoxStateApprove', 'unchecked');
    //     }
    // });

    // checkboxReject.addEventListener('click', function () {
    //     if (this.checked) {
    //         localStorage.setItem('checkBoxStateReject', 'checked');
    //         checkboxApprove.checked = false;
    //         localStorage.removeItem('checkBoxStateApprove');
    //         setFormAction('../actions/request_action.php?msg=reject');
    //     } else {
    //         localStorage.setItem('checkBoxStateReject', 'unchecked');
    //     }
    // });

    // function setFormAction(action) {
    //     const approveForm = document.getElementById('approveForm');
    //     const rejectForm = document.getElementById('rejectForm');

    //     if (action.includes('approve')) {
    //         approveForm.action = action;
    //         rejectForm.action = '../actions/request_action.php?msg=reject';
    //     } else if (action.includes('reject')) {
    //         rejectForm.action = action;
    //         approveForm.action = '../actions/request_action.php?msg=approve';
    //     }
    // }

    // // Add change event listener to approve checkbox
    // checkboxApprove.addEventListener('change', function () {
    //     if (this.checked) {
    //         document.getElementById('approveForm').submit();
    //     }
    // });

    // // Add change event listener to reject checkbox
    // checkboxReject.addEventListener('change', function () {
    //     if (this.checked) {
    //         document.getElementById('rejectForm').submit();
    //     }
    // });

    var homeButton = document.querySelector(".container-three button[name=homeButton]");
    var manageButton = document.querySelector(".container-three button[name=manageButton]");
    var choreButton = document.querySelector(".container-three button[name=choreButton]");
    var requestPageButton = document.querySelector(".container-three button[name=requestPageButton]");
    var settingsButton = document.querySelector(".container-four button[name=settingsButton]");
    var requestButton = document.querySelector(".assignchore-container button[name=requestButton]");

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
        settingsButton.style.boxShadow = '1px 1px rgb(65, 65, 65)';

        requestPageButton.style.transform = 'translateY(0px)';
        requestPageButton.style.backgroundColor = '#6f006d';
        requestPageButton.style.boxShadow = '1px 1px rgb(65, 65, 65)';

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

    requestPageButton.addEventListener('mouseover', function () {
        submitHover(this);
    });

    requestPageButton.addEventListener('mouseout', function () {
        resetStyles();
    });

    requestPageButton.addEventListener('mousedown', function () {
        applyAddPressedEffect(this);
    });

    requestPageButton.addEventListener('mouseup', function () {
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

function closePopup() {
    window.location.href = "../requests/close_request.php";
}

// function openPopup() {
//     document.getElementById('overlay').style.display = 'block';
//     document.getElementById('popup').style.display = 'block';
// }