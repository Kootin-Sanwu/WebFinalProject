<?php
include "../settings/connection.php";

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (
        isset($_POST['employee_ID']) && !empty($_POST['employee_ID']) &&
        isset($_POST['project_name']) && !empty($_POST['project_name']) &&
        isset($_POST['begin_date']) && !empty($_POST['begin_date']) &&
        isset($_POST['end_date']) && !empty($_POST['end_date']) &&
        isset($_POST['request_status']) && !empty($_POST['request_status'])
    ) {

        $employee_ID = $_POST['employee_ID'];
        $project_Name = $_POST['project_name'];
        $begin_Date = $_POST['begin_date'];
        $end_Date = $_POST['end_date'];
        $request_Status = $_POST['request_status'];

        $sql = "INSERT INTO project_requests (project_name, employee_ID, begin_date, end_date, request_status) 
                VALUES (?, ?, ? ,? ,?)";

        $stmt = $conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("sssss", $project_Name, $employee_ID, $begin_Date, $end_Date, $request_Status);
            if ($stmt->execute()) {
                header("Location: ../requests/close_request.php");
                exit();
            } else {
                echo "Error: " . $stmt->error;
            }
            $stmt->close();
        } else {
            echo "Error preparing statement: " . $conn->error;
        }
    } else {
        echo "All fields are required.";
    }
}

$conn->close();
