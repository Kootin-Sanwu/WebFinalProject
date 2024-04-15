<?php
include "../functions/assign_project_func.php";

if (isset($_GET['msg']) && $_GET['msg'] == 'edit') {
    include '../administrator/edit_request.php';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,
            initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin_allocation.css">
    <title>Manage Projects</title>
</head>

<body>
    <div class="concept-container">
        <div class="container-two">
            <div class="title-container">
                <h3>SURVEYING PROJECT</h3>
            </div>
            <a href="../dashboards/surveying_dashboard.php">
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
                <div class="assignchore-container">
                    <button onclick="openPopup()" name="assignButton">ASSIGN A PROJECT</button>
                </div>
            </div>
            <div class="table-container">
                <table class="styled-table">
                    <thead>
                        <tr>
                            <th>Project Name</th>
                            <th>Assigned By</th>
                            <th>Start Date</th>
                            <th>Due Date</th>
                        </tr>
                    </thead>
                    <tbody id="createdChoresTable">
                        <?php
                        displayDepartmentAssignments();
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div id="overlay"></div>
    <div id="popup">
        <?php
        include "../admin/assignproject.php";
        ?>
    </div>
    <script src="../javascript/admin_allocation.js" defer></script>
</body>

</html>