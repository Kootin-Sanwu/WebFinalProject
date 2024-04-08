<?php

include "../settings/connection.php";  // Assuming this file contains your database connection code

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get the values from the form
    $employee_ID = $_POST['employee_ID'];
    $project_ID = $_POST['project_ID'];
    // $request_ID = $_POST['request_ID'];
    $project_name = $_POST['project_name'];
    $begin_date = $_POST['begin_date'];
    $end_date = $_POST['end_date'];

    // SQL query to update the project request
    $sql = "UPDATE projects SET 
            project_name = '$project_name', 
            begin_date = '$begin_date', 
            end_date = '$end_date',
            status = 'approved' 
            WHERE project_ID = $project_ID";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
        header("Location: ../managements/admin_management.php");
    } else {
        echo "Error updating record: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    echo "Form not submitted.";
}
