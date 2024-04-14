<?php

function displayEmployeeRequests()
{
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    include "../settings/connection.php";
    
    $sql = "SELECT r.request_ID, r.project_name, r.begin_date, r.end_date, r.request_status, e.department_ID 
            FROM requests r
            JOIN employees e ON r.employee_ID = e.employee_ID
            WHERE e.employee_ID = ?";
            
    $employee_ID = $_SESSION['employee_ID'];
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $employee_ID);
    $stmt->execute();
    $result = $stmt->get_result();
            
    $requests = [];
    while ($row = $result->fetch_assoc()) {
        $requests[] = $row;
    }

    $stmt->close();
    $conn->close();

    foreach ($requests as $request) {
        $department_ID = $request['department_ID'];
        $projectName = $request['project_name'];
        $request_ID = $request['request_ID'];
        $status = $request['request_status'];
        $beginDate = $request['begin_date'];
        $endDate = $request['end_date'];

        echo '<tr>';
        echo "<td>{$projectName}</td>";
        echo "<td>{$beginDate}</td>";
        echo "<td>{$endDate}</td>";
        echo "<td>{$status}</td>";
        
        echo "<td><form class='status-container' action='../directions/open_delete_direction.php' method='POST'>";
        echo "<input type='hidden' name='department_ID' value='{$department_ID}'>";
        echo "<input type='hidden' name='request_ID' value='{$request_ID}'>";
        echo "<button type='submit' name='deleteButton' value='Delete'>DELETE</button>";
        echo "</form>";

        echo "<form class='status-container' action='../directions/open_edit_direction.php' method='POST'>";
        echo "<input type='hidden' name='department_ID' value='{$department_ID}'>";
        echo "<input type='hidden' name='request_ID' value='{$request_ID}'>";
        echo "<button type='submit' name='editButton' value='Edit'>EDIT</button>";
        echo "</form></td>";

        echo '</tr>';
    }
}



function displayAllRequests()
{
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    include "../settings/connection.php";

    $sql = "SELECT r.*, e.department_ID 
            FROM requests r
            JOIN employees e ON r.employee_ID = e.employee_ID
            WHERE r.request_status = 'PENDING'";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();

    $requests = [];
    while ($row = $result->fetch_assoc()) {
        $requests[] = $row;
    }

    $stmt->close();
    $conn->close();

    $output = "";

    foreach ($requests as $request) {
        $request_ID = $request['request_ID'];
        $project_Name = $request['project_name'];
        $begin_Date = $request['begin_date'];
        $end_Date = $request['end_date'];
        $request_Status = $request['request_status'];
        $department_ID = $request['department_ID'];

        $output .= '<tr>';
        $output .= "<td>{$project_Name}</td>";
        $output .= "<td>{$begin_Date}</td>";
        $output .= "<td>{$end_Date}</td>";
        $output .= "<td>{$request_Status}</td>";

        $output .= '<td>';

        $output .= "<form class='status-container' action='../requests/admin_request.php?msg=approve' method='POST'>";
        $output .= "<input type='hidden' name='department_ID' value='{$department_ID}'>";
        $output .= "<input type='hidden' name='project_name' value='{$project_Name}'>";
        $output .= "<input type='hidden' name='request_ID' value='{$request_ID}'>";
        $output .= "<input type='hidden' name='begin_date' value='{$begin_Date}'>";
        $output .= "<input type='hidden' name='end_date' value='{$end_Date}'>";
        $output .= "<button type='submit' name='approveButton' value='Approve'>APPROVE</button>";
        $output .= "</form>";

        $output .= "<form class='status-container' action='../requests/admin_request.php?msg=reject' method='POST'>";
        $output .= "<input type='hidden' name='department_ID' value='{$department_ID}'>";
        $output .= "<input type='hidden' name='project_name' value='{$project_Name}'>";
        $output .= "<input type='hidden' name='request_ID' value='{$request_ID}'>";
        $output .= "<input type='hidden' name='begin_date' value='{$begin_Date}'>";
        $output .= "<input type='hidden' name='end_date' value='{$end_Date}'>";
        $output .= "<button type='submit' name='rejectButton' value='Reject'>REJECT</button>";
        $output .= "</form>";

        $output .= '</td>';
        $output .= '</tr>';
    }

    return $output;
}


