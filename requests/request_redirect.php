<?php
// Check if the request_ID and employee_ID are set
if(isset($_POST['request_ID']) && isset($_POST['employee_ID'])) {
    $requestID = $_POST['request_ID'];
    $employeeID = $_POST['employee_ID'];

    // Set session variable
    $_SESSION['request_ID'] = $requestID;

    // Redirect based on the employeeID value
    if($employeeID == 2) {  // replace 'some_value' with the actual value you want to check
        header("Location: ../requests/plumbing_request.php?request_ID={$requestID}");
    } elseif($employeeID == 'another_value') {  // replace 'another_value' with the actual value you want to check
        header("Location: page_for_employeeID_value2.php?request_ID={$requestID}");
    } else {
        // Default redirection
        header("Location: default_page.php?request_ID={$requestID}");
    }
} else {
    echo "Error: Request ID or Employee ID not specified.";
}

// ../requests/request_redirect.php

// if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET["msg"])) {
//     $message = $_GET["msg"];
//     $request_ID = $_POST["request_ID"];
//     $employee_ID = $_POST["employee_ID"];

//     switch ($employee_ID) {
//         case 2:
//             header("Location: ../requests/plumbing_request.php?msg={$message}&request_ID={$request_ID}");
//             break;
//         case 3:
//             header("Location: ../requests/electrical_request.php?msg={$message}&request_ID={$request_ID}");
//             break;
//         case 4:
//             header("Location: ../requests/.php?msg={$message}&request_ID={$request_ID}");
//             break;
//         case 5:
//             header("Location: ../requests/.php?msg={$message}&request_ID={$request_ID}");
//             break;
//         case 6:
//             header("Location: ../requests/.php?msg={$message}&request_ID={$request_ID}");
//             break;
//         case 7:
//             header("Location: ../requests/.php?msg={$message}&request_ID={$request_ID}");
//             break;
//         case 8:
//             header("Location: ../requests/.php?msg={$message}&request_ID={$request_ID}");
//             break;
//         default:
//             header("Location: admin_request.php");
//             break;
//     }
// } else {
//     header("Location: admin_request.php");
// }
?>
