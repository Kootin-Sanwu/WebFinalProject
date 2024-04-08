<?php
include "../settings/connection.php";

$sql = "SELECT * FROM projects";
$project_result = $conn->query($sql);

if ($project_result->num_rows > 0) {
    $project_results = mysqli_fetch_all($project_result, MYSQLI_ASSOC);
    return $project_results;
} else {
    echo "Could not fetch roles";
}

$conn->close();