<?php

include "../settings/connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $assignment_ID = $_POST["assignment_ID"];
    $close_Value = $_POST["closeButton"];
    
    if (!empty($assignment_ID)) {
        
        $fetchSql = "SELECT p.workflow 
                     FROM assignments a
                     JOIN projects p ON a.project_ID = p.project_ID
                     WHERE a.assignment_ID = {$assignment_ID}";

        $result = $conn->query($fetchSql);

        if ($close_Value == "close") {
            header("Location: ../allocations/admin_allocation.php");
            exit();
        }
        else if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $workflow = $row['workflow'];

            // Check if the workflow is "COMPLETE", "ASSIGNED", or "UNASSIGNED"
            if ($workflow == 'COMPLETE' || $workflow == 'ASSIGNED' || $workflow == 'UNASSIGNED') {

                // SQL query to delete assignment
                $sql = "DELETE FROM assignments WHERE assignment_ID = $assignment_ID";

                if ($conn->query($sql) === TRUE) {
                    header("Location: ../allocations/admin_allocation.php");
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            } else {
                header("location: ../allocations/admin_allocation.php?msg=cannot delete");
                echo "Assignment cannot be deleted. Workflow is In Progress or Rejected";
            }
        } else {
            echo "Assignment not found.";
        }
    } else {
        echo "Assignment ID cannot be empty.";
    }

    $conn->close();
} else {
    echo "Form not submitted.";
}
