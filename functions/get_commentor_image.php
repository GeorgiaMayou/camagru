<?php
    session_start();
    function get_commentor_image($comment_id) {
        include ("../database/connect_database.php");
        try {
            $get_user_id = "SELECT * FROM comments WHERE photo_comment_id='$comment_id'";
            $run_get_user_id = $con->prepare($get_user_id);
            $run_get_user_id->execute();
            $get_user_id_arr = $run_get_user_id->fetch();
            $user_id = $get_user_id_arr['photo_comment_user'];
            try {
                $get_user_photo = "SELECT * FROM users WHERE user_id='$user_id'";
                $run_get_user_photo = $con->prepare($get_user_photo);
                $run_get_user_photo->execute();
                $user_data = $run_get_user_photo->fetch();
                if (empty($user_data['user_image'])) {
                    $photo = base64_encode(file_get_contents("../images/account_icon.png"));
                    return "<img class='image is-64x64' src=data:image/png;base64,".$photo.">";;
                }
                return "<img class='image is-64x64' src=data:image/png;base64,".$user_data['user_image'].">";
            } catch (PDOException $exc) {
                echo $get_user_id."<br>".$exc;
            }
        } catch (PDOException $exception) {
            echo $get_user_id."<br>".$exception;
        }
    }
?>