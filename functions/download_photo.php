<?php
    // function download_photo($key) {
        // }
        
        include ("../database/connect_database.php");
        if (isset($_POST['dl_photo'])) {
        $key = $_GET['photo_key'];

        if (!file_exists("../Camagru_images") || !is_dir("../Camagru_images")) {
            mkdir("../Camagru_images");
        }
        $get_photo = "SELECT * FROM photos WHERE photo_key='$key'";
        $run_get_photo = $con->prepare($get_photo);
        $run_get_photo->execute();
        $data = $run_get_photo->fetch();
        $photo = base64_decode($data['photo_upload']);
        $id = $data['photo_id'];
        file_put_contents("../Camagru_images/$id.png", $photo);
    }
?>