<?php
    session_start();
    if (isset($_POST['delete_photo'])) {
        include ("../database/connect_database.php");
        $key = $_GET['photo_key'];
        $get_info = "SELECT * FROM photos WHERE photo_key='$key'";
        $run_get_info = $con->prepare($get_info);
        $run_get_info->execute();
        $info = $run_get_info->fetch();
        if ($_SESSION['user_id'] === $info['photo_user_id']) {
            $delete = "DELETE FROM photos WHERE photo_key='$key'";
            $run_delete = $con->prepare($delete);
            $run_delete->execute();
            echo "<script>alert('deleted BANG!')</script>";
            echo "<script>window.open('../index.php','_self')</script>";
        } else {
            echo "<script>alert('Why dont you delete your own photos?!')</script>";
            echo "<script>window.open('../index.php','_self')</script>";
        }
    }
?>