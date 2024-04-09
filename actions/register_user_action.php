<?php
// include "../settings/connection.php";

// $first_name = $_POST['firstName'];
// $last_name = $_POST['lastName'];
// $phone_number = $_POST['phoneNumber'];
// $department_ID = $_POST['department_ID'];
// $role_ID = $_POST['role_ID'];
// $email = $_POST['email'];
// $password = $_POST['password'];

// echo $first_name;
// echo $last_name;
// echo $phone_number;
// echo $department;
// echo $role;
// echo $email;
// echo $password;

// $validRolesForDepartment = [
//     1 => [1],
//     2 => [2, 9],
//     3 => [3, 9],
//     4 => [4, 9],
//     5 => [5, 9],
//     6 => [6, 9],
//     7 => [7, 9],
//     8 => [8, 9]
// ];

// if (!in_array($role_ID, $validRolesForDepartment[$department_ID])) {
//     header("Location: ../logins/register_view.php?msg=wrong_combination");
//     exit();
// }

// $hashed_password = password_hash($password, PASSWORD_DEFAULT);

// $sql = "INSERT INTO employees (first_name, last_name, phone_number, department_ID, role_ID, email, password) 
//         VALUES ('$first_name', '$last_name', '$phone_number', '$department_ID', '$role_ID', '$email', '$hashed_password')";

// if ($conn->query($sql) == TRUE) {
//     echo "No issues";
//     // header("Location: ../logins/login_view.php");
// } else {
//     echo "There is an issue";
//     echo "Error: " . $sql . "<br>" . $conn->error;
// }

// $conn->close();


include "../settings/connection.php";

$first_name = $_POST['firstName'];
$last_name = $_POST['lastName'];
$phone_number = $_POST['phoneNumber'];
$department_ID = $_POST['department_ID'];
$role_ID = $_POST['role_ID'];
$email = $_POST['email'];
$password = $_POST['password'];


$validRolesForDepartment = [
    1 => [1],
    2 => [2, 9],
    3 => [3, 9],
    4 => [4, 9],
    5 => [5, 9],
    6 => [6, 9],
    7 => [7, 9],
    8 => [8, 9]
];

if (!in_array($role_ID, $validRolesForDepartment[$department_ID])) {
    header("Location: ../logins/register_view.php?msg=wrong_combination");
    exit();
}

$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Using prepared statements to prevent SQL injection
$stmt = $conn->prepare("INSERT INTO employees (first_name, last_name, phone_number, department_ID, role_ID, email, password) 
                        VALUES (?, ?, ?, ?, ?, ?, ?)");

$stmt->bind_param("sssiiss", $first_name, $last_name, $phone_number, $department_ID, $role_ID, $email, $hashed_password);

echo $first_name . "<br>";
echo $last_name . "<br>";
echo $phone_number . "<br>";
echo $department_ID . "<br>"; // Added for debugging
echo $role_ID . "<br>"; // Added for debugging
echo $email . "<br>";
echo $password . "<br>";

// Execute the statement

if ($stmt->execute() === TRUE) {
    echo "No issues";
    // header("Location: ../logins/login_view.php");
} else {
    echo "There is an issue";
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
