<?php
include "../settings/connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET["msg"])) {
    $message = $_GET["msg"];
    $request_ID = $_POST["request_ID"];

    
    if ($message == "approve") {
        // Update the request_status to approved in project_requests table
        $sql = "UPDATE project_requests SET request_status = 'approved' WHERE request_ID = $request_ID";
        // echo $message;

        if ($conn->query($sql) === TRUE) {
            echo "Request status updated successfully to approved.";

            // Retrieve project_name, employee_ID from project_requests table
            $sql_select = "SELECT project_name, employee_ID, begin_date, end_date FROM project_requests WHERE request_ID = $request_ID";
            $result = $conn->query($sql_select);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $projectName = $row["project_name"];
                $employee_ID = $row["employee_ID"];
                $beginDate = $row["begin_date"];
                $endDate = $row["end_date"];

                // Retrieve department_ID from employees table using employee_ID
                $sql_department = "SELECT department_ID FROM employees WHERE employee_ID = $employee_ID";
                $result_department = $conn->query($sql_department);

                if ($result_department->num_rows > 0) {
                    $row_department = $result_department->fetch_assoc();
                    $departmentId = $row_department["department_ID"];
                
                    // Check if the project already exists in projects table
                    $sql_check = "SELECT project_ID FROM projects WHERE request_ID = $request_ID";
                    $result_check = $conn->query($sql_check);

                    if ($result_check->num_rows > 0) {
                        $row_check = $result_check->fetch_assoc();
                        $projectId = $row_check["project_ID"];
                        // echo $request_ID;
                        // header ("Location: ../requests/admin_request.php?msg=update&request_ID={$request_ID}");
                        header ("Location: ../requests/admin_request.php");
                        // echo "Project already exists in projects table with project_ID: $projectId";
                    } else {
                        // Insert the project into projects table with department_ID and request_ID
                        $sql_project_insert = "INSERT INTO projects (request_ID, project_name, department_ID, employee_ID, begin_date, end_date, workflow, status) 
                                               VALUES ($request_ID, '$projectName', $departmentId, $employee_ID, '$beginDate', '$endDate', 'Assigned', 'approved')";
                
                        if ($conn->query($sql_project_insert) === TRUE) {
                            // Get the last inserted project_ID
                            $last_insert_id = $conn->insert_id;
                
                            // Insert into assignment table
                            $sql_assignment_insert = "INSERT INTO assignment (project_ID, department_ID, begin_date, end_date) 
                                                      VALUES ($last_insert_id, $departmentId, '$beginDate', '$endDate')";
                
                            if ($conn->query($sql_assignment_insert) === TRUE) {
                                header("Location: ../requests/admin_request.php");
                            } else {
                                echo "Error: " . $sql_assignment_insert . "<br>" . $conn->error;
                            }
                        } else {
                            echo "Error: " . $sql_project_insert . "<br>" . $conn->error;
                        }
                    }
                } else {
                    echo "Error retrieving department_ID: " . $conn->error;
                }
            }
        } else {
            echo "Error updating request status: " . $conn->error;
        }
    } elseif ($message == "reject") {
        // Update the request_status to rejected in project_requests table
        $sql = "UPDATE project_requests SET request_status = 'rejected' WHERE request_ID = $request_ID";

        if ($conn->query($sql) === TRUE) {
            echo "Request status updated successfully to rejected.";

            // Remove the request from project_requests table
            // $sql_remove = "DELETE FROM project_requests WHERE request_ID = $request_ID";
            // if ($conn->query($sql_remove) === TRUE) {
            // echo "Request removed from project_requests table.";
            header("Location: ../requests/admin_request.php");
            // } else {
            // echo "Error removing request from project_requests table: " . $conn->error;
            // }
        } else {
            echo "Error updating request status: " . $conn->error;
        }
    } else {
        echo "Error";
    }
} else {
    echo "error";
}

$conn->close();
