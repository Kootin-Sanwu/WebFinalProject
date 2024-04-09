<?php
$servername = "http://16.170.235.164/";
$username = "root";
$password =  "";
$database = "construction";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn -> connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>