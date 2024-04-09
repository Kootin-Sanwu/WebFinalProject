<?php
include "../actions/login_user_action.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LogIn Page</title>
    <link rel="stylesheet" href="../css/login_view.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>
    <div class="concept-container-two">
        <form class="logIn-container" action="../actions/login_user_action.php" method="POST" name="loginpage" id="loginpage">
            <div class="container">
                <h1>Log In</h1>
            </div>
            <div class="container">
                <div class="logIn-form" method="POST">
                    <input type="text" placeholder="Email" required id="email" name="email">
                    <input type="password" placeholder="Password" required id="password" name="password">
                </div>
            </div>
            <div class="container">
                <button class="log-In-button" type="submit" name="login">Log In</button>
                <a href="URL" class="link">Forgotten password?</a>
            </div>
            <div class="container">
                <div class="logIn-form">
                    <button class="Google-button"><img src="../pixels/Logos/Google Logo.png" width="25" align="center"> Continue
                        with Google</button>
                    <button class="Microsoft-button"><img src="../pixels/Logos/Microsoft Logo.png" width="25" align="center">
                        Continue with Microsoft</button>
                </div>
            </div>
            <div class="container">
                <a href="../logins/register_view.php" class="link">Sign Up</a>
            </div>
        </form>
    </div>
    <div class="concept-container" id="password-criteria-messages">
        <?php
        if (isset($_GET['msg']) && $_GET['msg'] === "Wrong Email or Password") {
            echo "Wrong Email or Password";
        }
        ?>
    </div>
    <!-- <script>
        document.addEventListener("DOMContentLoaded", function() {
            <?php
            // if (isset($_GET['msg']) && $_GET['msg'] === "Wrong Password") {
            //     echo "swal('Error', 'User already registered', 'error');";
            // }
            ?>
        });
    </script> -->
    <script src="../javascript/login_view.js" defer></script>
</body>

</html>

<!-- http://localhost/LabAssignment3/login/loginpage.php -->