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


?>
