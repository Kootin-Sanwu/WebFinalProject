<?php
include "../settings/connection.php";

$sql = "SELECT * FROM roles";
$role_result = $conn->query($sql);

if ($role_result->num_rows > 0) {
    $role_results = mysqli_fetch_all($role_result, MYSQLI_ASSOC);
    return $role_results;
} else {
    echo "Could not fetch roles";
}

$conn->close();