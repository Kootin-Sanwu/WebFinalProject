<?php

function displayEmployeeRequests()
{
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    include "../settings/connection.php";

    // Get the current user's ID
    $employee_ID = $_SESSION['user_ID'];

    $sql = "SELECT * FROM project_requests WHERE employee_ID = ?";
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
        $request_ID = $request['request_ID'];
        $projectName = $request['project_name'];
        $beginDate = $request['begin_date'];
        $endDate = $request['end_date'];
        $status = $request['request_status'];

        echo '<tr>';
        echo "<td>{$projectName}</td>";
        echo "<td>{$beginDate}</td>";
        echo "<td>{$endDate}</td>";
        echo "<td>{$status}</td>";

        echo "<td><form class='status-container' action='../actions/delete_request_action.php' method='post'>";
        echo "<input type='hidden' name='request_ID' value='{$request_ID}'>";
        echo "<button type='submit' value='Delete'>Delete</button>";
        echo "</form>";

        echo "<form class='status-container' action='../requests/edit_request_redirect.php?msg=edit' method='post'>";
        echo "<input type='hidden' name='employee_ID' value='{$employee_ID}'>";
        echo "<input type='hidden' name='request_ID' value='{$request_ID}'>";
        echo "<button type='submit' value='Edit'>Edit</button>";
        echo "</form></td>";

        // echo "<td><form class='status-container' action='../requests/request_redirect.php' method='post'>";
        // echo "<input type='hidden' name='request_ID' value='{$requestID}'>";
        // echo "<input type='hidden' name='employee_ID' value='{$employee_ID}'>";
        // echo "<button type='submit' value='Delete'>Delete</button>";
        // echo "</form></td>";

        echo '</tr>';
    }
}


function displayRequests()
{
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    include "../settings/connection.php";

    $sql = "SELECT * FROM project_requests WHERE request_status = 'pending'";
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
        $requestID = $request['request_ID'];
        $projectName = $request['project_name'];
        $beginDate = $request['begin_date'];
        $endDate = $request['end_date'];
        $status = $request['request_status'];

        $output .= '<tr>';
        $output .= "<td>{$projectName}</td>";
        $output .= "<td>{$beginDate}</td>";
        $output .= "<td>{$endDate}</td>";
        $output .= "<td>{$status}</td>";

        $output .= '<td>';

        $output .= "<form class='status-container' id='approveForm' action='../requests/admin_request.php?msg=approve' method='post'>";
        $output .= "<button type='submit' name='actionValue' id='checkBoxApprove' value='{$requestID}'>APPROVE</button>";
        $output .= "</form>";

        $output .= "<form class='status-container' id='rejectForm' action='../requests/admin_request.php?msg=reject' method='post'>";
        $output .= "<button type='submit' name='actionValue' id='checkBoxReject' value='{$requestID}'>REJECT</button>";
        $output .= "</form>";

        $output .= '</td>';
        $output .= '</tr>';
    }

    return $output;
}
