<?php
if (isset($_GET['msg']) && isset($_GET['department_ID'])) {
    $message = $_GET['msg'];
    $department_ID = $_GET['department_ID'];

    switch ($department_ID) {
        case 2:
            header("Location: ../allocations/plumbing_allocation.php");
            exit();
        case 3:
            header("Location: ../allocations/electrical_allocation.php");
            exit();
        case 4:
            header("Location: ../allocations/concretery_allocation.php");
            exit();
        case 5:
            header("Location: ../allocations/carpentry_allocation.php");
            exit();
        case 6:
            header("Location: ../allocations/roofing_allocation.php");
            exit();
        case 7:
            header("Location: ../allocations/surveying_allocation.php");
            exit();
        case 8:
            header("Location: ../allocations/welding_allocation.php");
            exit();
        default:
            echo "Current User ID is not set correctly.";
            exit();
    }
}