<?php
// if (session_status() == PHP_SESSION_NONE) {
//     session_start();
// }

// $department_ID = $_SESSION["department_ID"];
// $project_name = $_SESSION["project_name"];
// $request_ID = $_SESSION["request_ID"];
// $begin_date = $_SESSION["begin_date"];
// $end_date = $_SESSION["end_date"];

include "../settings/core.php";
checkLogin();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/update_status.css">
    <title>Request Project</title>
</head>

<body>
    <form class="container-15" id="myModal" method="POST" action="../actions/request_action.php?msg=reject">
        <div class="container-16">

            <div class="close-form-group">
                <button name="closeButton" value="close">Close</button>
            </div>

            <input type="" name="department_ID" value="<?php echo $department_ID; ?>">
            <input type="" name="project_name" value="<?php echo $project_name; ?>">
            <input type="" name="request_ID" value="<?php echo $request_ID; ?>">
            <input type="" name="begin_date" value="<?php echo $begin_date; ?>">
            <input type="" name="end_date" value="<?php echo $end_date; ?>">

            <div class="text">
                CONFIRM REJECTION
            </div>
            <div class="submit">
                <button name="submitButton">Confirm</button>
            </div>
        </div>
    </form>
    <script src="../javascript/update_status.js" defer></script>
</body>

</html>
