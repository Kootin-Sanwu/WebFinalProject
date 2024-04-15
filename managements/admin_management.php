<?php
include "../functions/manage_project_func.php";

if (isset($_GET['msg']) && $_GET['msg'] == 'delete') {
    $project_ID = $_POST['project_ID'];

    $_SESSION['project_ID'] = $project_ID;

    include '../administrator/delete_project.php';
}

if (isset($_GET['msg']) && $_GET['msg'] == 'cannot delete') {
    include '../constraints/delete_project.php';
}

// if (isset($_GET['msg']) && isset($_POST['project_ID']) && isset($_POST['employee_ID'])) {
//     $msg = $_GET['msg'];
//     $project_ID = $_POST['project_ID'];
//     $employee_ID = $_POST['employee_ID'];

//     include '../administrator/edit_project.php';
// }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,
            initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin_management.css">
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
                <div class="addchore-container">
                    <button onclick="togglePopup()" name="addButton">CREATE A PROJECT</button>
                </div>
            </div>
            <div class="addchore-popup" id="addchore-container" style="display: none;">
                <?php
                include "../administrator/create_project.php";
                ?>
            </div>
            <div class="table-container">
                <table class="styled-table">
                    <thead>
                        <tr>
                            <th>Project Name</th>
                            <th>Created By</th>
                            <th>Start Date</th>
                            <th>Due Date</th>
                            <th>Work State</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="createdChoresTable">
                        <?php
                        displayAllProjects();
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div id="overlay"></div>
    <div id="popup">
    </div>
    <script src="../javascript/primary_admin_management.js" defer></script>
</body>

</html>