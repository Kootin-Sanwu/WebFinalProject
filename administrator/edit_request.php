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
    <title>Edit Request</title>
</head>

<body>
    <form class="container-15" id="myModal" method="POST" action="../actions/edit_request_action.php">
        <div class="container-16">

            <div class="close-form-group">
                <button type="button" name="closeButton" id="closeButton" value="close">Close</button>
            </div>

            <input type="hidden" name="department_ID" value="<?php 
                                                            echo $department_ID; 
                                                            ?>">
            <input type="hidden" name="request_ID" value="<?php 
                                                            echo $request_ID; 
                                                            ?>">

            <div class="form-group">
                <label for="project_name">Project Name:</label>
                <input type="text" required name="project_name" id="project_name" placeholder="New Project Name" required>

                <label for="begin_date">New Begin date:</label>
                <input type="date" required name="begin_date" id="begin_date" placeholder="New Begin date" required>

                <label for="end_date">New End Date:</label>
                <input type="date" required name="end_date" id="end_date" placeholder="New End Date" required>
            </div>

            <input type="hidden" name="request_status" value="pending">

            <div class="submit">
                <button name="addButton">Edit</button>
            </div>
        </div>
    </form>
    <script src="../javascript/edit_request.js" defer></script>
</body>

</html>