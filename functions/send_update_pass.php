<?php
    session_start();
    include ("../database/connect_database.php");
    $my_uid = $_SESSION['user_id'];
    try {
        $get_vkey = "SELECT * FROM users WHERE user_id='$my_uid'";
        $check_get_vkey = $con->prepare($get_vkey);
        $check_get_vkey->execute();
        $res = $check_get_vkey->fetch();
        if ($res) {
            include ("./send_reset_pass_mail.php");
            $vkey = $res['user_vkey'];
            $email = $res['user_email'];
            echo ("here");
            send_reset_pass_mail($email, $vkey);
            echo "<script>alert('Link sent please check your email')</script>";
            echo "<script>window.open('../index.php','_self')</script>";
        }
    } catch (PDOException $exception) {
        echo $get_vkey."<br>".$exception->getMessage();
        echo "<script>alert('Unexpected error, Please try again later')</script>";
        echo "<script>window.open('../index.php','_self')</script>";
    }

?>