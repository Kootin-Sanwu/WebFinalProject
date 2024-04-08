<?php
// include "../settings/connection.php";

// if (session_status() == PHP_SESSION_NONE) {
//     session_start();
// }

// // echo $_SESSION['user_ID'];

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $projectName = $_POST["projectname"];
//     $departmentID = $_POST["department_ID"];
//     $supervisorID = $_SESSION['user_ID'];

//     if (!empty($projectName) && !empty($departmentID)) {

//         $sql = "INSERT INTO projects (project_name, department_ID, employee_ID) VALUES ('$projectName', '$departmentID', $supervisorID)";

//         if ($conn->query($sql) === TRUE) {
//             header("Location: ../managements/admin_management.php");
//             // echo "Project created successfully.";
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


include "../settings/connection.php";

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// echo $_SESSION['user_ID'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $projectName = $_POST["projectname"];
    $startDate = $_POST["start_date"];
    $endDate = $_POST["end_date"];
    $requestStatus = $_POST["request_status"];
    $employeeID = $_POST["employee_ID"];
    $supervisorID = $_SESSION['user_ID'];

    if (!empty($projectName)) {

        $sql = "INSERT INTO projects (project_name, employee_ID, begin_date, end_date) VALUES ('$projectName', $supervisorID, '$startDate', '$endDate')";

        if ($conn->query($sql) === TRUE) {
            header("Location: ../managements/admin_management.php");
            // echo "Project created successfully.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Project name and department cannot be empty.";
    }

    $conn->close();
} else {
    echo "Form not submitted.";
}
