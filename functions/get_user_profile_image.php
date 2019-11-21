<?php
    function get_user_profile_image() {
        session_start();
        include ("../database/connect_database.php");
        $user_id = $_SESSION['user_id'];
        $user_name = $_SESSION['user_name'];
        try {
            $get_img = "SELECT * FROM users WHERE user_id='$user_id'";
            $check_get_img = $con->prepare($get_img);
            $check_get_img->execute();
            $res = $check_get_img->fetch();
            //print_r ($res);
            if (!empty ($res['user_image'])) {
                $image = $res['user_image'];
                // echo ("<br>");
                // echo ("<img src=../user_images/$image");
                echo '<img src="data:image/png;base64,'.$image.'"/>';
            } else {
                echo ("<img src=../images/account_icon.png");
            }
        } catch (PDOException $exception) {
            echo "$get_img.'<br>'.$exception";
        }
    }
?>