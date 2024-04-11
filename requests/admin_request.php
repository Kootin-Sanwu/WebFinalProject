<?php
include "../functions/request_project_func.php";

if (isset($_GET['msg']) && isset($_GET['request_ID'])) {
    if ($_GET['request_ID'] && $_GET['msg'] == 'update') {
        include "../administrator/update_request.php";
    } else if ($_GET['request_ID'] && $_GET['msg'] == 'approve') {
        include "../administrator/approve_project.php";
    } else if ($_GET['request_ID'] && $_GET['msg'] == 'reject') {
        include "../administrator/reject_project.php";
    }
}

// if (isset($_GET['msg']) && $_GET['msg'] == 'approve') {
//     include "../administrator/approve_project.php";
// } else if (isset($_GET['msg']) && $_GET['msg'] == 'reject') {
//     include "../administrator/reject_project.php";
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
                <h3> CONSTRUCTION PROJECT</h3>
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
                        echo displayRequests();
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