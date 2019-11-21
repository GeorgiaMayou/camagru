<?php
    function check_password($pwd) {
        if (strlen($pwd) < 8) {
            echo "<script>alert('Password too short!')</script>";
            echo "<script>window.open('../users/register.php','_self')</script>";
            return (0);
        }

        if (!preg_match("#[0-9]+#", $pwd)) {
            echo "<script>alert('Password must include at least one number!')</script>";
            echo "<script>window.open('../users/register.php','_self')</script>";
            return (0);
        }

        if (!preg_match("#[a-zA-Z]+#", $pwd)) {
            echo "<script>alert('Password must include at least one letter!')</script>";
            echo "<script>window.open('../users/register.php','_self')</script>";
            return (0);
        }
        
        return (1);
    }
?>