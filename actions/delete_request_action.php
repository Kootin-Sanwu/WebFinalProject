<?php

include "../settings/connection.php";

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_POST['request_ID'])) {
    $request_ID = $_POST['request_ID'];
    $user_ID = $_SESSION['user_ID'];

    $checkSql = "SELECT * FROM projects WHERE request_ID = {$request_ID}";
    $checkResult = $conn->query($checkSql);
    
    if ($checkResult->num_rows == 0) {
        $sql = "DELETE FROM requests WHERE request_ID = {$request_ID}";

        if ($conn->query($sql) === TRUE) {
            header("Location: ../requests/delete_request_redirect.php");
        } else {
            echo "Error deleting request: " . $conn->error;
        }
    } else {
        echo $user_ID;
        header("Location: ../requests/delete_request_redirect.php?user_ID={$user_ID}");
        echo "Request is associated with a project and cannot be deleted.";
    }
} else {
    echo "No request ID specified.";
}

$conn->close();
