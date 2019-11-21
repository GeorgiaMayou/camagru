<?php
    session_start();
    function get_comment($comment_id) {
        include ("../database/connect_database.php");
        try {
            $get_user_id = "SELECT * FROM comments WHERE photo_comment_id='$comment_id'";
            $run_get_user_id = $con->prepare($get_user_id);
            $run_get_user_id->execute();
            $get_user_id_arr = $run_get_user_id->fetch();
            return $get_user_id_arr['photo_comment'];
        } catch (PDOException $exception) {
            echo $get_user_id."<br>".$exception;
        }
    }
?>