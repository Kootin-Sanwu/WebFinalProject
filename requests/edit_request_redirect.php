<?php
// if (isset($_GET['user_ID'])) {
//     $user_ID = $_GET['user_ID'];

//     switch ($user_ID) {
//         case 2:
//             header("Location: ../requests/plumbing_request.php?msg=cannot delete");
//             exit();
//         case 3:
//             header("Location: ../requests/electrical_request.php?msg=cannot delete");
//             exit();
//         case 4:
//             header("Location: ../requests/concretery_request.php?msg=cannot delete");
//             exit();
//         case 5:
//             header("Location: ../requests/carpentry_request.php?msg=cannot delete");
//             exit();
//         case 6:
//             header("Location: ../requests/roofing_request.php?msg=cannot delete");
//             exit();
//         case 7:
//             header("Location: ../requests/surveying_request.php?msg=cannot delete");
//             exit();
//         case 8:
//             header("Location: ../requests/welding_request.php?msg=cannot delete");
//             exit();
//         default:
//             echo "Current User ID is not set correctly.";
//             exit();
//     }
// }


// if (isset($_GET['msg']) && isset($_GET['user_ID'])) {
//     $msg = $_GET['msg'];
//     $user_ID = $_GET['user_ID'];

//     echo $msg;
//     echo $user_ID;

// Now you can use $msg and $user_ID in your code
// if ($msg == 'cannot_edit') {
//     switch ($user_ID) {
//         case 2:
//             header("Location: ../requests/plumbing_request.php?msg=cannot edit&user_ID={$user_ID}");
//             exit();
//         case 3:
//             header("Location: ../requests/electrical_request.php?msg=cannot edit&user_ID={$user_ID}");
//             exit();
//         case 4:
//             header("Location: ../requests/concretery_request.php?msg=cannot edit&user_ID={$user_ID}");
//             exit();
//         case 5:
//             header("Location: ../requests/carpentry_request.php?msg=cannot edit&user_ID={$user_ID}");
//             exit();
//         case 6:
//             header("Location: ../requests/roofing_request.php?msg=cannot edit&user_ID={$user_ID}");
//             exit();
//         case 7:
//             header("Location: ../requests/surveying_request.php?msg=cannot edit&user_ID={$user_ID}");
//             exit();
//         case 8:
//             header("Location: ../requests/welding_request.php?msg=cannot edit&user_ID={$user_ID}");
//             exit();
//         default:
//             echo "Invalid user ID.";
//             exit();
//     }
// } elseif ($msg == 'edit') {
//     // Handle the edit message
//     switch ($user_ID) {
//         case 2:
//             header("Location: ../requests/plumbing_request.php?msg=edit");
//             exit();
//         case 3:
//             header("Location: ../requests/electrical_request.php?msg=edit");
//             exit();
//         case 4:
//             header("Location: ../requests/concretery_request.php?msg=edit");
//             exit();
//         case 5:
//             header("Location: ../requests/carpentry_request.php?msg=edit");
//             exit();
//         case 6:
//             header("Location: ../requests/roofing_request.php?msg=edit");
//             exit();
//         case 7:
//             header("Location: ../requests/surveying_request.php?msg=edit");
//             exit();
//         case 8:
//             header("Location: ../requests/welding_request.php?msg=edit");
//             exit();
//         default:
//             echo "Invalid user ID.";
//             exit();
//         }
//     echo "You can proceed with editing.";
//     echo "User ID: " . $user_ID;
// }
//  else {
//     echo "Invalid message.";
// }
// } else {
//     echo "Message or User ID not set in the URL.";
// }







// if (isset($_GET['msg'])) {
//     $msg = $_GET['msg'];

//     if ($msg == 'edit') {
//         $employee_ID = $_POST['employee_ID'];
//         if (isset($_POST['employee_ID']) && isset($_POST['request_ID'])) {
//             $employee_ID = $_POST['employee_ID'];
//             $request_ID = $_POST['request_ID'];

//             // Now you have the employee_ID and request_ID from the form
//             echo "Employee ID: " . $employee_ID . "<br>";
//             echo "Request ID: " . $request_ID;


//             switch ($employee_ID) {
//                 case 2:
//                     header("Location: ../requests/plumbing_request.php?msg=edit&request_ID={$request_ID}&employee_ID={$employee_ID}");
//                     exit();
//                 case 3:
//                     header("Location: ../requests/electrical_request.php?msg=edit&request_ID={$request_ID}");
//                     exit();
//                 case 4:
//                     header("Location: ../requests/concretery_request.php?msg=edit&request_ID={$user_ID}");
//                     exit();
//                 case 5:
//                     header("Location: ../requests/carpentry_request.php?msg=edit&request_ID={$request_ID}");
//                     exit();
//                 case 6:
//                     header("Location: ../requests/roofing_request.php?msg=edit&request_ID={$request_ID}");
//                     exit();
//                 case 7:
//                     header("Location: ../requests/surveying_request.php?msg=edit&request_ID={$request_ID}");
//                     exit();
//                 case 8:
//                     header("Location: ../requests/welding_request.php?msg=edit&request_ID={$request_ID}");
//                     exit();
//                 default:
//                     echo "Invalid user ID.";
//                     exit();
//             }
//         }  elseif (isset($_GET['msg']) && isset($_GET['employee_ID'])) {
//                 switch ($employee_ID) {
//                 case 2:
//                     header("Location: ../requests/plumbing_request.php");
//                     exit();
//                 case 3:
//                     header("Location: ../requests/electrical_request.php");
//                     exit();
//                 case 4:
//                     header("Location: ../requests/concretery_request.php");
//                     exit();
//                 case 5:
//                     header("Location: ../requests/carpentry_request.php");
//                     exit();
//                 case 6:
//                     header("Location: ../requests/roofing_request.php");
//                     exit();
//                 case 7:
//                     header("Location: ../requests/surveying_request.php");
//                     exit();
//                 case 8:
//                     header("Location: ../requests/welding_request.php");
//                     exit();
//                 default:
//                     echo "Invalid user ID.";
//                     exit();
//                 }
//             }
//         } else {
//             echo "Issue";
//     } else {
//         echo "Issue";
//     }



if (isset($_GET['msg'])) {
    $msg = $_GET['msg'];

    if ($msg == 'edit') {

        if (isset($_POST['employee_ID']) && isset($_POST['request_ID'])) {
            $employee_ID = $_POST['employee_ID'];
            $request_ID = $_POST['request_ID'];

            // Now you have the employee_ID and request_ID from the form
            echo "Employee ID: " . $employee_ID . "<br>";
            echo "Request ID: " . $request_ID;

            switch ($employee_ID) {
                case 2:
                    header("Location: ../requests/plumbing_request.php?msg=edit&request_ID={$request_ID}&employee_ID={$employee_ID}");
                    exit();
                case 3:
                    header("Location: ../requests/electrical_request.php?msg=edit&request_ID={$request_ID}&employee_ID={$employee_ID}");
                    exit();
                case 4:
                    header("Location: ../requests/concretery_request.php?msg=edit&request_ID={$request_ID}&employee_ID={$employee_ID}");
                    exit();
                case 5:
                    header("Location: ../requests/carpentry_request.php?msg=edit&request_ID={$request_ID}&employee_ID={$employee_ID}");
                    exit();
                case 6:
                    header("Location: ../requests/roofing_request.php?msg=edit&request_ID={$request_ID}&employee_ID={$employee_ID}");
                    exit();
                case 7:
                    header("Location: ../requests/surveying_request.php?msg=edit&request_ID={$request_ID}&employee_ID={$employee_ID}");
                    exit();
                case 8:
                    header("Location: ../requests/welding_request.php?msg=edit&request_ID={$request_ID}&employee_ID={$employee_ID}");
                    exit();
                default:
                    echo "Invalid user ID.";
                    exit();
            }
        } elseif (isset($_GET['employee_ID']) && !isset($_GET['request_ID'])) {
            $employee_ID = $_GET['employee_ID'];
            
            switch ($employee_ID) {
                case 2:
                    header("Location: ../requests/plumbing_request.php");
                    exit();
                case 3:
                    header("Location: ../requests/electrical_request.php");
                    exit();
                case 4:
                    header("Location: ../requests/concretery_request.php");
                    exit();
                case 5:
                    header("Location: ../requests/carpentry_request.php");
                    exit();
                case 6:
                    header("Location: ../requests/roofing_request.php");
                    exit();
                case 7:
                    header("Location: ../requests/surveying_request.php");
                    exit();
                case 8:
                    header("Location: ../requests/welding_request.php");
                    exit();
                default:
                    echo "Invalid user ID.";
                    exit();
            }
        } else {
            echo "Issue";
        }
    } else {
        echo "Issue";
    }
}
