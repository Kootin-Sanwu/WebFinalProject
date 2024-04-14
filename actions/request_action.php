<?php
include "../settings/connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET["msg"])) {
    $department_ID = $_POST["department_ID"];
    $project_Name = $_POST["project_name"];
    $request_ID = $_POST["request_ID"];
    $begin_Date = $_POST["begin_date"];
    $end_Date = $_POST["end_date"];
    $message = $_GET["msg"];

    if ($message == "approve") {
        $sql_request_update = "UPDATE requests SET request_status = 'APPROVED' WHERE request_ID = ?";
        
        $stmt = $conn->prepare($sql_request_update);
        $stmt->bind_param("i", $request_ID);

        if ($stmt->execute()) {
            $sql_project_insert = "INSERT INTO projects (project_name, begin_date, end_date, workflow, status) 
            VALUES (?, ?, ?, 'ASSIGNED', 'APPROVED')";
            
            $stmt_insert = $conn->prepare($sql_project_insert);
            $stmt_insert->bind_param("sss", $project_Name, $begin_Date, $end_Date);
            
            if ($stmt_insert->execute()) {
                $project_ID = $stmt_insert->insert_id;

                $sql_assignment_insert = "INSERT INTO assignments (project_ID, department_ID, begin_date, end_date, workflow) 
                VALUES (?, ?, ?, ?, 'ASSIGNED')";
                
                $stmt_assignment_insert = $conn->prepare($sql_assignment_insert);
                $stmt_assignment_insert->bind_param("iiss", $project_ID, $department_ID, $begin_Date, $end_Date);

                if ($stmt_assignment_insert->execute()) {
                    header("Location: {$_SERVER['HTTP_REFERER']}");
                } else {
                    echo "Error creating assignment: " . $conn->error;
                }

                $stmt_assignment_insert->close();
            } else {
                echo "Error creating project: " . $conn->error;
            }

            $stmt_insert->close();
        } else {
            echo "Error updating request status: " . $stmt->error;
        }

        $stmt->close();

    } elseif ($message == "reject") {
        $sql_request_update = "UPDATE requests SET request_status = 'REJECTED' WHERE request_ID = ?";
        
        $stmt = $conn->prepare($sql_request_update);
        $stmt->bind_param("i", $request_ID);

        if ($stmt->execute()) {
            header("Location: {$_SERVER['HTTP_REFERER']}");
        } else {
            echo "Error updating request status: " . $stmt->error;
        }

        $stmt->close();

    } else {
        echo "Unknown error caught";
    }
} else {
    echo "Message not received of form not submitted";
}

$conn->close();
