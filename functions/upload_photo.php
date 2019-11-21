<?php
    session_start();
    include ("../photos/photo.class.php");
    if (isset($_POST['upload_now'])) {
        if (empty($_FILES['new_upload']['tmp_name']) || empty($_FILES['new_upload']['name'])) {
            echo "<script>alert('Please fill out necessary fileds')</script>";
            echo "<script>window.open('../users/my_account.php','_self')</script>"; 
        }
        $image = base64_encode(file_get_contents($_FILES['new_upload']['tmp_name']));
        $photo = new photo();
        $photo->upload_image($image);
        // echo "<script>window.open('../users/my_account.php','_self')</script>";
    }
?>