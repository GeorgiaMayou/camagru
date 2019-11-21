<?php
    function check_update_pass_vkey($exists) {
        include ("../database/connect_database.php");
        
        $check = $con->prepare("SELECT 1 FROM users WHERE user_verif='1' AND user_vkey=?");
        $check->execute([$exists]);
        return ((bool)$check->fetchColumn());
        echo "ME";
    }
?>