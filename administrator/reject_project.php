<?php
// echo "Request ID: " . $requestId;
// echo "Anything";
// include "../functions/request_project_func.php";
// displayRequests();
// $requestId = $_POST['actionValue'];
// echo $requestId;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/update_status.css">
    <title>Request Project</title>
</head>

<body>
    <form class="container-15" id="myModal" method="POST" action="../actions/request_action.php?msg=reject">
        <div class="container-16">
            <div class="close-form-group">
                <button name="closeButton" id="closePopup" onclick="closePopup()">Close</button>
            </div>
            <input type="hidden" name="request_ID" value="<?php
                                                            $requestId = $_POST['actionValue'];
                                                            echo $requestId;
                                                            ?>">

            <div class="text">
                CONFIRM REJECTION
            </div>
            <div class="submit">
                <button name="submitButton">Confirm</button>
            </div>
        </div>
    </form>
    <script src="../javascript/update_status.js" defer></script>
</body>

</html>