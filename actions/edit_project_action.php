<?php

include "../settings/connection.php";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get the values from the form
    $project_name = $_POST['project_name'];
    $employee_ID = $_POST['employee_ID'];
    $close_Value = $_POST['closeButton'];
    $project_ID = $_POST['project_ID'];
    $begin_date = $_POST['begin_date'];
    $end_date = $_POST['end_date'];

    if ($close_Value == "close") {
        header("Location: ../managements/admin_management.php");
        exit();
    } else {
        $sql = "UPDATE projects SET project_name = ?, begin_date = ?, end_date = ?, status = 'APPROVED' WHERE project_ID = ?";
    
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssi", $project_name, $begin_date, $end_date, $project_ID);
    
        if ($stmt->execute()) {
            header("Location: ../managements/admin_management.php");
        } else {
            echo "Error updating record: " . $stmt->error;
        }
    
        $stmt->close();
        $conn->close();
    }
} else {
    echo "Form not submitted.";
}

?>
