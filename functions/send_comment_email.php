<?php
    function send_comment_email($email, $comment, $commentor) {
        $to = $email;
        $subject = "Camagru Comment Notification";
        $message = $commentor.": commented ".$comment." on your image";
        $headers = "From: ayanocamagru@gmail.com \r\n";
        $headers .= "MINE-Version: 1.0"."\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8"."\r\n";

        mail($to, $subject, $message, $headers);
    }
?>