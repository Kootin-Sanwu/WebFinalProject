<?php
include "../settings/connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (
        isset($_POST['department_ID']) && !empty($_POST['department_ID']) &&
        isset($_POST['request_ID']) && !empty($_POST['request_ID'])
    ) {   
        $department_ID = $_POST['department_ID'];
        $close_Value = $_POST['closeButton'];
        $request_ID = $_POST['request_ID'];
        
        if ($close_Value == "close") {
            header("Location: ../directions/close_delete_direction.php?department_ID={$department_ID}");
            exit();
        } else {
            $sql_delete_request = "DELETE FROM requests WHERE request_ID = ?";
            
            $stmt_delete_request = $conn->prepare($sql_delete_request);
            $stmt_delete_request->bind_param("i", $request_ID);
        
            if ($stmt_delete_request->execute()) {
                header("Location: ../directions/close_request_direction.php?department_ID={$department_ID}");
            } else {
                echo "Error deleting request: " . $stmt_delete_request->error;
            }
        
            $stmt_delete_request->close();
        }

    } else {
        echo "No request ID, employee ID, department ID, or close value specified.";
    }   
} else {
    echo "Server did not receive the POST request";
}

$conn->close();
?>
