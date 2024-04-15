<?php
include "../settings/connection.php";

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $department_ID = $_POST["department_ID"];
    $employee_ID = $_POST["employee_ID"];
    $close_Value = $_POST["closeButton"];
    $project_ID = $_POST["project_ID"];

    if (!empty($project_ID) && !empty($department_ID)) {

        // Check if project_ID already exists in assignment table
        $checkSql = "SELECT * FROM assignments WHERE project_ID = {$project_ID}";
        $checkResult = $conn->query($checkSql);

        if ($close_Value == "close") {
            header("Location: ../allocations/admin_allocation.php");
            exit();
        }
        else if ($checkResult->num_rows > 0) {
            header("Location: ../allocations/admin_allocation.php?msg=assigned");
            exit; // Stop executing the rest of the code
        }

        // Fetch begin_date and end_date of the project
        $fetchSql = "SELECT begin_date, end_date FROM projects WHERE project_ID = {$project_ID}";
        $result = $conn->query($fetchSql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $begin_date = $row['begin_date'];
            $end_date = $row['end_date'];

            $sqlProjects = "UPDATE projects SET department_ID = $department_ID, workflow = 'Assigned' WHERE project_ID = '$project_ID'";

            // Insert into assignment table
            $sqlAssignment = "INSERT INTO assignments (project_ID, department_ID, begin_date, end_date) 
                              VALUES ($project_ID, $department_ID, '{$begin_date}', '{$end_date}')";

            // Execute the queries
            if ($conn->query($sqlProjects) === TRUE && $conn->query($sqlAssignment) === TRUE) {
                header("Location: ../allocations/admin_allocation.php");
            } else {
                echo "Error: " . $sqlProjects . "<br>" . $conn->error;
            }
        } else {
            echo "Project not found.";
        }
    } else {
        echo "Project ID and department ID cannot be empty.";
    }

    $conn->close();
} else {
    echo "Form not submitted.";
}

