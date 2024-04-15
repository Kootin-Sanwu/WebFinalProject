<?php
function displayDepartmentProjects()
{
    include "../settings/connection.php";

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    $department_ID = $_SESSION['department_ID'];

    $sql = "SELECT a.project_ID, p.project_name, p.employee_ID, p.workflow, a.begin_date, a.end_date
            FROM assignments a
            INNER JOIN projects p ON a.project_ID = p.project_ID
            WHERE a.department_ID = {$department_ID}";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {
            $project_ID = $row["project_ID"];
            $project_Name = $row["project_name"];
            $employee_ID = $row["employee_ID"];
            $workflow = $row["workflow"];
            $beginDate = $row["begin_date"];
            $endDate = $row["end_date"];

            echo "<tr>";
            echo "<td>{$project_Name}</td>";
            echo "<td>{$workflow}</td>";

            echo "<td><form class='action-container' action='../actions/workflow_action.php' method='post'>";
            echo "<input type='hidden' name='department_ID' value='{$department_ID}'>";
            echo "<input type='hidden' name='project_ID' value='{$project_ID}'>";
            echo "<input type='hidden' name='workflow' value='IN PROGRESS'>";
            echo "<button type='submit' value='Edit'>IN PROGRESS</button>";
            echo "</form>";

            echo "<form class='action-container' action='../actions/workflow_action.php' method='post'>";
            echo "<input type='hidden' name='department_ID' value='{$department_ID}'>";
            echo "<input type='hidden' name='project_ID' value='{$project_ID}'>";
            echo "<input type='hidden' name='workflow' value='COMPLETE'>";
            echo "<button type='submit' value='Edit'>COMPLETE</button>";
            echo "</form></td>";

            echo "</tr>";
        }
    } else {
        echo "0 results";
    }

    $conn->close();
}



function displayCommonProjects()
{
    include "../settings/connection.php";

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    $department_ID = $_SESSION['department_ID'];

    $sql = "SELECT a.assignment_ID, p.project_name, a.workflow
            FROM assignments a
            JOIN projects p ON a.project_ID = p.project_ID
            WHERE a.department_ID = {$department_ID}";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {
            $project_Name = $row["project_name"];
            $workflow = $row["workflow"];

            echo "<tr>";
            echo "<td>{$project_Name}</td>";
            echo "<td>{$workflow}</td>";

            echo "</tr>";
        }
    } else {
        echo "0 results";
    }

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

    $conn->close();
}