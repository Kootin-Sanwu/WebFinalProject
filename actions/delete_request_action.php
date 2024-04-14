<?php

include "../settings/connection.php";

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


if (isset($_POST['request_ID']) && isset($_POST['employee_ID'])) {
    $request_ID = $_POST['request_ID'];
    
    $sql = "DELETE FROM requests WHERE request_ID = {$request_ID}";
    // header("Location: {$_SERVER['HTTP_REFERER']}");
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
} else {
    echo "No request ID or employee ID specified.";
}

$conn->close();
