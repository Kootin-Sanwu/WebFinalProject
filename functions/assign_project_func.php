<?php

function displayDepartmentProjectDetails()
{
    include "../settings/connection.php";

    // Start the session
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    $currentDepartmentID = $_SESSION['department_ID'];

    $sql = "SELECT projects.project_ID, projects.project_name, CONCAT(employees.first_name, ' ', employees.last_name) AS assigned_by, projects.status
            FROM projects
            JOIN employees ON projects.employee_ID = employees.employee_ID
            WHERE projects.department_ID = {$currentDepartmentID}";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {
            $projectID = $row["project_ID"];
            $projectName = $row["project_name"];
            $assignedBy = $row["assigned_by"];
            $status = $row["status"];

            echo "<tr>";
            echo "<td>{$projectName}</td>";
            echo "<td>{$assignedBy}</td>";
            echo "<td>{$projectName}</td>";
            echo "<td>{$projectName}</td>";
            echo "<td>{$status}</td>";

            // echo "<td><form class='action-container' action='../allocations/edit_project_action.php' method='post'>";
            // echo "<input type='hidden' name='project_ID' value='{$projectID}'>";
            // echo "<button type='submit' value='Edit'>Edit</button>";
            // echo "</form></td>";

            echo "</tr>";
        }
    }

    $conn->close();
}


function displayProjectDetails()
{

    include "../settings/connection.php";

    $sql = "SELECT projects.project_ID, projects.project_name, CONCAT(employees.first_name, ' ', employees.last_name) AS assigned_by, projects.status
    FROM projects
    JOIN employees ON projects.employee_ID = employees.employee_ID";

    $result = $conn->query($sql);

    // Check if any rows are returned
    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {
            $projectID = $row["project_ID"];
            $projectName = $row["project_name"];
            $assignedBy = $row["assigned_by"];
            $status = $row["status"];

            echo "<tr>";
            echo "<td>{$projectName}</td>";
            echo "<td>{$assignedBy}</td>";
            echo "<td>{$projectName}</td>";
            echo "<td>{$projectName}</td>";

            echo "<td><form class='action-container' action='../actions/delete_project_action.php' method='post'>";
            echo "<input type='hidden' name='project_ID' value='{$projectID}'>";
            echo "<button type='submit' value='Delete'>Delete</button>";
            echo "</form>";

            echo "<form class='action-container' action='../actions/edit_project_action.php' method='post'>";
            echo "<input type='hidden' name='project_ID' value='{$projectID}'>";
            echo "<button type='submit' value='Edit'>Edit</button>";
            echo "</form></td>";

            echo "</tr>";
        }
    }

    $conn->close();
}

function displayAssignmentDetails()
{
    include "../settings/connection.php";

    // SQL query to fetch assignment details
    $sql = "SELECT assignment.assignment_ID, projects.project_name, departments.department_name, CONCAT(employees.first_name, ' ', employees.last_name) AS assigned_by, assignment.begin_date, assignment.end_date
    FROM assignment
    JOIN projects ON assignment.project_ID = projects.project_ID
    JOIN departments ON assignment.department_ID = departments.department_ID
    JOIN employees ON projects.employee_ID = employees.employee_ID";

    $result = $conn->query($sql);

    // Check if any rows are returned
    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {
            $assignmentID = $row["assignment_ID"];
            $projectName = $row["project_name"];
            $assignedBy = $row["assigned_by"];
            $departmentName = $row["department_name"];
            $beginDate = $row["begin_date"];
            $endDate = $row["end_date"];

            echo "<tr>";
            echo "<td>{$projectName}</td>";
            echo "<td>{$assignedBy}</td>";
            echo "<td>{$departmentName}</td>";
            echo "<td>{$beginDate}</td>";
            echo "<td>{$endDate}</td>";

            echo "<td><form class='action-container' action='../actions/delete_assignment_action.php' method='post'>";
            echo "<input type='hidden' name='assignment_ID' value='{$assignmentID}'>";
            echo "<button type='submit' value='Delete'>Delete</button>";
            echo "</form></td>";

            echo "</tr>";
        }
    }

    $conn->close();
}

// In use
function displayDepartmentAssignmentDetails()
{
    include "../settings/connection.php";

    // Start the session
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    // Get the current department_ID from the session
    $currentDepartmentID = $_SESSION['department_ID'];

    // SQL query to fetch assignments of the current department
    $sql = "SELECT assignment.assignment_ID, projects.project_ID, projects.project_name, CONCAT(employees.first_name, ' ', employees.last_name) AS assigned_by, assignment.begin_date, assignment.end_date
            FROM assignment
            JOIN projects ON assignment.project_ID = projects.project_ID
            JOIN employees ON projects.employee_ID = employees.employee_ID
            WHERE assignment.department_ID = {$currentDepartmentID}";

    $result = $conn->query($sql);

    // Check if any rows are returned
    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {
            $assignment_ID = $row["assignment_ID"];
            $project_ID = $row["project_ID"];
            $projectName = $row["project_name"];
            $assignedBy = $row["assigned_by"];
            $beginDate = $row["begin_date"];
            $endDate = $row["end_date"];

            echo "<tr>";
            echo "<td>{$projectName}</td>";
            echo "<td>{$assignedBy}</td>";
            echo "<td>{$beginDate}</td>";
            echo "<td>{$endDate}</td>";

            // echo "<td><form class='action-container' action='../actions/edit_assignment_action.php' method='post'>";
            // echo "<input type='hidden' name='assignment_ID' value='{$assignment_ID}'>";
            // echo "<input type='hidden' name='project_ID' value='{$project_ID}'>";
            // echo "<button type='submit' value='Edit'>Edit</button>";
            // echo "</form></td>";

            echo "</tr>";
        }
    }

    $conn->close();
}


function displayRecentAssignmentDetails()
{
    include "../settings/connection.php";

    // Start the session
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    // Get the current department_ID from the session
    $currentDepartmentID = $_SESSION['department_ID'];

    // SQL query to fetch assignments of the current department
    $sql = "SELECT assignment.assignment_ID, projects.project_ID, projects.project_name, CONCAT(employees.first_name, ' ', employees.last_name) AS assigned_by, assignment.begin_date, assignment.end_date
            FROM assignment
            JOIN projects ON assignment.project_ID = projects.project_ID
            JOIN employees ON projects.employee_ID = employees.employee_ID
            WHERE assignment.department_ID = {$currentDepartmentID}";

    $result = $conn->query($sql);

    // Check if any rows are returned
    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {
            $assignment_ID = $row["assignment_ID"];
            $project_ID = $row["project_ID"];
            $projectName = $row["project_name"];
            $assignedBy = $row["assigned_by"];
            $beginDate = $row["begin_date"];
            $endDate = $row["end_date"];

            // echo "<tr>";
            // echo "<td>{$projectName}</td>";
            // echo "<td>{$assignedBy}</td>";
            // echo "<td>{$beginDate}</td>";
            // echo "<td>{$endDate}</td>";


            // echo '<div class="assigned-container">';
            // echo "<h3>$projectName</h3>";
            // echo '<button name="generalChoreButton">PROJECTS ASSIGNED</button>';
            // echo '<button name="generalChoreButton">PROJECTS COMPLETED</button>';
            // echo '<button name="generalChoreButton">PROJECTS DETAILS</button>';
            // echo '</div>';

            echo '<div class="assigned-container">';
            echo "<h3>Assignment: {$projectName}</h3>";
            echo "<p>Assigned By: {$assigned}</p>";
            echo "<p>Start Due:  {$beginDate}</p>";
            echo '<a href="../admin/allocation.php"><button name="generalAssignmentButton">VIEW DETAILS</button></a>';
            echo '</div>';

            // echo "<td><form class='action-container' action='../actions/edit_assignment_action.php' method='post'>";
            // echo "<input type='hidden' name='assignment_ID' value='{$assignment_ID}'>";
            // echo "<input type='hidden' name='project_ID' value='{$project_ID}'>";
            // echo "<button type='submit' value='Edit'>Edit</button>";
            // echo "</form></td>";

            echo "</tr>";
        }
    }

    $conn->close();
}
