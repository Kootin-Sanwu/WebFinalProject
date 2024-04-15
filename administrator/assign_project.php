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
                <button name="closeButton" value="close">Close</button>
            </div>

            <input type="hidden" name="employee_ID" value="<?php 
                                                            echo $_SESSION['employee_ID']; 
                                                            ?>">

            <div class="form-group">
                <select name="project_ID" id="assign_project_name" required>
                    <option value="" disabled selected>Project</option>
                    <?php
                    foreach ($project_results as $item_index => $item_value) {
                        echo "<option value=" . $item_value['project_ID'] . ">" . $item_value['project_name'] . "</option>";
                    }
                    ?>
                </select>

                <input type="hidden" name="department_ID" value="<?php echo $_SESSION['department_ID']; ?>">

                <select name="department_ID" id="assign_department_name" required>
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
                <button name="submitButton">Assign</button>
            </div>
        </div>
    </form>
    <script src="../javascript/assign_project.js" defer></script>
</body>

</html>