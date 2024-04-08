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
}
