<?php
function displayDepartmentProjects()
{
    include "../settings/connection.php";

    // Start the session
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    // Get the current department_ID from the session
    $currentDepartmentID = $_SESSION['department_ID'];

    // SQL query to fetch projects of the current department with join
    $sql = "SELECT a.project_ID, p.project_name, p.employee_ID, a.status, a.workflow, a.begin_date, a.end_date
            FROM assignments a
            INNER JOIN projects p ON a.project_ID = p.project_ID
            WHERE a.department_ID = {$currentDepartmentID}";

    $result = $conn->query($sql);

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    // Check if any rows are returned
    if ($result->num_rows > 0) {

        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

        while ($row = $result->fetch_assoc()) {
            $project_ID = $row["project_ID"];
            $projectName = $row["project_name"];
            $employee_ID = $row["employee_ID"];
            $status = $row["status"];
            $workflow = $row["workflow"];
            $beginDate = $row["begin_date"];
            $endDate = $row["end_date"];

            echo "<tr>";
            echo "<td>{$projectName}</td>";
            echo "<td>{$workflow}</td>";

            echo "<td><form class='action-container' action='../actions/workflow_action.php' method='post'>";
            echo "<input type='hidden' name='employee_ID' value='{$employee_ID}'>";
            echo "<input type='hidden' name='project_ID' value='{$project_ID}'>";
            echo "<input type='hidden' name='workflow' value='In Progress'>";
            echo "<button type='submit' value='Edit'>In Progress</button>";
            echo "</form>";

            echo "<form class='action-container' action='../actions/workflow_action.php' method='post'>";
            echo "<input type='hidden' name='employee_ID' value='{$employee_ID}'>";
            echo "<input type='hidden' name='project_ID' value='{$project_ID}'>";
            echo "<input type='hidden' name='workflow' value='Complete'>";
            echo "<button type='submit' value='Edit'>Complete</button>";
            echo "</form></td>";

            echo "</tr>";
        }
    } else {
        echo "0 results";
    }

    // Close connection
    $conn->close();
}





// function displayDepartmentProjects()
// {
//     include "../settings/connection.php";

//     // Start the session
//     if (session_status() == PHP_SESSION_NONE) {
//         session_start();
//     }

//     // Get the current department_ID from the session
//     $currentDepartmentID = $_SESSION['department_ID'];

//     ini_set('display_errors', 1);
//     ini_set('display_startup_errors', 1);
//     error_reporting(E_ALL);

//     // SQL query to fetch projects of the current department with join
//     $sql = "SELECT a.project_ID, p.project_name, a.employee_ID, a.status, a.workflow, a.begin_date, a.end_date
//             FROM assignments a
//             INNER JOIN projects p ON a.project_ID = p.project_ID
//             WHERE a.department_ID = {$currentDepartmentID}";

//     $result = $conn->query($sql);

//     ini_set('display_errors', 1);
//     ini_set('display_startup_errors', 1);
//     error_reporting(E_ALL);

//     // Check if any rows are returned
//     if ($result->num_rows > 0) {

//         ini_set('display_errors', 1);
//         ini_set('display_startup_errors', 1);
//         error_reporting(E_ALL);
            
//         while ($row = $result->fetch_assoc()) {
//             $project_ID = $row["project_ID"];
//             $projectName = $row["project_name"];
//             $employee_ID = $row["employee_ID"];
//             $status = $row["status"];
//             $workflow = $row["workflow"];
//             $beginDate = $row["begin_date"];
//             $endDate = $row["end_date"];

//             echo "<tr>";
//             echo "<td>{$projectName}</td>";
//             echo "<td>{$workflow}</td>";

//             echo "<td><form class='action-container' action='../actions/workflow_action.php' method='post'>";
//             echo "<input type='hidden' name='employee_ID' value='{$employee_ID}'>";
//             echo "<input type='hidden' name='project_ID' value='{$project_ID}'>";
//             echo "<input type='hidden' name='workflow' value='In Progress'>";
//             echo "<button type='submit' value='Edit'>In Progress</button>";
//             echo "</form>";

//             echo "<form class='action-container' action='../actions/workflow_action.php' method='post'>";
//             echo "<input type='hidden' name='employee_ID' value='{$employee_ID}'>";
//             echo "<input type='hidden' name='project_ID' value='{$project_ID}'>";
//             echo "<input type='hidden' name='workflow' value='Complete'>";
//             echo "<button type='submit' value='Edit'>Complete</button>";
//             echo "</form></td>";

//             echo "</tr>";
//         }
//     } else {
//         echo "0 results";
//     }

//     // Close connection
//     $conn->close();
// }


function displayCommonManagementDetails()
{
    include "../settings/connection.php";

    // Start the session
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    // Get the current department_ID from the session
    $currentDepartmentID = $_SESSION['department_ID'];

    // SQL query to fetch projects of the current department
    $sql = "SELECT * FROM projects WHERE department_ID = {$currentDepartmentID}";

    $result = $conn->query($sql);

    // Check if any rows are returned
    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {
            $project_ID = $row["project_ID"];
            $projectName = $row["project_name"];
            $employee_ID = $row["employee_ID"]; // Assuming you want to display the employee_ID as assigned_by
            $status = $row["status"];
            $workflow = $row["workflow"];
            $beginDate = $row["begin_date"];
            $endDate = $row["end_date"];

            echo "<tr>";
            echo "<td>{$projectName}</td>";
            echo "<td>{$workflow}</td>";

            echo "</tr>";
        }
    } else {
        echo "0 results";
    }

    // Close connection
    $conn->close();
}

function displayAllProjects()
{
    include "../settings/connection.php";

    $sql = "SELECT p.project_ID, p.project_name, CONCAT(e.first_name, ' ', e.last_name) AS employee_name, e.employee_ID, p.begin_date, p.end_date, p.workflow, p.status
            FROM projects p
            INNER JOIN employees e ON p.employee_ID = e.employee_ID";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        // Output data of each row
        while ($row = $result->fetch_assoc()) {

            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);
            
            $employee_Name = $row["employee_name"];
            $project_Name = $row["project_name"];
            $employee_ID = $row["employee_ID"];
            $project_ID = $row["project_ID"];
            $begin_Date = $row["begin_date"];
            $end_Date = $row["end_date"];
            $workflow = $row["workflow"];
            $status = $row["status"];

            echo '<tr>';
            echo "<td>{$project_Name}</td>";
            echo "<td>{$employee_Name}</td>";
            echo "<td>{$begin_Date}</td>";
            echo "<td>{$end_Date}</td>";
            echo "<td>{$workflow}</td>";

            echo "<td><form class='action-container-two' action='../managements/admin_management.php?msg=delete' method='POST'>";
            echo "<input type='hidden' name='project_ID' value='{$project_ID}'>";
            echo "<button type='submit' value='Delete'>Delete</button>";
            echo "</form>";

            echo "<form class='action-container-two' action='../managements/admin_management.php?msg=edit' method='POST'>";
            echo "<input type='hidden' name='employee_ID' value='{$employee_ID}'>";
            echo "<input type='hidden' name='project_ID' value='{$project_ID}'>";
            echo "<button type='submit' value='Edit'>Edit</button>";
            echo "</form></td>";
            echo '</tr>';
        }
    }

    // Close the database connection
    $conn->close();
}

