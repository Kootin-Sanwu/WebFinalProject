<?php
include "../settings/connection.php";

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $request_Status = $_POST["request_status"];
    $project_Name = $_POST["project_name"];
    $employee_ID = $_POST["employee_ID"];
    $close_Value = $_POST["closeButton"];
    $start_Date = $_POST["start_date"];
    $end_Date = $_POST["end_date"];

    if ($close_Value == "close") {
        header("Location: {$_SERVER['HTTP_REFERER']}");
        exit();
    } else {
        $sql = "INSERT INTO projects (project_name, employee_ID, begin_date, end_date) VALUES (?, ?, ?, ?)";
            
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("siss", $project_Name, $employee_ID, $start_Date, $end_Date);
    
        if ($stmt->execute()) {
            header("Location: ../managements/admin_management.php");
        } else {
            echo "Error: " . $stmt->error;
        }
    
        $stmt->close();
    
        $conn->close();
    }
} else {
    echo "Form not submitted.";
}
