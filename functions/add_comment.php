<?php
    // session_start();
    // include ("../photos/photo.class.php");
    include ("../functions/js_protec.php");
    if (isset($_POST['comment_now'])) {
        if (empty($_POST['user_comment'])) {
            echo "<script>alert('Cannot post blank comments dumbass')</script>";
            echo "<script>window.open('../index.php','_self')</script>";
        }
        $key = $_GET['photo_key'];
        $comment = $_POST['user_comment'];
        $to_add = protect_js($comment);
        $photo = new photo();
        $photo->add_comment($key, $to_add);
    }
?>