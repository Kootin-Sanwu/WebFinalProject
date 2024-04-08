<?php
// include "../settings/connection.php";

// if (session_status() == PHP_SESSION_NONE) {
//     session_start();
// }

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $projectID = $_POST["project_ID"];
//     $departmentID = $_POST["department_ID"];

//     if (!empty($projectID) && !empty($departmentID)) {

//         $sql = "UPDATE projects SET department_ID = $departmentID WHERE project_ID = '$projectID'";



//         if ($conn->query($sql) === TRUE) {
//             header("Location: ../allocations/admin_allocation.php");
//         } else {
//             echo "Error: " . $sql . "<br>" . $conn->error;
//         }
//     } else {
//         echo "Project name and department cannot be empty.";
//     }

//     $conn->close();
// } else {
//     echo "Form not submitted.";
// }

// include "../settings/connection.php";

// if (session_status() == PHP_SESSION_NONE) {
//     session_start();
// }

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $projectID = $_POST["project_ID"];
//     $departmentID = $_POST["department_ID"];

//     if (!empty($projectID) && !empty($departmentID)) {

//         // Update projects table
//         $sqlProjects = "UPDATE projects SET department_ID = $departmentID WHERE project_ID = '$projectID'";
        
//         // Insert into assignment table
//         $sqlAssignment = "INSERT INTO assignment (project_ID, department_ID) VALUES ($projectID, $departmentID)";

//         // Execute the queries
//         if ($conn->query($sqlProjects) === TRUE && $conn->query($sqlAssignment) === TRUE) {
//             header("Location: ../allocations/admin_allocation.php");
//         } else {
//             echo "Error: " . $sqlProjects . "<br>" . $conn->error;
//         }
//     } else {
//         echo "Project ID and department ID cannot be empty.";
//     }

//     $conn->close();
// } else {
//     echo "Form not submitted.";
// }


// include "../settings/connection.php";

// if (session_status() == PHP_SESSION_NONE) {
//     session_start();
// }

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $projectID = $_POST["project_ID"];
//     $departmentID = $_POST["department_ID"];

//     if (!empty($projectID) && !empty($departmentID)) {

//         // Fetch begin_date and end_date of the project
//         $fetchSql = "SELECT begin_date, end_date FROM projects WHERE project_ID = {$projectID}";
//         $result = $conn->query($fetchSql);

//         if ($result->num_rows > 0) {
//             $row = $result->fetch_assoc();
//             $begin_date = $row['begin_date'];
//             $end_date = $row['end_date'];

//             // Update projects table
//             $sqlProjects = "UPDATE projects SET department_ID = $departmentID WHERE project_ID = '$projectID'";
            
//             // Insert into assignment table
//             $sqlAssignment = "INSERT INTO assignment (project_ID, department_ID, begin_date, end_date) 
//                               VALUES ($projectID, $departmentID, '{$begin_date}', '{$end_date}')";

//             // Execute the queries
//             if ($conn->query($sqlProjects) === TRUE && $conn->query($sqlAssignment) === TRUE) {
//                 header("Location: ../allocations/admin_allocation.php");
//             } else {
//                 echo "Error: " . $sqlProjects . "<br>" . $conn->error;
//             }
//         } else {
//             echo "Project not found.";
//         }
//     } else {
//         echo "Project ID and department ID cannot be empty.";
//     }

//     $conn->close();
// } else {
//     echo "Form not submitted.";
// }



include "../settings/connection.php";

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $projectID = $_POST["project_ID"];
    $departmentID = $_POST["department_ID"];

    if (!empty($projectID) && !empty($departmentID)) {

        // Check if project_ID already exists in assignment table
        $checkSql = "SELECT * FROM assignment WHERE project_ID = {$projectID}";
        $checkResult = $conn->query($checkSql);

        if ($checkResult->num_rows > 0) {
            header("Location: ../allocations/admin_allocation.php?msg=assigned");
            exit; // Stop executing the rest of the code
        }

        // Fetch begin_date and end_date of the project
        $fetchSql = "SELECT begin_date, end_date FROM projects WHERE project_ID = {$projectID}";
        $result = $conn->query($fetchSql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $begin_date = $row['begin_date'];
            $end_date = $row['end_date'];

            // Update projects table
            // $sqlProjects = "UPDATE projects SET department_ID = $departmentID WHERE project_ID = '$projectID'";
            // Update projects table
            $sqlProjects = "UPDATE projects SET department_ID = $departmentID, workflow = 'Assigned' WHERE project_ID = '$projectID'";

            // Insert into assignment table
            $sqlAssignment = "INSERT INTO assignment (project_ID, department_ID, begin_date, end_date) 
                              VALUES ($projectID, $departmentID, '{$begin_date}', '{$end_date}')";

            // Execute the queries
            if ($conn->query($sqlProjects) === TRUE && $conn->query($sqlAssignment) === TRUE) {
                header("Location: ../allocations/admin_allocation.php");
            } else {
                echo "Error: " . $sqlProjects . "<br>" . $conn->error;
            }
        } else {
            echo "Project not found.";
        }
    } else {
        echo "Project ID and department ID cannot be empty.";
    }

    $conn->close();
} else {
    echo "Form not submitted.";
}

