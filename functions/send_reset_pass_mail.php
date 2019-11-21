<?php
    // include ("../database/connect_database.php");

    function send_reset_pass_mail($email, $verif_key) {
        echo($verif_key);
        $to = $email;
        $subject = "Camagru Password Reset";
        $message = "<a href='http://localhost:8080/camagru/functions/update_pass.php?verif_key=$verif_key'>Click Here to reset password now</a>";
        $headers = "From: ayanocamagru@gmail.com \r\n";
        $headers .= "MINE-Version: 1.0"."\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8"."\r\n";

        mail($to, $subject, $message, $headers);
        echo "YES";
        // header('location:thankyou.php');
    }
    // $con = null;
?>