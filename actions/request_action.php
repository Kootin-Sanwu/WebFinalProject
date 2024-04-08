<?php
include "../settings/connection.php";
echo "Nothing here yet";

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $requestId = $_POST["request_ID"];
//     echo "Request ID: " . $requestId;
// } else {
//     echo "Request ID not present";
// }


// // Retrieve the message from GET data
// if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET["msg"])) {
//     echo "There is a problem";
//     $message = $_GET["msg"];
//     $requestId = $_POST["request_ID"]; // Assuming request_ID is also passed in the URL
//     echo "$requestId";

//     if ($message == "approve") {
//         // Update the request_status to approved in project_requests table
//         $sql = "UPDATE project_requests SET request_status = 'approved' WHERE request_ID = $requestId";

//         if ($conn->query($sql) === TRUE) {
//             echo "Request status updated successfully to approved.";

//             // Retrieve project_name and project_ID from project_requests table
//             $sql_select = "SELECT project_name, project_ID FROM project_requests WHERE request_ID = $requestId";
//             $result = $conn->query($sql_select);

//             if ($result->num_rows > 0) {
//                 $row = $result->fetch_assoc();
//                 $projectName = $row["project_name"];
//                 $projectId = $row["project_ID"];

//                 // Insert the project into projects table
//                 $sql_project_insert = "INSERT INTO projects (project_name, project_ID, status) VALUES ('$projectName', $projectId, 'approved')";

//                 if ($conn->query($sql_project_insert) === TRUE) {
//                     echo "Project added to projects table.";
//                 } else {
//                     echo "Error: " . $sql_project_insert . "<br>" . $conn->error;
//                 }
//             }
//         } else {
//             echo "Error updating request status: " . $conn->error;
//         }
//     } elseif ($message == "reject") {
//         // Update the request_status to rejected in project_requests table
//         $sql = "UPDATE project_requests SET request_status = 'rejected' WHERE request_ID = $requestId";

//         if ($conn->query($sql) === TRUE) {
//             echo "Request status updated successfully to rejected.";
//         } else {
//             echo "Error updating request status: " . $conn->error;
//         }
//     }
// }

// $conn->close();


// // Retrieve the message from GET data
// if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET["msg"])) {
//     $message = $_GET["msg"];
//     $requestId = $_POST["request_ID"];

//     if ($message == "approve") {
//         // Update the request_status to approved in project_requests table
//         $sql = "UPDATE project_requests SET request_status = 'approved' WHERE request_ID = $requestId";

//         if ($conn->query($sql) === TRUE) {
//             echo "Request status updated successfully to approved.";

//             // Retrieve project_name and employee_ID from project_requests table
//             $sql_select = "SELECT project_name, employee_ID FROM project_requests WHERE request_ID = $requestId";
//             $result = $conn->query($sql_select);

//             if ($result->num_rows > 0) {
//                 $row = $result->fetch_assoc();
//                 $projectName = $row["project_name"];
//                 $employeeId = $row["employee_ID"];

//                 // Retrieve department_ID from employees table using employee_ID
//                 $sql_department = "SELECT department_ID FROM employees WHERE employee_ID = $employeeId";
//                 $result_department = $conn->query($sql_department);

//                 if ($result_department->num_rows > 0) {
//                     $row_department = $result_department->fetch_assoc();
//                     $departmentId = $row_department["department_ID"];

//                     // Insert the project into projects table with department_ID
//                     $sql_project_insert = "INSERT INTO projects (project_name, department_ID, status) VALUES ('$projectName', $departmentId, 'approved')";

//                     if ($conn->query($sql_project_insert) === TRUE) {
//                         echo "Project added to projects table.";

//                         // Retrieve the auto-incremented project_ID from the last insert
//                         $projectId = $conn->insert_id;

//                         // Update the project_ID in project_requests table
//                         $sql_update = "UPDATE project_requests SET project_ID = $projectId WHERE request_ID = $requestId";

//                         if ($conn->query($sql_update) === TRUE) {
//                             echo "project_ID updated in project_requests table.";
//                         } else {
//                             echo "Error updating project_ID in project_requests table: " . $conn->error;
//                         }
//                     } else {
//                         echo "Error: " . $sql_project_insert . "<br>" . $conn->error;
//                     }
//                 } else {
//                     echo "Error retrieving department_ID: " . $conn->error;
//                 }
//             }
//         } else {
//             echo "Error updating request status: " . $conn->error;
//         }
//     } elseif ($message == "reject") {
//         // Update the request_status to rejected in project_requests table
//         $sql = "UPDATE project_requests SET request_status = 'rejected' WHERE request_ID = $requestId";

//         if ($conn->query($sql) === TRUE) {
//             echo "Request status updated successfully to rejected.";
//         } else {
//             echo "Error updating request status: " . $conn->error;
//         }
//     }
// }

// $conn->close();






// if (isset($_POST['request_ID'])) {
//     $requestId = $_POST['request_ID'];
//     echo "Request ID: " . $requestId; // This will display the request ID
// } else {
//     echo "Request ID is not set.";
// }

// echo $_POST['employee_ID'];

// // Retrieve the message from GET data
// if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET["msg"])) {
//     $message = $_GET["msg"];
//     $requestId = $_POST["request_ID"];

//     echo $message;

//     if ($message == "approve") {
//         // Update the request_status to approved in project_requests table
//         $sql = "UPDATE project_requests SET request_status = 'approved' WHERE request_ID = $requestId";

//         if ($conn->query($sql) === TRUE) {
//             echo "Request status updated successfully to approved.";

//             // Retrieve project_name, employee_ID from project_requests table
//             $sql_select = "SELECT project_name, employee_ID FROM project_requests WHERE request_ID = $requestId";
//             $result = $conn->query($sql_select);

//             if ($result->num_rows > 0) {
//                 $row = $result->fetch_assoc();
//                 $projectName = $row["project_name"];
//                 $employeeId = $row["employee_ID"];

//                 // Retrieve department_ID from employees table using employee_ID
//                 $sql_department = "SELECT department_ID FROM employees WHERE employee_ID = $employeeId";
//                 $result_department = $conn->query($sql_department);

//                 if ($result_department->num_rows > 0) {
//                     $row_department = $result_department->fetch_assoc();
//                     $departmentId = $row_department["department_ID"];

//                     // Check if the project already exists in projects table
//                     $sql_check = "SELECT project_ID FROM projects WHERE request_ID = $requestId";
//                     $result_check = $conn->query($sql_check);

//                     if ($result_check->num_rows > 0) {
//                         $row_check = $result_check->fetch_assoc();
//                         $projectId = $row_check["project_ID"];
//                         echo "Project already exists in projects table with project_ID: $projectId";
//                     } else {
//                         // Insert the project into projects table with department_ID and request_ID
//                         $sql_project_insert = "INSERT INTO projects (request_ID, project_name, department_ID, status) VALUES ($requestId, '$projectName', $departmentId, 'approved')";

//                         if ($conn->query($sql_project_insert) === TRUE) {
//                             echo "Project added to projects table.";

//                             // Retrieve the auto-incremented project_ID from the last insert
//                             $projectId = $conn->insert_id;

//                             // Update the project_ID in project_requests table
//                             $sql_update = "UPDATE project_requests SET project_ID = $projectId WHERE request_ID = $requestId";

//                             if ($conn->query($sql_update) === TRUE) {
//                                 echo "project_ID updated in project_requests table.";
//                             } else {
//                                 echo "Error updating project_ID in project_requests table: " . $conn->error;
//                             }
//                         } else {
//                             echo "Error: " . $sql_project_insert . "<br>" . $conn->error;
//                         }
//                     }
//                 } else {
//                     echo "Error retrieving department_ID: " . $conn->error;
//                 }
//             }
//         } else {
//             echo "Error updating request status: " . $conn->error;
//         }
//     } elseif ($message == "reject") {
//         // Update the request_status to rejected in project_requests table
//         $sql = "UPDATE project_requests SET request_status = 'rejected' WHERE request_ID = $requestId";

//         if ($conn->query($sql) === TRUE) {
//             echo "Request status updated successfully to rejected.";
//         } else {
//             echo "Error updating request status: " . $conn->error;
//         }
//     } else {
//         echo "Error";
//     }
// } else {
//     echo "error";
// }

// $conn->close();



// Retrieve the message from GET data
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET["msg"])) {
    $message = $_GET["msg"];
    $requestId = $_POST["request_ID"];

    echo $message;

    if ($message == "approve") {
        // Update the request_status to approved in project_requests table
        $sql = "UPDATE project_requests SET request_status = 'approved' WHERE request_ID = $requestId";

        if ($conn->query($sql) === TRUE) {
            echo "Request status updated successfully to approved.";

            // Retrieve project_name, employee_ID from project_requests table
            $sql_select = "SELECT project_name, employee_ID, begin_date, end_date FROM project_requests WHERE request_ID = $requestId";
            $result = $conn->query($sql_select);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $projectName = $row["project_name"];
                $employeeId = $row["employee_ID"];
                $beginDate = $row["begin_date"];
                $endDate = $row["end_date"];

                // Retrieve department_ID from employees table using employee_ID
                $sql_department = "SELECT department_ID FROM employees WHERE employee_ID = $employeeId";
                $result_department = $conn->query($sql_department);

                // if ($result_department->num_rows > 0) {
                //     $row_department = $result_department->fetch_assoc();
                //     $departmentId = $row_department["department_ID"];

                //     // Check if the project already exists in projects table
                //     $sql_check = "SELECT project_ID FROM projects WHERE request_ID = $requestId";
                //     $result_check = $conn->query($sql_check);

                //     if ($result_check->num_rows > 0) {
                //         $row_check = $result_check->fetch_assoc();
                //         $projectId = $row_check["project_ID"];
                //         echo "Project already exists in projects table with project_ID: $projectId";
                //     } else {
                //         // Insert the project into projects table with department_ID and request_ID
                //         $sql_project_insert = "INSERT INTO projects (request_ID, project_name, department_ID, employee_ID, begin_date, end_date, status) VALUES ($requestId, '$projectName', $departmentId, $employeeId, $beginDate, $endDate, 'approved')";

                //         if ($conn->query($sql_assignment_insert) === TRUE) {
                //             header("Location: ../requests/admin_request.php");
                //         } else {
                //             echo "Error: " . $sql_project_insert . "<br>" . $conn->error;
                //         }
                //     }
                // } else {
                //     echo "Error retrieving department_ID: " . $conn->error;
                // }

                if ($result_department->num_rows > 0) {
                    $row_department = $result_department->fetch_assoc();
                    $departmentId = $row_department["department_ID"];
                
                    // Check if the project already exists in projects table
                    $sql_check = "SELECT project_ID FROM projects WHERE request_ID = $requestId";
                    $result_check = $conn->query($sql_check);
                
                    if ($result_check->num_rows > 0) {
                        $row_check = $result_check->fetch_assoc();
                        $projectId = $row_check["project_ID"];
                        echo "Project already exists in projects table with project_ID: $projectId";
                    } else {
                        // Insert the project into projects table with department_ID and request_ID
                        $sql_project_insert = "INSERT INTO projects (request_ID, project_name, department_ID, employee_ID, begin_date, end_date, workflow, status) 
                                               VALUES ($requestId, '$projectName', $departmentId, $employeeId, '$beginDate', '$endDate', 'Assigned', 'approved')";
                
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
        $sql = "UPDATE project_requests SET request_status = 'rejected' WHERE request_ID = $requestId";

        if ($conn->query($sql) === TRUE) {
            echo "Request status updated successfully to rejected.";

            // Remove the request from project_requests table
            // $sql_remove = "DELETE FROM project_requests WHERE request_ID = $requestId";
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
