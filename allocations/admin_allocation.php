<?php
include "../functions/assign_project_func.php";

if (isset($_GET['msg']) && $_GET['msg'] == 'delete') {

    $assignment_ID = $_POST['assignment_ID'];
    
    $_SESSION['assignment_ID'] = $assignment_ID;

    include '../administrator/delete_assignment.php';
}

if (isset($_GET['msg']) && $_GET['msg'] == 'cannot delete') {

    include '../constraints/delete_assignment.php';
}

if (isset($_GET['msg']) && $_GET['msg'] == 'assigned') {

    include '../constraints/assign_project.php';
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
                <h3>CONSTRUCTION PROJECT</h3>
            </div>
            <a href="../dashboards/admin_dashboard.php">
                <div class="container-three">
                    <button name="homeButton">
                        <h3>DASHBOARD</h3>
                    </button>
                </div>
            </a>
            <a href="../managements/admin_management.php">
                <div class="container-three">
                    <button name="manageButton">
                        <h3>PROJECT MANAGEMENT</h3>
                    </button>
                </div>
            </a>
            <a href="../allocations/admin_allocation.php">
                <div class="container-three">
                    <button name="choreButton">
                        <h3>PROJECT ASSIGNMENTS</h3>
                    </button>
                </div>
            </a>
            <a href="../requests/admin_request.php">
                <div class="container-three">
                    <button name="requestButton">
                        <h3>PROJECT REQUESTS</h3>
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
                    <button onclick="togglePopup()" name="assignButton">ASSIGN A PROJECT</button>
                </div>
            </div>

            <div class="assignchore-popup" id="assignchore-container" style="display: none;">
                <?php
                include "../administrator/assign_project.php";
                ?>
            </div>

            <div class="table-container">
                <table class="styled-table">
                    <thead>
                        <tr>
                            <th>Project Name</th>
                            <th>Created By</th>
                            <th>Department</th>
                            <th>Start Date</th>
                            <th>Due Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="createdChoresTable">
                        <?php
                        
                        ini_set('display_errors', 1);
                        ini_set('display_startup_errors', 1);
                        error_reporting(E_ALL);

                        displayAllAssignments();
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div id="overlay"></div>
    <div id="popup">
    </div>
    <script src="../javascript/admin_allocation.js" defer></script>
</body>

</html>