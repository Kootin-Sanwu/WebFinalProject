<?php
$servername = "localhost";
$username = "root";
$password =  "";
$database = "construction";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn -> connect_error) {
    echo "Issue";
    die("Connection failed: " . $conn->connect_error);
}
?>