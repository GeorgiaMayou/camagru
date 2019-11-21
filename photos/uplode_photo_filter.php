<?php
    session_start();
    include ("../database/connect_database.php");
    if (isset($_POST['submit'])) {
        if (isset($_POST['image_data'])) {
            try {
                $image = $_POST['image_data'];
                $prefix = 'data:image/png;base64,';

                if (substr($image, 0, strlen($prefix)) == $prefix) {
                $image = substr($image, strlen($prefix));
                } if ($image === "uplode_photo_filter.php") {
                    echo "<script>alret('No Image')</script>";
                } else {
                    $user_id = $_SESSION['user_id'];
                    $user_name = $_SESSION['user_name'];
                    $key = hash("whirlpool", time().$user_name);
                    $uplode = "INSERT INTO photos (photo_upload, photo_user_id, photo_user_name, photo_likes, photo_key) 
                VALUES ('$image', '$user_id', '$user_name', '0', '$key')";
                $try_run_uplode = $con->prepare($uplode);
                $try_run_uplode->execute();
                echo "<script>alert('Upload Successful')</script>";
                echo "<script>window.open('../users/my_account.php','_self')</script>";
            }
            } catch (PDOException $e) {
                echo $uplode."<br>".$e;
            }
        } else {
            echo "<script>alert('Please take a photo')</script>";
            echo "<script>window.open('../users/my_account.php','_self')</script>";
        }
    }


?>