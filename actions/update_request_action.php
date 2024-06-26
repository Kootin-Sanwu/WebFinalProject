<?php
include '../settings/connection.php';

if(isset($_GET['msg']) && isset($_POST['request_ID'])) {
    
    $request_ID = $_POST['request_ID'];
    
    // SQL query to check if the request_ID is already in the database
    $sql_check_request = "SELECT * FROM requests WHERE request_ID = ?";
    
    // Prepare the SQL statement
    $stmt = $conn->prepare($sql_check_request);
    
    // Bind the request_ID parameter
    $stmt->bind_param("i", $request_ID);
    
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
