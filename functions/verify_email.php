<!-- MIGHT NOT BE USER -->

<?php
    include ("../database/connect_database.php");

    function verify_email($email, $verif_key) {
        echo($verif_key);
        $to = $email;
        $subject = "Camagru Email Verification";
        $message = "<a href='http://localhost:8080/camagru/users/confirm_email_verification.php?verif_key=$verif_key'>Confirm Email Now</a>";
        $headers = "From: ayanocamagru@gmail.com \r\n";
        $headers .= "MINE-Version: 1.0"."\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8"."\r\n";

        mail($to, $subject, $message, $headers);
        echo "YES";
        // header('location:thankyou.php');
    }
    $con = null;
?>