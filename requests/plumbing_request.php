<?php
include "../functions/request_project_func.php";
include "../settings/core.php";

if (isset($_GET['msg']) && $_GET['msg'] == 'delete') {
    $department_ID = $_POST['department_ID'];
    $employee_ID = $_POST['employee_ID'];
    $request_ID = $_POST['request_ID'];

    $_SESSION['department_ID'] = $department_ID;
    $_SESSION['employee_ID'] = $employee_ID;
    $_SESSION['request_ID'] = $request_ID;

    echo $department_ID;
    echo $employee_ID;
    echo $request_ID;

    include '../administrator/delete_request.php';
}

// if (isset($_GET['msg']) && isset($_GET['user_ID'])) {
//     $msg = $_GET['msg'];
//     $user_ID = $_GET['user_ID'];

//     if ($msg == 'cannot delete') {
//         include "../constraints/delete_request.php";
//     }
// }

// if (isset($_GET['msg']) && isset($_GET['request_ID']) && isset($_GET['department_ID'])) {
//     $msg = $_GET['msg'];
//     $request_ID = $_GET['request_ID'];
//     $department_ID = $_GET['department_ID'];

//     if ($msg == 'edit') {
//         include "../administrator/edit_request.php";
//     }
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,
            initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin_request.css">
    <title>Manage Projects</title>
</head>

<body>
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
                    <button name="requestPageButton">
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
                    <button onclick="togglePopup()" name="requestButton">REQUEST PROJECT</button>
                </div>
            </div>
            <div class="assignchore-popup" id="assignchore-container" style="display: none;">
                <?php
                include "../administrator/project_request.php";
                ?>
            </div>
            <div class="table-container">
                <table class="styled-table">
                    <thead>
                        <tr>
                            <th>Project Name</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="createdChoresTable">
                        <?php
                        displayEmployeeRequests();
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div id="overlay"></div>
    <div id="popup">
    </div>
    <script src="../javascript/admin_request.js" defer></script>
</body>

</html>