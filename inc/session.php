<?php
    session_start();

    $admin_id = $_SESSION['admin_id'];
    $user_id = $_SESSION['user_id'];

    if(!isset($admin_id)) {
        header('location:login.php');
    }
    else if(!isset($user_id)) {
        header('location:login.php');
    }

    

    
?>