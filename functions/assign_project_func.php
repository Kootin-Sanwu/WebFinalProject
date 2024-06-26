<?php
function displayDepartmentAssignments()
{
    include "../settings/connection.php";

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    $currentDepartmentID = $_SESSION['department_ID'];

    $sql = "SELECT a.project_ID, p.project_name, CONCAT(e.first_name, ' ', e.last_name) AS assigned_by, p.workflow, p.status, a.begin_date, a.end_date
            FROM assignments a
            JOIN projects p ON a.project_ID = p.project_ID
            JOIN employees e ON p.employee_ID = e.employee_ID
            WHERE a.department_ID = {$currentDepartmentID}";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {
            $projectName = $row["project_name"];
            $assignedBy = $row["assigned_by"];
            $projectID = $row["project_ID"];
            $beginDate = $row["begin_date"];
            $workflow = $row["workflow"];
            $endDate = $row["end_date"];
            $status = $row["status"];

            echo "<tr>";
            echo "<td>{$projectName}</td>";
            echo "<td>{$assignedBy}</td>";
            echo "<td>{$beginDate}</td>";
            echo "<td>{$endDate}</td>";

            echo "</tr>";
        }
    } else {
        echo "No Assignments";
    }

    $conn->close();
}



function displayAllAssignments()
{
    include "../settings/connection.php";
    
    $sql = "SELECT a.assignment_ID, p.project_name, d.department_name, CONCAT(e.first_name, ' ', e.last_name) AS assigned_by, a.begin_date, a.end_date
            FROM assignments a
            JOIN projects p ON a.project_ID = p.project_ID
            JOIN departments d ON a.department_ID = d.department_ID
            JOIN employees e ON p.employee_ID = e.employee_ID";

    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        
        while ($row = $result->fetch_assoc()) {
            $assignment_ID = $row["assignment_ID"];
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

            echo "<td><form class='action-container' action='../allocations/admin_allocation.php?msg=delete' method='post'>";
            echo "<input type='hidden' name='assignment_ID' value='{$assignment_ID}'>";
            echo "<button type='submit' value='Delete'>Delete</button>";
            echo "</form></td>";

            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='6'>No assignments found.</td></tr>";
    }

    $conn->close();
}



function displayDepartmentRecentAssignments()
{
    include "../settings/connection.php";

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    $currentDepartmentID = $_SESSION['department_ID'];

    $sql = "SELECT a.assignment_ID, p.project_ID, p.project_name, CONCAT(e.first_name, ' ', e.last_name) AS assigned_by, a.begin_date, a.end_date
            FROM assignments a
            JOIN projects p ON a.project_ID = p.project_ID
            JOIN employees e ON p.employee_ID = e.employee_ID
            WHERE a.department_ID = {$currentDepartmentID}
            ORDER BY a.assignment_ID DESC
            LIMIT 4";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {
            $assignment_ID = $row["assignment_ID"];
            $project_ID = $row["project_ID"];
            $projectName = $row["project_name"];
            $assignedBy = $row["assigned_by"];
            $beginDate = $row["begin_date"];
            $endDate = $row["end_date"];

            echo '<div class="assigned-container">';
            echo "<p>ASSIGNMENT: {$projectName}</p>";
            echo "<p>ASSIGNED BY: {$assignedBy}</p>";
            echo "<p>START DATE:  {$beginDate}</p>";
            echo '<a href="../requests/allocation_redirect.php?msg=allocate&department_ID=' . $currentDepartmentID . '"><button name="generalAssignmentButton">VIEW DETAILS</button></a>';
            echo '</div>';

            echo "</tr>";
        }
    } else {
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "NO RECENT ASSIGNMENTS";
    }

    $conn->close();
}



function displayAllRecentAssignments()
{
    include "../settings/connection.php";

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    
    $sql = "SELECT a.assignment_ID, p.project_ID, p.project_name, CONCAT(e.first_name, ' ', e.last_name) AS assigned_by, a.begin_date, a.end_date
            FROM assignments a
            JOIN projects p ON a.project_ID = p.project_ID
            JOIN employees e ON p.employee_ID = e.employee_ID
            ORDER BY a.assignment_ID DESC
            LIMIT 4";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {
            $assignment_ID = $row["assignment_ID"];
            $projectName = $row["project_name"];
            $assignedBy = $row["assigned_by"];
            $project_ID = $row["project_ID"];
            $beginDate = $row["begin_date"];
            $endDate = $row["end_date"];

            echo '<div class="assigned-container">';
            echo "<p>ASSIGNMENT: {$projectName}</p>";
            echo "<p>ASSIGNED BY: {$assignedBy}</p>";
            echo "<p>START DATE:  {$beginDate}</p>";
            echo '<a href="../allocations/admin_allocation.php"><button name="generalAssignmentButton">VIEW DETAILS</button></a>';
            echo '</div>';
        }
    } else {
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "NO RECENT ASSIGNMENTS";
    }

    $conn->close();
}



function displayCommonRecentAssignments()
{
    include "../settings/connection.php";

    // Start the session
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    $currentDepartmentID = $_SESSION['department_ID'];

    $sql = "SELECT a.assignment_ID, p.project_ID, p.project_name, CONCAT(e.first_name, ' ', e.last_name) AS assigned_by, a.begin_date, a.end_date
            FROM assignments a
            JOIN projects p ON a.project_ID = p.project_ID
            JOIN employees e ON p.employee_ID = e.employee_ID
            WHERE a.department_ID = {$currentDepartmentID}
            ORDER BY a.assignment_ID DESC
            LIMIT 4";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {
            $assignment_ID = $row["assignment_ID"];
            $project_ID = $row["project_ID"];
            $projectName = $row["project_name"];
            $assignedBy = $row["assigned_by"];
            $beginDate = $row["begin_date"];
            $endDate = $row["end_date"];

            echo '<div class="assigned-container">';
            echo "<p>ASSIGNMENT: {$projectName}</p>";
            echo "<p>ASSIGNED BY: {$assignedBy}</p>";
            echo "<p>START DATE:  {$beginDate}</p>";
            echo '<a href="../allocations/common_allocation.php?"><button name="generalAssignmentButton">VIEW DETAILS</button></a>';
            echo '</div>';

            echo "</tr>";
        }
    } else {
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "NO RECENT ASSIGNMENTS";
    }

    $conn->close();
}