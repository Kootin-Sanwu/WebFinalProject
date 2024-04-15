<?php
include "../settings/connection.php";

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET["msg"])) {
    $message = $_GET["msg"];

    if ($message == "approve") {
        $department_ID = $_POST["department_ID"];
        $project_Name = $_POST["project_name"];
        $employee_ID = $_POST["employee_ID"];
        $close_Value = $_POST['closeButton'];
        $request_ID = $_POST["request_ID"];
        $begin_Date = $_POST["begin_date"];
        $end_Date = $_POST["end_date"];

        echo $department_ID . "<br>";
        echo $project_Name . "<br>";
        echo $request_ID . "<br>";
        echo $begin_Date . "<br>";
        echo $end_Date . "<br>";

        if ($close_Value == "close") {
            header("Location: {$_SERVER['HTTP_REFERER']}");
            exit();
        } else {
        
            $sql_request_update = "UPDATE requests SET request_status = 'APPROVED' WHERE request_ID = ?";
            
            $stmt = $conn->prepare($sql_request_update);
            $stmt->bind_param("i", $request_ID);

            if ($stmt->execute()) {
                $sql_project_insert = "INSERT INTO projects (project_name, employee_ID, begin_date, end_date, workflow, status) 
                VALUES (?, ?, ?, ?, 'ASSIGNED', 'APPROVED')";

                $stmt_insert = $conn->prepare($sql_project_insert);
                $stmt_insert->bind_param("sss", $project_Name, $_employee_ID, $begin_Date, $end_Date);

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
        }

    } elseif ($message == "reject") {
        $close_Value = $_POST['closeButton'];
        $request_ID = $_POST["request_ID"];

        if ($close_Value == "close") {
            header("Location: {$_SERVER['HTTP_REFERER']}");
            exit();
        } else {
            
            $sql_request_update = "UPDATE requests SET request_status = 'REJECTED' WHERE request_ID = ?";
            
            $stmt = $conn->prepare($sql_request_update);
            $stmt->bind_param("i", $request_ID);
    
            if ($stmt->execute()) {
                header("Location: {$_SERVER['HTTP_REFERER']}");
            } else {
                echo "Error updating request status: " . $stmt->error;
            }
    
            $stmt->close();
        }
    } else {
        echo "Unknown error caught";
    }
} else {
    echo "Message not received or form not submitted";
}

$conn->close();
?>
