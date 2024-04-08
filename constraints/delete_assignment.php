<?php

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,
            initial-scale=1.0">
    <link rel="stylesheet" href="../css/logout_view.css">
    <title>Logout Page</title>
</head>

<body>
    <form class="container-15" id="myModal" method="POST" action="../allocations/admin_allocation.php">
        <div class="container-16">
            CANNOT DELETE THIS ASSIGNMENT. THIS ASSIGNMENT IS CURRENTLY IN PROGRESS.
            <div class="submit">
                <div>
                    <button class="log-Out-button" name="logoutButton">OKAY</button>
                </div>
            </div>
        </div>
    </form>
    <script src="../javascript/logout_view.js" defer></script>
</body>

</html>