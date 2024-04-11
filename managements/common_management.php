<?php
// include "../functions/manage_project_func.php";
?>
<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,
            initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin_management.css">
    <title>Manage Project</title>
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
                        <h3>MANAGE PROJECTS</h3>
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
                <h3>PROJECT LIST</h3>
            </div>
            <div class="table-container">
                <table class="styled-table">
                    <thead>
                        <tr>
                            <th>PROJECT NAME</th>
                            <th>WORKFLOW</th>
                        </tr>
                    </thead>
                    <tbody id="createdChoresTable">
                        <?php
                        // displayDepartmentManagementDetails();
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="../javascript/common_dashboard.js" defer></script>
</body>
</html> -->


<?php
include "../functions/manage_project_func.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,
            initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin_management.css">
    <title>Manage Project</title>
</head>

<body>
    <?php
    // displayCommonManagementDetails();
    ?>
    <div class="concept-container">
        <div class="container-two">
            <div class="title-container">
                <h3>PLUMBING PROJECT</h3>
            </div>
            <a href="../dashboards/plumbing_dashboard.php">
                <div class="container-three">
                    <button name="homeButton">
                        <h3>DASHBOARD</h3>
                    </button>
                </div>
            </a>
            <a href="../managements/plumbing_management.php">
                <div class="container-three">
                    <button name="manageButton">
                        <h3>PROJECT MANAGEMENT</h3>
                    </button>
                </div>
            </a>
            <a href="../allocations/plumbing_allocation.php">
                <div class="container-three">
                    <button name="choreButton">
                        <h3>PROJECT ASSIGNMENTS</h3>
                    </button>
                </div>
            </a>
            <a href="../requests/plumbing_request.php">
                <div class="container-three">
                    <button name="requestButton">
                        <h3>REQUESTED PROJECTS</h3>
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
            <div class="topcontainer-1">
                <div class="maintitle-container">
                    <h3>PROJECTS LIST</h3>
                </div>
            </div>
            <div class="table-container">
                <table class="styled-table">
                    <thead>
                        <tr>
                            <th>PROJECT NAME</th>
                            <th>WORKFLOW</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody id="createdChoresTable">
                        <?php
                        displayCommonManagementDetails();
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="../javascript/admin_dashboard.js" defer></script>
</body>

</html>