<?php
// include "../settings/connection.php";

// $sql = "SELECT * FROM departments";
$department_result = $conn->query($sql);

if ($department_result->num_rows > 0) {
    $department_results = mysqli_fetch_all($department_result, MYSQLI_ASSOC);
    return $department_results;
} else {
    echo "Could not fetch roles";
}

$conn->close();