<?php
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
    <form class="container-15" id="myModal" method="POST" action="../actions/request_action.php?msg=approve">
        <div class="container-16">

            <div class="close-form-group">
                <button name="closeButton" value="close">Close</button>
            </div>

            <input type="" name="department_ID" value="<?php echo $department_ID; ?>">
            <input type="" name="project_name" value="<?php echo $project_Name; ?>">
            <input type="" name="request_ID" value="<?php echo $request_ID; ?>">
            <input type="" name="begin_date" value="<?php echo $begin_Date; ?>">
            <input type="" name="end_date" value="<?php echo $end_Date; ?>">

            <div class="text">
                CONFIRM APPROVAL
            </div>
            <div class="submit">
                <button name="submitButton">Confirm</button>
            </div>
        </div>
    </form>
    <script src="../javascript/update_status.js" defer></script>
</body>

</html>
