<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['user_ID'])) {
    $userId = $_SESSION['user_ID'];

    switch ($userId) {
        case 8:
            header("Location: welding_request.php");
            exit();
        case 7:
            header("Location: surveying_request.php");
            exit();
        case 6:
            header("Location: roofing_request.php");
            exit();
        case 5:
            header("Location: carpentry_request.php");
            exit();
        case 4:
            header("Location: concretery_request.php");
            exit();
        case 3:
            header("Location: electrical_request.php");
            exit();
        case 2:
            header("Location: plumbing_request.php");
            exit();
        case 1:
            header("Location: ../managements/admin_management.php");
            exit();
        default:
            header("Location: default_page.php");
            exit();
    }
} else {
    header("Location: ../logins/login_view.php?msg=Not Logged In");
    exit();
}
