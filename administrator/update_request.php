<?php
$requestID = $_GET['request_ID'];
echo $requestID;
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
    <form class="container-15" id="myModal" method="POST" action="../actions/request_action.php?msg=approve">
        <div class="container-16">
            <div class="close-form-group">
                <button name="closeButton" id="closePopup" onclick="closePopup()">Close</button>
            </div>
            <input type="hidden" name="request_ID" value="<?php
                                                            $request_ID = $_POST['request_ID'];
                                                            echo $request_ID;
                                                            ?>">

            <div class="text">
                THIS IS AN UPDATE TO AN EXISTING REQUEST
            </div>
            <div class="submit">
                <button name="submitButton">Approve</button>
            </div>
        </div>
    </form>
    <script src="../javascript/update_status.js" defer></script>
</body>

</html>