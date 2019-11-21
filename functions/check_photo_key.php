<?php
    function check_photo_key($exists) {
        include ("../database/connect_database.php");
        
        $check = $con->prepare("SELECT 1 FROM photos WHERE photo_key='$exists'");
        $check->execute();
        return ((bool)$check->fetchColumn());
    }
?>