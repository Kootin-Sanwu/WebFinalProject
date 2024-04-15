<?php

include "../settings/connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $assignment_ID = $_POST["assignment_ID"];

    
    if (!empty($assignment_ID)) {
        
        $fetchSql = "SELECT projects.workflow FROM assignment
                     JOIN projects ON assignment.project_ID = projects.project_ID
                     WHERE assignment.assignment_ID = {$assignment_ID}";

        $result = $conn->query($fetchSql);

        if ($close_Value == "close") {
            header("Location: ../allocations/admin_allocation.php");
            exit();
        }
        else if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $workflow = $row['workflow'];

            // Check if the workflow is "complete" or "assigned"
            if ($workflow == 'Complete' || $workflow == 'Unassigned') {

                // SQL query to delete assignment
                $sql = "DELETE FROM assignment WHERE assignment_ID = $assignment_ID";

                if ($conn->query($sql) === TRUE) {
                    header("Location: ../allocations/admin_allocation.php");
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            } else {
                header("location: ../allocations/admin_allocation.php?msg=cannot delete");
                echo "Assignment cannot be deleted. Workflow is In Progress. Or Assigned";
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
