<?php

include "../settings/connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $department_ID = $_POST['department_ID'];
    $request_ID = $_POST['request_ID'];
    $project_name = $_POST['project_name'];
    $begin_date = $_POST['begin_date'];
    $end_date = $_POST['end_date'];

    if ($close_Value == "close") {
        header("Location: {$_SERVER['HTTP_REFERER']}");
        exit();
    } else {

        $sql = "UPDATE requests SET project_name = ?, begin_date = ?, end_date = ?, request_status = 'pending' WHERE request_ID = ?";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssi", $project_name, $begin_date, $end_date, $request_ID);

        if ($stmt->execute()) {
            echo "Record updated successfully";
            header("Location: ../directions/close_edit_direction.php?department_ID={$department_ID}");
        } else {
            echo "Error updating record: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    }
} else {
    echo "Form not submitted.";
}
