<?php

if (isset($_GET['user_ID'])) {
    $user_ID = $_GET['user_ID'];

    switch ($user_ID) {
        case 2:
            header("Location: ../requests/plumbing_request.php?msg=cannot delete&user_ID={$user_ID}");
            exit();
        case 3:
            header("Location: ../requests/electrical_request.php?msg=cannot delete&user_ID={$user_ID}");
            exit();
        case 4:
            header("Location: ../requests/concretery_request.php?msg=cannot delete&user_ID={$user_ID}");
            exit();
        case 5:
            header("Location: ../requests/carpentry_request.php?msg=cannot delete&user_ID={$user_ID}");
            exit();
        case 6:
            header("Location: ../requests/roofing_request.php?msg=cannot delete&user_ID={$user_ID}");
            exit();
        case 7:
            header("Location: ../requests/surveying_request.php?msg=cannot delete&user_ID={$user_ID}");
            exit();
        case 8:
            header("Location: ../requests/welding_request.php?msg=cannot delete&user_ID={$user_ID}");
            exit();
        default:
            echo "Current User ID is not set correctly.";
            exit();
    }
} elseif (isset($_GET['msg']) && isset($_GET['employee_ID']) && isset($_GET['request_ID'])) {
    $message = $_GET["msg"];
    $request_ID = $_POST["request_ID"];
    $employee_ID = $_POST["employee_ID"];

    switch ($employee_ID) {
        case 2:
            header("Location: ../requests/plumbing_request.php?msg={$message}&request_ID={$request_ID}");
            break;
        case 3:
            header("Location: ../requests/electrical_request.php?msg={$message}&request_ID={$request_ID}");
            break;
        case 4:
            header("Location: ../requests/.php?msg={$message}&request_ID={$request_ID}");
            break;
        case 5:
            header("Location: ../requests/.php?msg={$message}&request_ID={$request_ID}");
            break;
        case 6:
            header("Location: ../requests/.php?msg={$message}&request_ID={$request_ID}");
            break;
        case 7:
            header("Location: ../requests/.php?msg={$message}&request_ID={$request_ID}");
            break;
        case 8:
            header("Location: ../requests/.php?msg={$message}&request_ID={$request_ID}");
            break;
        default:
            header("Location: admin_request.php");
            break;
    }
} else {
    switch ($employee_ID) {
        case 2:
            header("Location: ../requests/plumbing_request.php");
            break;
        case 3:
            header("Location: ../requests/electrical_request.php");
            break;
        case 4:
            header("Location: ../requests/.php");
            break;
        case 5:
            header("Location: ../requests/.php");
            break;
        case 6:
            header("Location: ../requests/.php");
            break;
        case 7:
            header("Location: ../requests/.php");
            break;
        case 8:
            header("Location: ../requests/.php");
            break;
        default:
            header("Location: admin_request.php");
            break;
    }
}
