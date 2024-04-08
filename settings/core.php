<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!function_exists('redirectUser')) {
    function redirectUser()
    {
        $rolePages = [
            1 => "admin_dashboard.php",
            2 => "plumbing_dashboard.php",
            3 => "electrical_dashboard.php",
            4 => "concretery_dashboard.php",
            5 => "carpentry_dashboard.php",
            6 => "roofing_dashboard.php",
            7 => "surveying_dashboard.php",
            8 => "welding_dashboard.php",
            9 => "common_dashboard.php"
        ];
    
        if (isset($_SESSION['role_ID']) && array_key_exists($_SESSION['role_ID'], $rolePages)) {
            $currentPage = basename($_SERVER['PHP_SELF']);
            $targetPage = $rolePages[$_SESSION['role_ID']];
        
            if ($currentPage !== $targetPage) {
                header("Location: ../WebFinalProject/dashboards/{$targetPage}");
                die();
            }
        } else {
            header("Location: ../WebFinalProject/logins/login_view.php?msg=You aren't being logged in");
            die();
        }
    }

function checkLogin()
    {
        if (!isset($_SESSION['user_ID'])) {
            echo $_SESSION['user_ID'];
            echo 'is set';
            // header("Location: ../WebFinalProject/logins/login_view.php?msg=Yes");
            die();
        } else {
            echo 'not set';
        }
    }
}