<?php
include "../settings/core.php";
include "../functions/select_department_func.php";
checkLogin();
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
    <form class="container-15" id="myModal" method="POST" action="../actions/create_project_action.php">
        <div class="container-16">

            <div class="close-form-group">
                <button name="closeButton" value="close">Close</button>
            </div>

            <input type="hidden" name="employee_ID" value="<?php echo $_SESSION['employee_ID']; ?>">

            <div class="form-group">
                <label for="projectname">Project Name:</label>
                <input type="text" required name="project_name" id="project_name" placeholder="Project Name" required>
                
                <label for="start_date">Project Name:</label>
                <input type="date" required name="start_date" id="start_date" placeholder="Start date" required>
                
                <label for="end_date">Project Name:</label>
                <input type="date" required name="end_date" id="end_date" placeholder="End Date" required>
            </div>
            <input type="hidden" name="request_status" value="pending">

            <div class="submit">
                <button name="submitButton">Create</button>
            </div>
        </div>
    </form>
    <script src="../javascript/create_project.js" defer></script>
</body>

</html>