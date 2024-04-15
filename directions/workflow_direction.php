<?php
if (isset($_GET['msg']) && $_GET['msg'] == 'update') {
    if (isset($_GET['department_ID']))
        $department_ID = $_GET['department_ID'];

        switch ($employee_ID) {
            case 2:
                header("Location: ../managements/plumbing_management.php?msg=update");
                exit();
            case 3:
                header("Location: ../managements/electrical_management.php?msg=update");
                exit();
            case 4:
                header("Location: ../managements/concretery_management.php?msg=update");
                exit();
            case 5:
                header("Location: ../managements/carpentry_management.php?msg=update");
                exit();
            case 6:
                header("Location: ../managements/roofing_management.php?msg=update");
                exit();
            case 7:
                header("Location: ../managements/surveying_management.php?msg=update");
                exit();
            case 8:
                header("Location: ../managements/welding_management.php?msg=update");
                exit();
            default:
                echo "Current User ID is not set correctly.";
                exit();
        }   
} else {
    echo "Something is wrong";
}
