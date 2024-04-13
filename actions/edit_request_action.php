<?php

include "../settings/connection.php";  // Assuming this file contains your database connection code

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get the values from the form
    $department_ID = $_POST['department_ID'];
    $request_ID = $_POST['request_ID'];
    $project_name = $_POST['project_name'];
    $begin_date = $_POST['begin_date'];
    $end_date = $_POST['end_date'];

    // SQL query to update the project request
    $sql = "UPDATE requests SET 
            project_name = '$project_name', 
            begin_date = '$begin_date', 
            end_date = '$end_date',
            request_status = 'pending' 
            WHERE request_ID = $request_ID";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
        header("Location: ../requests/edit_request_redirect.php?msg=edit&department_ID={$department_ID}");
    } else {
        echo "Error updating record: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    echo "Form not submitted.";
}








// include "../settings/connection.php";

// if (session_status() == PHP_SESSION_NONE) {
//     session_start();
// }

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     if (isset($_POST['project_ID'])) {

//         $project_ID = $_POST['project_ID'];
//         $user_ID = $_SESSION['user_ID'];

//         // Check the workflow of the project
//         $checkSql = "SELECT workflow FROM projects WHERE project_ID = {$project_ID}";
//         $checkResult = $conn->query($checkSql);

//         if ($checkResult->num_rows > 0) {
//             $row = $checkResult->fetch_assoc();
//             $workflow = $row['workflow'];

//             if ($workflow == 'Complete') {
//                 header("Location: ../requests/edit_request_redirect.php?msg=cannot_edit&user_ID={$user_ID}");
//                 exit();
//             } else {
//                 header("Location: ../requests/edit_request_redirect.php?msg=edit&user_ID={$user_ID}");
//                 exit();
//             }
//         } else {
//             echo "Project not found.";
//         }

//         // Close connection
//         $conn->close();

//     } else {
//         echo "project_ID is not set in POST.";
//     }
// } else {
//     echo "Form not submitted using POST method.";
// }
