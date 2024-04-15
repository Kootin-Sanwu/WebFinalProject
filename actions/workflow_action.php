<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include "../settings/connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $department_ID = $_POST["department_ID"];
    $project_ID = $_POST["project_ID"];
    $workflow = $_POST["workflow"];

    if ($workflow == 'IN PROGRESS') {
        $updateAssignmentSql = "UPDATE assignments SET workflow = 'IN PROGRESS' WHERE project_ID = {$project_ID}";
        $updateProjectSql = "UPDATE projects SET workflow = 'IN PROGRESS' WHERE project_ID = {$project_ID}";
    } elseif ($workflow == 'COMPLETE') {
        $updateAssignmentSql = "UPDATE assignments SET workflow = 'COMPLETE' WHERE project_ID = {$project_ID}";
        $updateProjectSql = "UPDATE projects SET workflow = 'IN PROGRESS' WHERE project_ID = {$project_ID}";
    } else {
        echo "Failed to get the workflow";
        exit;
    }

    if ($conn->query($updateAssignmentSql) === TRUE) {
        
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

        header ("Location: ../directions/workflow_direction.php?msg=update&employee_ID={$department_ID}");
    } else {
        echo "Error updating workflow: " . $conn->error;
    }

    $conn->close();
}

?>

