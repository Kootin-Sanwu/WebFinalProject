<?php
include "../settings/core.php";
include "../functions/select_department_func.php";
checkLogin();

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Check if request_ID is set in session
if(isset($_SESSION['request_ID'])) {
    $requestID = $_SESSION['request_ID'];
} else {
    echo "Error: Request ID not specified.";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/create_project.css">
    <title>Request Project</title>
</head>

<body>
    <form class="container-15" id="myModal" method="POST" action="../actions/delete_request_action.php">
        <div class="container-16">
            <div class="close-form-group">
                <button name="closeButton" id="closePopup" onclick="closePopup()">Close</button>
            </div>
            <input type="hidden" name="employee_ID" value="<?php echo $_SESSION['user_ID']; ?>">
            <input type="hidden" name="request_ID" value="<?php echo $_SESSION['request_ID']; ?>">

            <div class="form-group">
            CONFIRM DELETION
            </div>
            <input type="hidden" name="request_status" value="pending">

            <div class="submit">
                <button name="submitButton">Delete</button>
            </div>
        </div>
    </form>
    <script src="../javascript/delete_project.js" defer></script>
</body>

</html>