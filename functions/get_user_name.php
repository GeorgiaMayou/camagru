<?php

echo ("HERE");
    function get_user_name() {
        session_start();
        include ("../database/connect_database.php");
        $user_id = $_SESSION['user_id'];
        try {
            $get_user_name = "SELECT * FROM users WHERE user_id='$user_id'";
            $check_user_name = $con->prepare($get_user_name);
            $check_user_name->execute();
            $res = $check_user_name->fetch();
            if (!empty ($res['user_name'])) {
                echo ($res['user_name']);
            } else {
                echo ("<script>alert('Something Went Wrong')</script>");
                echo ("<script>window.open('../index.php','_self')</script>");
            }
        } catch (PDOException $exception) {
            echo $get_user_name."<br>".$exception->getMessage();
        }
    }
?>