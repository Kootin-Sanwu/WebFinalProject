<?php
include "../settings/core.php";
include "../functions/assign_project_func.php";
checkLogin();
redirectUser();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,
            initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin_dashboard.css">
    <title>Manage Chores</title>
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
                        <h3>DASHBORAD</h3>
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
            <div class="inner-container">
                <div class="maintitle-container">
                    <h3>DASHBOARD</h3>
                </div>
            </div>
            <div class="inner-container-two">
                <div class="statistic-container">
                    <button name="allChoresButton">PLUMBING PROJECTS</button>
                </div>
                <div class="statistic-container">
                    <button id="inProgressButton" name="inProgressButton">
                        IN PROGRESS <?php
                                    echo ($_SESSION['inProgressCount'] ?? 0);
                                    ?>
                    </button>
                </div>
                <div class="statistic-container">
                    <button id="completeButton" name="completeButton">
                        COMPLETED <?php
                                    echo ($_SESSION['completeCount'] ?? 0);
                                    ?>
                    </button>
                </div>
                <div class="statistic-container">
                    <button id="incompleteButton" name="incompleteButton">
                        INCOMPLETE <?php
                                    echo ($_SESSION['incompleteCount'] ?? 0);
                                    ?>
                    </button>
                </div>
            </div>
            <h4>RECENT PROJECTS</h4>
            <div class="inner-container-three">
                <?php
                displayRecentAssignmentDetails();
                ?>
            </div>
        </div>
    </div>
    <script src="../javascript/admin_dashboard.js" defer></script>
</body>

</html>