<?php
    session_start();
    Class photo {
        public $user_id;
        public $user_name;
        
        public function __construct() {
            $this->user_id = $_SESSION['user_id'];
            $this->user_name = $_SESSION['user_name'];
        }

        public function upload_image($image) {
            include ("../database/connect_database.php");
            $photo_key = hash("whirlpool", time().$this->user_id);
            try {
                $add_photo = "INSERT INTO photos (photo_upload, photo_user_id, photo_user_name, photo_likes, photo_key) 
                VALUES ('$image', '$this->user_id', '$this->user_name', '0', '$photo_key')";
                $check_upload = $con->prepare($add_photo);
                $check_upload->execute();
                echo "<script>alert('Upload Successful')</script>";
                echo "<script>window.open('../users/my_account.php','_self')</script>";
            } catch (PDOException $exception) {
                echo $add_photo."<br>".$exception;
            }
        }

        public function get_user_photos() {
            include ("../database/connect_database.php");
            try {
                $all_photos = $con->query("SELECT * FROM photos WHERE photo_user_id='$this->user_id' ORDER BY `photo_id` DESC");
                $data = $all_photos->fetchAll(PDO::FETCH_ASSOC);
                if ($data) {
                    foreach ($data as $image) {
                       echo "<div class = 'box column is-7 is-offset-one-quarter'>
                        <br />
                           <h1 class='subtitle is-3 has-text-centered'>
                               <a href='../photos/photo_ops.php?photo_key=".$image['photo_key']."'><img src=data:image/png;base64,".$image['photo_upload']."></a>
                           </h1>
                        <br />
                        </div>";
                    }
                }
            } catch (PDOException $exception) {
                echo $all_photos."<br>".$exception;
            }
        }

        public function get_photo_likes($key) {
            include ("../database/connect_database.php");
            try {
                $get_likes = "SELECT 1 FROM photos WHERE photo_key='$key";
                $run_get_likes = $con->prepare($get_likes);
                $run_get_likes->execute();
                $ret = $run_get_likes->fetch();
                echo $ret['photo_likes'];
            } catch (PDOException $exception) {
                echo $get_likes."<br>".$exception;
            }
        }

        public function get_photo($key) {
            include ("../database/connect_database.php");
            try {
                $get_photo = "SELECT * FROM photos WHERE photo_key='$key'";
                $run_get_photo = $con->prepare($get_photo);
                $run_get_photo->execute();
                $ret = $run_get_photo->fetch();
                if (!empty($ret['photo_upload'])) {
                    echo "<img src=data:image/png;base64,".$ret['photo_upload'];
                }
            } catch (PDOException $exception) {
                echo $get_photo."<br>".$exception;
            }
        }

        public function add_comment($key, $comment /* MIGHT NEED MORE INPUT */) {
            include ("../database/connect_database.php");
            include ("../functions/send_comment_email.php");
            try {
                $get_photo_info = $con->query("SELECT * FROM photos WHERE photo_key='$key'");
                $photo_data = $get_photo_info->fetch(PDO::FETCH_ASSOC);
                $photo_id = $photo_data['photo_id'];
                $owner_id = $photo_data['photo_user_id'];
                $commentor_id = $this->user_id;
                // now to add the comment to the comment table.
                try {
                    $add_comment = "INSERT INTO comments (photo_id, photo_user, photo_comment, photo_comment_user)
                    VALUES ('$photo_id', '$owner_id', '$comment', '$commentor_id')";
                    $run_add_comment = $con->prepare($add_comment);
                    $run_add_comment->execute();
                    try {
                        $notif = "SELECT * FROM users WHERE user_id='$owner_id'";
                        $run_notif = $con->prepare($notif);
                        $run_notif->execute();
                        $check = $run_notif->fetch();
                        $to = $check['user_email'];
                        if ($check['user_notif'] == 1) {
                            send_comment_email($to, $comment, $this->user_name);
                        }
                    } catch (PDOException $exec) {
                        echo $notif."<br>".$exc;
                    }
                    // NEED TO SEND EMAIL NOTIFICATIONS IF THE USER IS NOT OPTED OUT.
                    echo "<script>alert('Comment added successfully')</script>";
                    echo "<script>window.open('./photo_ops.php?photo_key=$key','_self')</script>";
                } catch (PDOException $exception) {
                    echo $add_comment."<br>".$exception;        
                }
            } catch (PDOException $e) {
                echo $get_photo_info."<br>".$e;
            }   
        }

        public function get_likes($key) {
            include ("../database/connect_database.php");
            try {
                $get_likes = "SELECT * FROM photos WHERE photo_key='$key'";
                $run_get_likes = $con->prepare($get_likes);
                $run_get_likes->execute();
                $data = $run_get_likes->fetch();
                $likes = $data['photo_likes'];
                echo $likes." likes";
            } catch (PDOException $e) {
                echo $get_likes."<br>".$e;
            }
        }

        public function add_like($key) {
            include ("../database/connect_database.php");
            try {
                $add_like = "SELECT * FROM photos WHERE photo_key='$key'";
                $run_add_likes = $con->prepare($add_like);
                $run_add_likes->execute();
                $data = $run_add_likes->fetch();
                $old_likes = $data['photo_likes'];
                $new_likes = $old_likes + 1;
                try {
                    $update_likes = "UPDATE photos SET photo_likes='$new_likes' WHERE photo_key='$key'";
                    $run_update_likes = $con->prepare($update_likes);
                    $run_update_likes->execute();
                    // echo "<script>alert('Like added successfully')</script>";
                } catch (PDOException $exec) {
                    echo $add_like."<br>".$exec;
                }
            } catch (PDOException $e) {
                echo $add_like."<br>".$e;
            }
        }
        // MIGHT NOT BE USED.
        public function MAYBE_get_commentor_image($key) {
            include ("../database/connect_database.php");
            try {   
                $get_photo_data = "SELECT * FROM photos WHERE photo_key='$key'";
                $run_get_photo_data = $con->prepare($get_photo_data);
                $run_get_photo_data->execute();
                $data = $run_get_photo_data->fetch();
                $photo_id = $data['photo_id'];
                try {
                    $get_user_data = "SELECT * FROM comments where photo_id='$photo_id'";
                    $run_get_user_data = $con->prepare($get_user_data);
                    $run_get_user_data->execute();
                    $ret = $run_get_user_data->fetch();
                    $commentor_here = $ret['photo_comment_user'];
                    $comment = $ret['photo_comment']; /* THIS IS JUST THE ID OF THE USE WHO COMMENTED WILL BE USED LATER*/
                    try {
                        $get_user = "SELECT * FROM users WHERE user_id='$commentor_here'";
                        $run_get_user = $con->prepare($get_user);
                        $run_get_user->execute();
                        $res = $run_get_user->fetch();
                        echo "<img src=data:image/png;base64,".$res['user_image'];
                    } catch (PDOException $exc) {
                        echo $get_user."<br>".$ec;
                    }
                } catch (PDOException $ex) {
                    echo $get_user_data."<br>".$ex;
                }
            } catch (PDOException $e) {
                echo $get_photo_data."<br>".$e;
            }


        }
    }
?>