<?php
    session_start();
    function get_commentor_name($comment_id) {
        include ("../database/connect_database.php");
        try {
            $get_user_id = "SELECT * FROM comments WHERE photo_comment_id='$comment_id'";
            $run_get_user_id = $con->prepare($get_user_id);
            $run_get_user_id->execute();
            $get_user_id_arr = $run_get_user_id->fetch();
            $user_id = $get_user_id_arr['photo_comment_user'];
            try {
                $get_user_name = "SELECT * FROM users WHERE user_id='$user_id'";
                $run_get_user_name = $con->prepare($get_user_name);
                $run_get_user_name->execute();
                $user_data = $run_get_user_name->fetch();
                return $user_data['user_name'];
            } catch (PDOException $exc) {
                echo $get_user_id."<br>".$exc;
            }
        } catch (PDOException $exception) {
            echo $get_user_id."<br>".$exception;
        }
    }
?>