<?php
include "../settings/core.php";
include "../functions/select_project_func.php";
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
    <form class="container-15" id="myModal" method="POST" action="../actions/assign_project_action.php">
        <div class="container-16">
            <div class="close-form-group">
                <button name="closeButton" id="closePopup" onclick="closePopup()">Close</button>
            </div>
            <input type="hidden" name="employee_ID" value="<?php echo $_SESSION['user_ID']; ?>">

            <div class="form-group">
                <!-- <label for="projectname">Project Name:</label>
                <input type="text" required name="projectname" id="projectName" placeholder="Project Name" required> -->
                <select name="project_ID" required>
                    <option value="" disabled selected>Project</option>
                    <?php
                    foreach ($project_results as $item_index => $item_value) {
                        echo "<option value=" . $item_value['project_ID'] . ">" . $item_value['project_name'] . "</option>";
                    }
                    ?>
                </select>

                <input type="hidden" name="departmentID" value="<?php echo $_SESSION['department_ID']; ?>">

                <select name="department_ID" required>
                    <option value="" disabled selected>Department</option>
                    <?php
                    foreach ($department_results as $item_index => $item_value) {
                        echo "<option value=" . $item_value['department_ID'] . ">" . $item_value['department_name'] . "</option>";
                    }
                    ?>
                </select>
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