<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$_SESSION = array();
session_destroy();

header("Location: ../logins/login_view.php");
exit();
?>
