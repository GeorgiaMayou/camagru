<?php
    session_start();

    include ("./update_user.class.php");
    if (isset($_POST['notif_yes'])) {
        $user = new update_user();
        $user->notif("1");
    }
    
    if (isset($_POST['notif_no'])) {
        $user = new update_user();
        $user->notif("0");
    }
    
    if (isset($_POST['Update_username'])) {
        include ("../functions/js_protec.php");
        if (empty($_POST['new_username']) || empty($_POST['confirm_new_username'])) {
            echo "<script>alert('Please fill out all necessary fields')</script>";
        } else {
            $to_add = protect_js($_POST['new_username']);
            $user = new update_user();
            $user->update_uname($to_add);
        }
    } 
    
    if (isset($_POST['Update_email'])) {
        if (empty($_POST['new_email']) || empty($_POST['confirm_new_email'])) {
            echo "<script>alert('Please fill out all necessary fields')</script>";
        } if ($_POST['new_email'] != $_POST['confirm_new_email']) {
            echo "<script>alert('New Email fields do not match')</script>";
        } else {
            $user = new update_user();
            $user->update_email($_POST['new_email']);
        }
    }
    
    if (isset($_POST['Update_password'])) {
        include ("../functions/update_pass.php");
    }

    if (isset($_POST['Update_image'])) {
        if (empty($_FILES['new_image']['name']) || empty($_FILES['new_image']['tmp_name'])) {
            echo "<script>alert('Please fill out all necessary fields')</script>";
        } else {
            $name = $_FILES['new_image']['name'];
            $image = base64_encode(file_get_contents($_FILES['new_image']['tmp_name']));
            $user = new update_user();
            $user->update_image($name, $image);
        }
    }
    
    $con = null;
?>