<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if(isset($_SESSION['request_ID']) && isset($_SESSION['department_ID']) && isset($_SESSION['employee_ID'])) {
    $department_ID = $_SESSION['department_ID'];
    $employee_ID = $_SESSION['employee_ID'];
    $requestID = $_SESSION['request_ID'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/create_project.css">
    <title>Delete Project</title>
</head>

<body>
    <form class="container-15" id="myModal" method="POST" action="../actions/delete_request_action.php">
        <div class="container-16">
            <!-- <div class="close-form-group">
                <button name="closeButton" id="closePopup" onclick="closePopup()">Close</button>
            </div> -->
            <div class="close-form-group">
                <button name="closeButton" value="close">Close</button>
            </div>

            <input type="hidden" name="department_ID" value="<?php echo $department_ID; ?>">
            <input type="hidden" name="employee_ID" value="<?php echo $employee_ID; ?>">
            <input type="hidden" name="request_ID" value="<?php echo $requestID; ?>">

            <div class="text">
                CONFIRM DELETION
            </div>
            <div class="submit">
                <button name="deleteButton">Delete</button>
            </div>
        </div>
    </form>
    <script src="../javascript/delete_request.js" defer></script>
</body>

</html>
