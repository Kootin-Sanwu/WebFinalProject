<?php
// // ../actions/workflow_action.php

// include "../settings/connection.php";  // Include your database connection file

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $workflow = $_POST["workflow"];
//     $project_ID = $_POST["project_ID"];
//     $employee_ID = $_POST["employee_ID"];

//     // Update the project's workflow based on the received workflow value
//     if ($workflow == 'In Progress') {
//         $updateSql = "UPDATE projects SET workflow = 'In Progress' WHERE project_ID = {$project_ID}";
//     } elseif ($workflow == 'Complete') {
//         $updateSql = "UPDATE projects SET workflow = 'Complete' WHERE project_ID = {$project_ID}";
//     } else {
//         echo "Failed to get the workflow";
//         exit;  // Exit the script if workflow is not recognized
//     }

//     // Execute the update query
//     if ($conn->query($updateSql) === TRUE) {
//         header ("Location: ../requests/update_workflow_redirect.php?msg=update&employee_ID={$employee_ID}");
//         // echo "Workflow updated successfully.";
//     } else {
//         echo "Error updating workflow: " . $conn->error;
//     }

//     // Close the database connection
//     $conn->close();

//     // Continue with your code...
// }

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include "../settings/connection.php";  // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $workflow = $_POST["workflow"];
    $project_ID = $_POST["project_ID"];
    $employee_ID = $_POST["employee_ID"];

    // Update the project's workflow based on the received workflow value
    if ($workflow == 'In Progress') {
        $updateSql = "UPDATE projects SET workflow = 'In Progress' WHERE project_ID = {$project_ID}";
    } elseif ($workflow == 'Complete') {
        $updateSql = "UPDATE projects SET workflow = 'Complete' WHERE project_ID = {$project_ID}";
    } else {
        echo "Failed to get the workflow";
        exit;  // Exit the script if workflow is not recognized
    }

    // Execute the update query
    if ($conn->query($updateSql) === TRUE) {
        
        // Update the $_SESSION['inProgressCount'] and $_SESSION['completeCount'] based on the database
        $inProgressSql = "SELECT COUNT(*) as count FROM projects WHERE workflow = 'In Progress'";
        $completeSql = "SELECT COUNT(*) as count FROM projects WHERE workflow = 'Complete'";
        
        $resultInProgress = $conn->query($inProgressSql);
        $resultComplete = $conn->query($completeSql);
        
        if ($resultInProgress->num_rows > 0) {
            $row = $resultInProgress->fetch_assoc();
            $_SESSION['inProgressCount'] = $row['count'];
        }
        
        if ($resultComplete->num_rows > 0) {
            $row = $resultComplete->fetch_assoc();
            $_SESSION['completeCount'] = $row['count'];
        }

        header ("Location: ../requests/update_workflow_redirect.php?msg=update&employee_ID={$employee_ID}");
        // echo "Workflow updated successfully.";
    } else {
        echo "Error updating workflow: " . $conn->error;
    }

    // Close the database connection
    $conn->close();

    // Continue with your code...
}

?>

