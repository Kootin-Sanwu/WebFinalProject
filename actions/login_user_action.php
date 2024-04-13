<?php
include "../settings/connection.php";
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM employees WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $current_user = $result->fetch_assoc();
        $hashed_password = $current_user['password'];

        // if (password_verify($password, $hashed_password)) {
        //     session_start();
        //     $_SESSION['employee_ID'] = $current_user['employee_ID'];
        //     $_SESSION['department_ID'] = $current_user['department_ID'];
        //     $_SESSION['role_ID'] = $current_user['role_ID'];

        //     header("Location: ../../WebFinalProject/index.php");
        //     exit();
        if ($password) {
            session_start();
            $_SESSION['employee_ID'] = $current_user['employee_ID'];
            $_SESSION['department_ID'] = $current_user['department_ID'];
            $_SESSION['role_ID'] = $current_user['role_ID'];

            header("Location: ../../WebFinalProject/index.php");
            exit();
        } else {
            header("Location: ../logins/login_view.php?msg=Wrong Email or Password");
            exit();
        }
    } else {
        header("Location: ../logins/login_view.php?msg=Wrong Email or Password");
        exit();
    }
    
    $stmt->close();
} else {
    $LoginError = "Email or Password not provided.";
}

$_SESSION['inProgressCount'] = 0;
$_SESSION['completeCount'] = 0;
?>

<script>
    var userId = <?php 
    echo $_SESSION['employee_ID']; 
    ?>;
</script>
