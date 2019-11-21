<?php
// echo "<script>alert('HERE!')</script>";
    session_start();
    if (isset($_POST['delete_comment'])) {
        if ($_SESSION['user_id'] == "") {
            echo "<script>alert('Why dont you just leave?!')</script>";
            echo "<script>window.open('../index.php','_self')</script>";
        } else {
            include ("../database/connect_database.php");
            $key = $_GET['photo_key'];
            $comment_id = $_POST['comment_id'];
            $get_comment_info = "SELECT * FROM comments WHERE photo_comment_id='$comment_id'";
            $run_get_comment_info = $con->prepare($get_comment_info);
            $run_get_comment_info->execute();
            $comment_info = $run_get_comment_info->fetch();
            $get_photo_info = "SELECT * FROM photos WHERE photo_key='$key'";
            $run_get_photo_info = $con->prepare($get_photo_info);
            $run_get_photo_info->execute();
            $photo_info = $run_get_photo_info->fetch();
            if ($_SESSION['user_id'] === $comment_info['photo_comment_user'] || $_SESSION['user_id'] === $comment_info['photo_user_id']) {
                $delete = "DELETE FROM comments WHERE photo_comment_id='$comment_id'";
                $run_delete = $con->prepare($delete);
                $run_delete->execute();
                echo "<script>alert('deleted BANG!')</script>";
                echo "<script>window.open('../index.php','_self')</script>";
            } else {
                echo "<script>alert('Why dont you just leave?!')</script>";
                echo "<script>window.open('../index.php','_self')</script>";
            }
        }
    }

?>