<?php
include "../settings/core.php";
checkLogin();
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
    <form class="container-15" id="myModal" method="POST" action="../actions/delete_assignment_action.php">
        <div class="container-16">

            <div class="close-form-group">
                <button name="closeButton" value="close">Close</button>
            </div>

            <input type="hidden" name="assignment_ID" value="<?php 
                                                            echo $assignment_ID; 
                                                            ?>">

            <div class="text">
                CONFIRM DELETION
            </div>

            <input type="hidden" name="request_status" value="pending">

            <div class="submit">
                <button name="deleteButton">Delete</button>
            </div>
        </div>
    </form>
    <script src="../javascript/delete_assignment.js" defer></script>
</body>

</html>