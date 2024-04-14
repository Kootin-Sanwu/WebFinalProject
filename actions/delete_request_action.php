<?php
include "../settings/connection.php";

if (isset($_POST['request_ID']) && isset($_POST['employee_ID']) && isset($_POST['department_ID'])) {
    $department_ID = $_POST['department_ID'];
    $employee_ID = $_POST['employee_ID'];
    $request_ID = $_POST['request_ID'];
    
    $sql_delete_request = "DELETE FROM requests WHERE request_ID = ?";
    
    $stmt_delete_request = $conn->prepare($sql_delete_request);
    $stmt_delete_request->bind_param("i", $request_ID);

    if ($stmt_delete_request->execute()) {
        // header("Location: {$_SERVER['HTTP_REFERER']}");
        header("Location: ../request/plumbing_request.php");
    } else {
        echo "Error deleting request: " . $stmt_delete_request->error;
    }

    $stmt_delete_request->close();

} else {
    echo "No request ID or employee ID or department ID specified.";
}

$conn->close();
?>
