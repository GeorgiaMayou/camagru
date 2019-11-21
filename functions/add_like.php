<?php
    // session_start();
    // include ("../photos/photo.class.php");
    if (isset($_POST['like_now'])) {
        $key = $_GET['photo_key'];
        $photo = new photo();
        $photo->add_like($key);
    }
?>