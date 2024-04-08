<?php
include "../settings/connection.php";

// Check if project_ID is set in POST request
if (isset($_POST['project_ID'])) {
    $project_ID = $_POST['project_ID'];

    // Check if the project_ID exists in the assignment table
    $checkSql = "SELECT * FROM assignment WHERE project_ID = {$project_ID}";

    $result = $conn->query($checkSql);

    if ($result->num_rows > 0) {
        // echo "Cannot delete project as it is assigned to a department";
        header("Location: ../managements/admin_management.php?msg=cannot delete");
    } else {
        // SQL query to delete project from projects table
        $sql = "DELETE FROM projects WHERE project_ID = {$project_ID}";

        if ($conn->query($sql) === TRUE) {
            echo "Project deleted successfully.";
        } else {
            echo "Error deleting project: " . $conn->error;
        }
    }
} else {
    echo "No project ID specified.";
}

// Close connection
$conn->close();
