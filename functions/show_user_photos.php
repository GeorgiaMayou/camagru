<?php
    function show_user_photos() {
        session_start();
        if (empty($_SESSION['user_name']) || empty($_SESSION['user_id'])) {
            echo "<script>alert('Unexpected Error')</script>";
            echo "<script>window.open('../users/my_account.php','_self')</script>";
        }
        $user = new photo();
        $user->get_user_photos();
    }
?>