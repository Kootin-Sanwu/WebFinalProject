<?php
// ../actions/workflow_action.php

include "../settings/connection.php";  // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $workflow = $_POST["workflow"];
    $project_ID = $_POST["project_ID"];

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
        header ("Location: ../requests/update_workflow_redirect.php?msg=update&");
        // echo "Workflow updated successfully.";
    } else {
        echo "Error updating workflow: " . $conn->error;
    }

    // Close the database connection
    $conn->close();

    // Continue with your code...
}
?>

