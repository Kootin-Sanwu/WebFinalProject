<?php
function displayDepartmentManagementDetails()
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
