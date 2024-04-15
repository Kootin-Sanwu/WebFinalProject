<?php
include "../functions/request_project_func.php";
include "../settings/connection.php";
include "../settings/core.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET["msg"])) {
    $message = $_GET["msg"];

    $department_ID = $_POST["department_ID"];
    $project_Name = $_POST["project_name"];
    $request_ID = $_POST["request_ID"];
    $begin_Date = $_POST["begin_date"];
    $end_Date = $_POST["end_date"];
    
    $_SESSION["department_ID"] = $department_ID;
    $_SESSION["project_name"] = $project_Name;
    $_SESSION["request_ID"] = $request_ID;
    $_SESSION["begin_date"] = $begin_Date;
    $_SESSION["end_date"] = $end_Date;

    if ($message == "approve") {
        include "../administrator/approve_project.php";
    } elseif ($message == "reject") {
        include "../administrator/reject_project.php";
    } else {
        echo "Unknown message.";
    }
}
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
                        echo displayAllRequests();
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