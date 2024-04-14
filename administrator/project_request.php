<!-- <?php
// include "../settings/core.php";
// checkLogin();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/create_project.css">
    <title>Request Project</title>
</head>

<body>
    <div class="close-form-group">
        <button name="closeButton" onclick="closePopup()">Close</button>
    </div>
    <form class="container-15" id="myModal" method="POST" action="../actions/project_request_action.php">
        <div class="container-16">
            <div class="close-form-group">
                <button name="closeButton" onclick="closePopup()">Close</button>
            </div>
            <input type="hidden" name="employee_ID" value="<?php 
            // echo $_SESSION['employee_ID']; 
            ?>">

            <div class="form-group">
                <label for="project_name">Project Name:</label>
                <input type="text" required name="project_name" id="project_name" placeholder="Project Name" required>
                     
                <label for="begin_date">Begin Date:</label>
                <input type="date" required name="begin_date" id="begin_date" placeholder="Begin date" required>
                
                <label for="end_date">End Date:</label>
                <input type="date" required name="end_date" id="end_date" placeholder="End Date" required>
            </div>

            <input type="hidden" name="request_status" value="pending">

            <div class="submit">
                <button name="addButton">Request</button>
            </div>
        </div>
    </form>
    <script src="../javascript/request_project.js" defer></script>
</body>

</html> -->


<!-- <?php
// include "../settings/core.php";
// checkLogin();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/create_project.css">
    <title>Request Project</title>
</head>

<body>
    <div class="close-form-group">
        <button name="closeButton" onclick="closePopup()">Close</button>
    </div>
    <form class="container-15" id="myModal" method="POST" action="../actions/project_request_action.php">
        <div class="container-16">
            <input type="hidden" name="employee_ID" value="<?php
            //  echo $_SESSION['employee_ID'];
              ?>">

            <div class="form-group">
                <label for="project_name">Project Name:</label>
                <input type="text" required name="project_name" id="project_name" placeholder="Project Name" required>
                     
                <label for="begin_date">Begin Date:</label>
                <input type="date" required name="begin_date" id="begin_date" placeholder="Begin date" required>
                
                <label for="end_date">End Date:</label>
                <input type="date" required name="end_date" id="end_date" placeholder="End Date" required>
            </div>

            <input type="hidden" name="request_status" value="pending">

            <div class="submit">
                <button name="addButton">Request</button>
            </div>
        </div>
    </form>
    <script src="../javascript/request_project.js" defer></script>
</body>

</html> -->



<?php
include "../settings/core.php";
checkLogin();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/create_project.css">
    <title>Request Project</title>
</head>

<body>
    <div class="container-15">
        <div class="close-form-group">
            <button name="closeButton" onclick="closePopup()">Close</button>
        </div>
        <form class="container-16" id="myModal" method="POST" action="../actions/project_request_action.php">
            <input type="hidden" name="employee_ID" value="<?php echo $_SESSION['employee_ID']; ?>">

            <div class="form-group">
                <label for="project_name">Project Name:</label>
                <input type="text" required name="project_name" id="project_name" placeholder="Project Name" required>
                     
                <label for="begin_date">Begin Date:</label>
                <input type="date" required name="begin_date" id="begin_date" placeholder="Begin date" required>
                
                <label for="end_date">End Date:</label>
                <input type="date" required name="end_date" id="end_date" placeholder="End Date" required>
            </div>

            <input type="hidden" name="request_status" value="pending">

            <div class="submit">
                <button name="addButton">Request</button>
            </div>
        </form>
    </div>
    <script src="../javascript/request_project.js" defer></script>
</body>

</html>
