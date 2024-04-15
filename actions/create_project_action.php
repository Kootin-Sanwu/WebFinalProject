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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $request_Status = $_POST["request_status"];
    $project_Name = $_POST["projectname"];
    $employee_ID = $_POST["employee_ID"];
    $start_Date = $_POST["start_date"];
    $end_Date = $_POST["end_date"];

    $sql = "INSERT INTO projects (project_name, employee_ID, begin_date, end_date) VALUES (?, ?, ?, ?)";
        
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("siss", $project_Name, $employee_ID, $start_Date, $end_Date);

    if ($stmt->execute()) {
        header("Location: ../managements/admin_management.php");
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();

    $conn->close();
} else {
    echo "Form not submitted.";
}
