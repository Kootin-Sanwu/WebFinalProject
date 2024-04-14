<?php
include "../settings/connection.php";

if (isset($_POST['request_ID']) && isset($_POST['employee_ID']) && isset($_POST['department_ID']) && isset($_POST['close_value'])) {
    $department_ID = $_POST['department_ID'];
    $employee_ID = $_POST['employee_ID'];
    $request_ID = $_POST['request_ID'];
    $close_Value = $_POST['closeButton'];
    
    if ($close_Value == "close") {
        header("Location: ../directions/close_request_direction.php?msg=close");
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

$conn->close();
?>
