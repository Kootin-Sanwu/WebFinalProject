<?php

// function displayDepartmentProjectDetails()
// {
//     include "../settings/connection.php";

//     // Start the session
//     if (session_status() == PHP_SESSION_NONE) {
//         session_start();
//     }

//     $currentDepartment_ID = $_SESSION['department_ID'];

//     $sql = "SELECT projects.project_ID, projects.project_name, CONCAT(employees.first_name, ' ', employees.last_name) AS assigned_by, projects.status
//             FROM projects
//             JOIN employees ON projects.employee_ID = employees.employee_ID
//             WHERE projects.department_ID = {$currentDepartment_ID}";

//     $result = $conn->query($sql);

//     if ($result->num_rows > 0) {

//         while ($row = $result->fetch_assoc()) {
//             $projectID = $row["project_ID"];
//             $project_Name = $row["project_name"];
//             $assigned_By = $row["assigned_by"];
//             $status = $row["status"];

//             echo "<tr>";
//             echo "<td>{$project_Name}</td>";
//             echo "<td>{$assigned_By}</td>";
//             echo "<td>{$project_Name}</td>";
//             echo "<td>{$project_Name}</td>";
//             echo "<td>{$status}</td>";

//             // echo "<td><form class='action-container' action='../allocations/edit_project_action.php' method='post'>";
//             // echo "<input type='hidden' name='project_ID' value='{$projectID}'>";
//             // echo "<button type='submit' value='Edit'>Edit</button>";
//             // echo "</form></td>";

//             echo "</tr>";
//         }
//     }

//     $conn->close();
// }



function displayDepartmentProjectDetails()
{
    include "../settings/connection.php";

    // Start the session
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    $currentDepartment_ID = $_SESSION['department_ID'];

    $sql = "SELECT a.project_ID, p.project_name, CONCAT(e.first_name, ' ', e.last_name) AS assigned_by, p.workflow, p.status, a.begin_date, a.end_date
            FROM assignments a
            JOIN projects p ON a.project_ID = p.project_ID
            JOIN employees e ON p.employee_ID = e.employee_ID
            WHERE a.department_ID = {$currentDepartment_ID}";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {
            $project_Name = $row["project_name"];
            $assigned_By = $row["assigned_by"];
            $begin_Date = $row["begin_date"];
            $projectID = $row["project_ID"];
            $end_Date = $row["end_date"];
            $workflow = $row["workflow"];
            $status = $row["status"];

            echo "<tr>";
            echo "<td>{$project_Name}</td>";
            echo "<td>{$assigned_By}</td>";
            echo "<td>{$begin_Date}</td>";
            echo "<td>{$end_Date}</td>";

            echo "</tr>";
        }
    } else {
        echo "No Assignments";
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
            $project_Name = $row["project_name"];
            $assigned_By = $row["assigned_by"];
            $status = $row["status"];

            echo "<tr>";
            echo "<td>{$project_Name}</td>";
            echo "<td>{$assigned_By}</td>";
            echo "<td>{$project_Name}</td>";
            echo "<td>{$project_Name}</td>";

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

function displayAllAssignments()
{
    include "../settings/connection.php";
    
    // SQL query to fetch assignment details
    $sql = "SELECT a.assignment_ID, p.project_name, d.department_name, CONCAT(e.first_name, ' ', e.last_name) AS assigned_by, a.begin_date, a.end_date
            FROM assignments a
            JOIN projects p ON a.project_ID = p.project_ID
            JOIN departments d ON a.department_ID = d.department_ID
            JOIN employees e ON p.employee_ID = e.employee_ID";

    $result = $conn->query($sql);
    
    // Check if any rows are returned
    if ($result->num_rows > 0) {
        
        while ($row = $result->fetch_assoc()) {
            $assignmentID = $row["assignment_ID"];
            $project_Name = $row["project_name"];
            $assigned_By = $row["assigned_by"];
            $departmentName = $row["department_name"];
            $begin_Date = $row["begin_date"];
            $end_Date = $row["end_date"];
            
                ini_set('display_errors', 1);
                ini_set('display_startup_errors', 1);
                error_reporting(E_ALL);

            echo "<tr>";
            echo "<td>{$project_Name}</td>";
            echo "<td>{$assigned_By}</td>";
            echo "<td>{$departmentName}</td>";
            echo "<td>{$begin_Date}</td>";
            echo "<td>{$end_Date}</td>";

            echo "<td><form class='action-container' action='../actions/delete_assignment_action.php' method='post'>";
            echo "<input type='hidden' name='assignment_ID' value='{$assignmentID}'>";
            echo "<button type='submit' value='Delete'>Delete</button>";
            echo "</form></td>";

            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='6'>No assignments found.</td></tr>";
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
    $currentDepartment_ID = $_SESSION['department_ID'];

    // SQL query to fetch assignments of the current department
    $sql = "SELECT assignment.assignment_ID, projects.project_ID, projects.project_name, CONCAT(employees.first_name, ' ', employees.last_name) AS assigned_by, assignment.begin_date, assignment.end_date
            FROM assignment
            JOIN projects ON assignment.project_ID = projects.project_ID
            JOIN employees ON projects.employee_ID = employees.employee_ID
            WHERE assignment.department_ID = {$currentDepartment_ID}";

    $result = $conn->query($sql);

    // Check if any rows are returned
    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {
            $assignment_ID = $row["assignment_ID"];
            $project_ID = $row["project_ID"];
            $project_Name = $row["project_name"];
            $assigned_By = $row["assigned_by"];
            $begin_Date = $row["begin_date"];
            $end_Date = $row["end_date"];

            echo "<tr>";
            echo "<td>{$project_Name}</td>";
            echo "<td>{$assigned_By}</td>";
            echo "<td>{$begin_Date}</td>";
            echo "<td>{$end_Date}</td>";

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
    $currentDepartment_ID = $_SESSION['department_ID'];

    // SQL query to fetch assignments of the current department
    $sql = "SELECT assignment.assignment_ID, projects.project_ID, projects.project_name, CONCAT(employees.first_name, ' ', employees.last_name) AS assigned_by, assignment.begin_date, assignment.end_date
            FROM assignment
            JOIN projects ON assignment.project_ID = projects.project_ID
            JOIN employees ON projects.employee_ID = employees.employee_ID
            WHERE assignment.department_ID = {$currentDepartment_ID}";

    $result = $conn->query($sql);

    // Check if any rows are returned
    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {
            $assignment_ID = $row["assignment_ID"];
            $project_ID = $row["project_ID"];
            $project_Name = $row["project_name"];
            $assigned_By = $row["assigned_by"];
            $begin_Date = $row["begin_date"];
            $end_Date = $row["end_date"];

            echo '<div class="assigned-container">';
            echo "<p>ASSIGNMENT: {$project_Name}</p>";
            echo "<p>ASSIGNED BY: {$assigned_By}</p>";
            echo "<p>START DATE:  {$begin_Date}</p>";
            echo '<a href="../requests/allocation_redirect.php?msg=allocate&department_ID=' . $currentDepartment_ID . '"><button name="generalAssignmentButton">VIEW DETAILS</button></a>';
            echo '</div>';

            echo "</tr>";
        }
    }

    $conn->close();
}

function displayAdminRecentAssignmentDetails()
{
    include "../settings/connection.php";

    // Start the session
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    // Get the current department_ID from the session
    $currentDepartment_ID = $_SESSION['department_ID'];

    // SQL query to fetch assignments of the current department
    // $sql = "SELECT * FROM assignment ORDER BY assignment_ID DESC LIMIT 4";
    
    $sql = "SELECT assignment.assignment_ID, projects.project_ID, projects.project_name, CONCAT(employees.first_name, ' ', employees.last_name) AS assigned_by, assignment.begin_date, assignment.end_date
    FROM assignment
    JOIN projects ON assignment.project_ID = projects.project_ID
    JOIN employees ON projects.employee_ID = employees.employee_ID
    ORDER BY assignment.assignment_ID DESC
    LIMIT 4";

    // Execute the query

    $result = $conn->query($sql);

    // Check if any rows are returned
    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {
            $assignment_ID = $row["assignment_ID"];
            $project_ID = $row["project_ID"];
            $project_Name = $row["project_name"];
            $assigned_By = $row["assigned_by"];
            $begin_Date = $row["begin_date"];
            $end_Date = $row["end_date"];

            echo '<div class="assigned-container">';
            echo "<p>ASSIGNMENT: {$project_Name}</p>";
            echo "<p>ASSIGNED BY: {$assigned_By}</p>";
            echo "<p>START DATE:  {$begin_Date}</p>";
            echo '<a href="../allocations/admin_allocation.php"><button name="generalAssignmentButton">VIEW DETAILS</button></a>';
            echo '</div>';

            echo "</tr>";
        }
    }

    $conn->close();
}
