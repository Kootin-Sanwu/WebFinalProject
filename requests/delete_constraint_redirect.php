<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['employee_ID'])) {
        $user_ID = $_POST['employee_ID'];

        // Now you have the user_ID from the form
        echo "User ID from form: " . $user_ID;

        switch ($user_ID) {
            case 2:
                header("Location: ../requests/plumbing_request.php");
                exit();
            case 3:
                header("Location: ../requests/electrical_request.php");
                exit();
            case 4:
                header("Location: ../requests/concretery_request.php");
                exit();
            case 5:
                header("Location: ../requests/carpentry_request.php");
                exit();
            case 6:
                header("Location: ../requests/roofing_request.php");
                exit();
            case 7:
                header("Location: ../requests/surveying_request.php");
                exit();
            case 8:
                header("Location: ../requests/welding_request.php");
                exit();
            default:
                echo "Current User ID is not set correctly.";
                exit();
        }
    }
}
