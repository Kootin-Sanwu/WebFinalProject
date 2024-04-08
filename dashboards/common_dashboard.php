<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,
            initial-scale=1.0">
    <link rel="stylesheet" href="../css/common_dashboard.css">
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
                    <button name="homeButton" id="homeButton">
                        <h3>DASHBOARD</h3>
                    </button>
                </div>
            </a>
            <a href="../managements/common_management.php">
                <div class="container-three">
                    <button name="manageButton" id="manageButton">
                        <h3>PROJECT MANAGEMENT</h3>
                    </button>
                </div>
            </a>
            <a href="../logins/logout_view.php">
                <div class="container-four">
                    <button name="settingsButton" id="settingsButton">
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
            <div class="inner-container-three">
                <div class="assigned-container">
                    <h3>LAUNDRY</h3>
                    <button name="generalChoreButton">PROJECTS ASSIGNED</button>
                    <button name="generalChoreButton">PROJECTS COMPLETED</button>
                    <button name="generalChoreButton">PROJECTS DETAILS</button>
                </div>
                <div class="assigned-container">
                    <h3>MOWING</h3>
                    <button name="generalChoreButton">PROJECTS ASSIGNED</button>
                    <button name="generalChoreButton">PROJECTS COMPLETED</button>
                    <button name="generalChoreButton">PROJECTS DETAILS</button>
                </div>
                <div class="assigned-container">
                    <h3>CLEANING</h3>
                    <button name="generalChoreButton">PROJECTS ASSIGNED</button>
                    <button name="generalChoreButton">PROJECTS COMPLETED</button>
                    <button name="generalChoreButton">PROJECTS DETAILS</button>
                </div>
                <div class="assigned-container">
                    <h3>ERRANDS</h3>
                    <button name="generalChoreButton">PROJECTS ASSIGNED</button>
                    <button name="generalChoreButton">PROJECTS COMPLETED</button>
                    <button name="generalChoreButton">PROJECTS DETAILS</button>
                </div>
            </div>

            <?php
            // displayStandardRecentAssignments();
            ?>
        </div>
        <script src="../javascript/common_dashboard.js" defer></script>
</body>

</html>