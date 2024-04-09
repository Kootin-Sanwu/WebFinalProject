<?php
$servername = "localhost";
$username = "root";
$password =  "K22.Kb16.Nk28.Ny27";
$database = "construction";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn -> connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>