<?php
// // Include your database connection file here
// // For example: include 'db_connection.php';

// // Check if the request_ID is set in the URL
// if(isset($_GET['msg']) && isset($_POST['actionValue'])) {
    
//     $requestID = $_POST['actionValue'];
    
//     // SQL query to check if the request_ID is already in the database
//     $sql_check_request = "SELECT * FROM project_requests WHERE request_ID = ?";
    
//     // Prepare the SQL statement
//     $stmt = $pdo->prepare($sql_check_request);
    
//     // Bind the request_ID parameter
//     $stmt->bindParam(1, $requestID, PDO::PARAM_INT);
    
//     // Execute the SQL statement
//     $stmt->execute();
    
//     // Fetch the result
//     $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
//     // Check if the request is already in the database
//     if($result) {
//         // Redirect to admin_request.php with update message
//         header("Location: ../requests/admin_request.php?msg=update&request_ID={$requestID}");
//         exit();
//     } else {
//         // Check the msg parameter from the URL
//         $msg = $_GET['msg'];
        
//         // Redirect based on the msg parameter
//         if($msg === 'approve') {
//             header("Location: ../requests/admin_request.php?msg=approve");
//             exit();
//         } elseif($msg === 'reject') {
//             header("Location: ../requests/admin_request.php?msg=reject");
//             exit();
//         } else {
//             // Handle invalid msg parameter
//             echo "Invalid message parameter!";
//             exit();
//         }
//     }
// } else {
//     // Handle missing parameters
//     echo "Missing parameters!";
//     exit();
// }



// Include your database connection file here
include '../settings/connection.php';

// Check if the request_ID is set in the URL
if(isset($_GET['msg']) && isset($_POST['actionValue'])) {
    
    $requestID = $_POST['actionValue'];
    
    // SQL query to check if the request_ID is already in the database
    $sql_check_request = "SELECT * FROM project_requests WHERE request_ID = ?";
    
    // Prepare the SQL statement
    $stmt = $conn->prepare($sql_check_request);
    
    // Bind the request_ID parameter
    $stmt->bind_param("i", $requestID);
    
    // Execute the SQL statement
    $stmt->execute();
    
    // Get the result
    $result = $stmt->get_result();
    
    // Fetch the row
    $row = $result->fetch_assoc();
    
    // Check if the request is already in the database
    if($row) {
        // Redirect to admin_request.php with update message
        header("Location: ../requests/admin_request.php?msg=update&request_ID={$requestID}");
        exit();
    } else {
        // Check the msg parameter from the URL
        $msg = $_GET['msg'];
        
        // Redirect based on the msg parameter
        if($msg === 'approve') {
            header("Location: ../requests/admin_request.php?msg=approve&request_ID={$requestID}");
            exit();
        } elseif($msg === 'reject') {
            header("Location: ../requests/admin_request.php?msg=reject&request_ID={$requestID}");
            exit();
        } else {
            // Handle invalid msg parameter
            echo "Invalid message parameter!";
            exit();
        }
    }
    
    // Close the connection
    $stmt->close();
    $conn->close();
    
} else {
    // Handle missing parameters
    echo "Missing parameters!";
    exit();
}

?>
