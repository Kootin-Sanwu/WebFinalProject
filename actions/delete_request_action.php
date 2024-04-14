<?php

include "../settings/connection.php";

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_POST['request_ID']) && isset($_POST['employee_ID'])) {
    $employee_ID = $_POST['employee_ID'];
    $request_ID = $_POST['request_ID'];

    echo $employee_ID;
    echo $request_ID;
    
    $sql = "DELETE FROM requests WHERE request_ID = ?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $request_ID);

    if ($stmt->execute()) {
        echo "Request deleted successfully.";
        // header("Location: {$_SERVER['HTTP_REFERER']}");
    } else {
        echo "Error deleting request: " . $stmt->error;
    }

    $stmt->close();

} else {
    echo "No request ID or employee ID specified.";
}

$conn->close();
