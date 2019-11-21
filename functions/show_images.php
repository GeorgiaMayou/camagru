<?php
    function show_images() {
        include ("../database/connect_database.php");
        try {
            $all_photos = "SELECT * FROM photos ORDER BY photo_id DESC";
            $get_all_photos = $con->prepare($all_photos);
            $get_all_photos->execute();
            $data = $get_all_photos->fetchAll();
            if ($data) {
                foreach ($data as $image) {
                   echo "<img height='125' width='125' src=data:image/png;base64,".$image['photo_upload'].">";
                }
            }
        } catch (PDOException $exception) {
            echo $all_photos."<br>".$exception;
        }
    }
?>