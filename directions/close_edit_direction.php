<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_GET['msg']) && $_GET['msg'] == 'cannot_edit') {
    $department_ID = $_GET['department_ID'];

    switch ($department_ID) {
        case 8:
            header("Location: ../requests/welding_request.php?msg=cannot_edit&department_ID={$department_ID}");
            exit();
        case 7:
            header("Location: ../requests/surveying_request.php?msg=cannot_edit&department_ID={$department_ID}");
            exit();
        case 6:
            header("Location: ../requests/roofing_request.php?msg=cannot_edit&department_ID={$department_ID}");
            exit();
        case 5:
            header("Location: ../requests/carpentry_request.php?msg=cannot_edit&department_ID={$department_ID}");
            exit();
        case 4:
            header("Location: ../requests/concretery_request.php?msg=cannot_edit&department_ID={$department_ID}");
            exit();
        case 3:
            header("Location: ../requests/electrical_request.php?msg=cannot_edit&department_ID={$department_ID}");
            exit();
        case 2:
            header("Location: ../requests/plumbing_request.php?msg=cannot_edit&department_ID={$department_ID}");
            exit();
        case 1:
            header("Location: ../managements/admin_management.php?msg=cannot_edit&department_ID={$department_ID}");
            exit();
        default:
            header("Location: ../logins/login_view.php?msg=Not Logged In");
            exit();
    }
} else if (isset($_GET['msg']) && $_GET['msg'] == 'close'){
    $department_ID = $_GET['department_ID'];

    switch ($department_ID) {
        case 8:
            header("Location: ../requests/welding_request.php");
            exit();
        case 7:
            header("Location: ../requests/surveying_request.php");
            exit();
        case 6:
            header("Location: ../requests/roofing_request.php");
            exit();
        case 5:
            header("Location: ../requests/carpentry_request.php");
            exit();
        case 4:
            header("Location: ../requests/concretery_request.php");
            exit();
        case 3:
            header("Location: ../requests/electrical_request.php");
            exit();
        case 2:
            header("Location: ../requests/plumbing_request.php");
            exit();
        case 1:
            header("Location: ../managements/admin_management.php");
            exit();
        default:
            header("Location: ../logins/login_view.php?msg=Not Logged In");
            exit();
    }
}