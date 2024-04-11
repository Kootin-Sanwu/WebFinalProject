<?php
include "../functions/assign_project_func.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,
            initial-scale=1.0">
    <link rel="stylesheet" href="../css/common_management.css">
    <title>Manage Chores</title>
</head>

<body>
    <div class="concept-container">
        <div class="container-two">
            <div class="title-container">
                <h3>PROJECT</h3>
            </div>
            <a href="../dashboards/common_dashboard.php">
                <div class="container-three">
                    <button name="homeButton">
                        <h3>DASHBAORD</h3>
                    </button>
                </div>
            </a>
            <a href="../managements/common_management.php">
                <div class="container-three">
                    <button name="manageButton">
                        <h3>MANAGE CHORES</h3>
                    </button>
                </div>
            </a>
            <a href="../logins/logout_view.php">
                <div class="container-four">
                    <button name="settingsButton">
                        <h3>SETTINGS</h3>
                    </button>
                </div>
            </a>
        </div>
        <div class="container-one">
            <div class="maintitle-container">
                <h3>CHORES LIST</h3>
            </div>
            <div class="table-container">
                <table class="styled-table">
                    <thead>
                        <tr>
                            <th>CHORE NAME</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody id="createdChoresTable">
                        <?php
                        displayDepartmentManagementDetails();
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="../javascript/common_dashboard.js" defer></script>
</body>
</html>