<?php
$servername = "127.0.0.1";
$username = "root";
$password =  "";
$database = "construction";

$conn = new mysqli($servername, $username, $password, $database);
// echo "Issue";

if ($conn -> connect_error) {
    echo "Issue";
    die("Connection failed: " . $conn->connect_error);
}
?>