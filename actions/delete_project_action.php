<?php
include "../settings/connection.php";

// Check if project_ID is set in POST request
if (isset($_POST['project_ID'])) {
    $project_ID = $_POST['project_ID'];

    // Check if the project_ID exists in the assignment table
    $checkSql = "SELECT * FROM assignments WHERE project_ID = ?";

    $stmt = $conn->prepare($checkSql);
    $stmt->bind_param("i", $project_ID);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // echo "Cannot delete project as it is assigned to a department";
        header("Location: ../managements/admin_management.php?msg=cannot delete");
        exit();
    } else {
        // SQL query to delete project from projects table
        $sql = "DELETE FROM projects WHERE project_ID = ?";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $project_ID);

        if ($stmt->execute()) {
            header("Location: ../managements/admin_management.php");
        } else {
            echo "Error deleting project: " . $stmt->error;
        }
    }
} else {
    echo "No project ID specified.";
}

// Close connection
$conn->close();
?>
