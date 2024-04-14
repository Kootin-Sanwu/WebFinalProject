<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_POST['department_ID']) && isset($_POST['request_ID']) && isset($_POST['employee_ID'])) {
    $department_ID = $_POST['department_ID'];
    $employee_ID = $_POST['employee_ID'];
    $request_ID = $_POST['request_ID'];

    switch ($department_ID) {
        case 8:
            header("Location: ../requests/welding_request.php?msg=delete&department={$department_ID}&employee_ID={$employee_ID}&request_ID={$request_ID}");
            exit();
        case 7:
            header("Location: ../requests/surveying_request.php?msg=delete&department={$department_ID}&employee_ID={$employee_ID}&request_ID={$request_ID}");
            exit();
        case 6:
            header("Location: ../requests/roofing_request.php?msg=delete&department={$department_ID}&employee_ID={$employee_ID}&request_ID={$request_ID}");
            exit();
        case 5:
            header("Location: ../requests/carpentry_request.php?msg=delete&department={$department_ID}&employee_ID={$employee_ID}&request_ID={$request_ID}");
            exit();
        case 4:
            header("Location: ../requests/concretery_request.php?msg=delete&department={$department_ID}&employee_ID={$employee_ID}&request_ID={$request_ID}");
            exit();
        case 3:
            header("Location: ../requests/electrical_request.php?msg=delete&department={$department_ID}&employee_ID={$employee_ID}&request_ID={$request_ID}");
            exit();
        case 2:
            header("Location: ../requests/plumbing_request.php?msg=delete&department={$department_ID}&employee_ID={$employee_ID}&request_ID={$request_ID}");
            exit();
        case 1:
            header("Location: ../managements/admin_management.php?msg=delete&department={$department_ID}&employee_ID={$employee_ID}&request_ID={$request_ID}");
            exit();
        default:
            header("Location: ../logins/login_view.php?msg=Not Logged In");
            exit();
    }
} else if (isset($_GET['msg']) && $_GET['msg'] == 'close'){
    header("Location: {$_SERVER['HTTP_REFERER']}");
    exit();
}
?>
