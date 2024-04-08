<?php
include "../functions/select_role_func.php";
include "../functions/select_department_func.php";

// if (isset($_GET['msg']) && $_GET['msg'] == 'wrong_combination') {
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link rel="stylesheet" href="../css/register_view.css">
</head>

<body>
    <form class="register-container" method="POST" action="../actions/register_user_action.php">
        <div class="container-one">
            <div class="register-form">
                <h1>REGISTER</h1>
                <input type="text" name="firstName" placeholder="First Name" required>
                <input type="text" name="lastName" placeholder="Last Name" required>
                <input type="tel" name="phoneNumber" placeholder="Phone Number" required>
                <select name="department_ID" required>
                    <option value="" disabled selected>Department</option>
                    <?php
                    foreach ($department_results as $item_index => $item_value) {
                        echo "<option value=" . $item_value['department_ID'] . ">" . $item_value['department_name'] . "</option>";
                    }
                    ?>
                </select>
                <select name="role_ID" required>
                    <option value="" disabled selected>Role</option>
                    <?php
                    foreach ($role_results as $item_index => $item_value) {
                        echo "<option value=" . $item_value['role_ID'] . ">" . $item_value['role_name'] . "</option>";
                    }
                    ?>
                </select>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <input type="password" name="confirmpassword" placeholder="Confirm Password" required>
            </div>
        </div>
        <div class="container-four">
            <button class="register-button" type="submit">Join Now</button>
        </div>
        <div class="container-five">
            <h3>OR</h3>
        </div>
        <div class="container-six">
            <a href="../logins/login_view.php" class="signIn-button">Sign In</a>
        </div>
    </form>
    <div class="concept-container-one" id="password-criteria-messages"></div>
    <script src="../javascript/register_view.js" defer></script>
</body>
</html>