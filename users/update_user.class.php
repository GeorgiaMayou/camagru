<?php
    session_start();
    Class update_user {
        public $user_id;
        public $user_name;

        public function __construct() {
            $this->user_id = $_SESSION['user_id'];
            $this->user_name = $_SESSION['user_name'];
        }
        
        public function notif($switch) {
            include ("../database/connect_database.php");
            if ($switch == 0) {
                try {
                    $off = "UPDATE users SET user_notif=0 WHERE user_id='$this->user_id'";
                    $check_off = $con->prepare($off);
                    $check_off->execute();
                    echo "<script>alert('Notifications Disabled Successful')</script>";
                } catch (PDOException $exception) {
                    echo $off."<br>".$exception->getMessage();
                }
            } else {
                try {
                    $on = "UPDATE users SET user_notif=1 WHERE user_id='$this->user_id'";
                    $check_on = $con->prepare($on);
                    $check_on->execute();
                    echo "<script>alert('Notifications Enables Successful')</script>";
                } catch (PDOException $exception) {
                    echo $on."<br>".$exception->getMessage();
                }
            }
            $con = null;
        }

        public function update_pass($oldpw, $newpw) {
            include ("../database/connect_database.php");
            $oldpwhash = hash("whirlpool", $oldpw);
            $newpwhash = hash("whirlpool", $newpw);
            try {
                $verif_pw = "SELECT 1 FROM users WHERE user_pass='$oldpwhash'";
                $verifpw_check = $con->prepare($verif_pw);
                $verifpw_check->execute();
                echo ("Got this far means I found a users old passwd to change");
                try {
                    $change_pw = "UPDATE users SET user_pass='$newpwhash' WHERE user_id='$this->user_id'";
                    $check_pwchange = $con->prepare($change_pw);
                    $check_pwchange->execute();
                    echo ("<script>alert('Password Updated Successfully')</script>");
                    echo ("<script>window.open('../index.php')</script>");
                } catch (PDOException $e) {
                    echo $change_pw."<br>".$e->getMessage();
                }
            } catch (PDOException $exception) {
                echo $verif_pw."<br>".$exception->getMessage();
            }
            $con = null;
        }

        public function update_uname($new_uname) {
            include ("../database/connect_database.php");
            try {
                $update_uname = "UPDATE users SET user_name='$new_uname' WHERE user_id='$this->user_id'";
                $check_update_uname = $con->prepare($update_uname);
                $check_update_uname->execute();
                echo "<script>alert('Username Updated Successful')</script>";
                echo "<script>window.open('update_info_landing.php','_self')</script>";
            } catch (PDOException $exception) {
                echo $update_uname."<br>".$exception->getMessage();
            }
            $con = null;
        }
    
        public function update_email($new_email) {
            include ("../database/connect_database.php");
            include ("../functions/update_user_email.php");
            try {
                $new_vkey = hash("whirlpool", time().$this->user_name);
                $update_email = "UPDATE users SET user_email='$new_email', user_vkey='$new_vkey', user_verif=0 WHERE user_id='$this->user_id'";
                $check_update_email = $con->prepare($update_email);
                $check_update_email->execute();
                update_user_email($new_email, $new_vkey);
                echo "<script>alert('Success, Please Check Your email')</script>";
                echo "<script>window.open('../index.php','_self')</script>";
            } catch (PDOException $exception) {
                echo $update_uname."<br>".$exception->getMessage();
            }
            $con = null;
        }

        public function update_image($name, $raw_data) {
            include ("../database/connect_database.php");
            try {
                $update_image = "UPDATE users SET user_image='$raw_data' WHERE user_id='$this->user_id'";
                $check_update_image = $con->prepare($update_image);
                $check_update_image->execute();
                move_uploaded_file($raw_data, "../user_images/$name");
                echo "<script>alert('Image Updated')</script>";
                echo "<script>window.open('./update_info_landing.php','_self')</script>";
            } catch (PDOException $exception) {
                echo $update_image."<br>".$exception->getMessage();
            }
            $con = null;
        }
    
    }
?>