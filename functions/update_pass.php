<?php
    // not sure we need a session here.
    // will just take you to index page after a notif pops up
    // telling you to check your email. 
    include ("../database/connect_database.php");
    session_start();
    ?>

<html>
    <head>
        <title>Camagru-ayano</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
    </head>
    <body>
        <!-- Main container starts here -->
        <div class="Main_container">
        <?php include "../header/header.html" ?>
                
                <div class="Middle" style = "background-image: url('../images/polkadot_bg.png'); background-size: 10%;">
                <form action="" method="post" enctype="multipart/form-data">
                
                <!--  Update Password starts here  -->
                <br />
                <div class = "box column has-text-centered is-7 is-offset-one-quarter">
                    <br />
                    <h1 class="subtitle is-3 has-text-centered"> Update Password</h1>
                    <div class="field column is-10 is-offset-1">
                        <p class="is-one-quarter control has-icons-left has-icons-right">
                            <input type = "password" name="old_pass" class="input" placeholder="Old Password">
                            <span class="icon is-small is-left">
                                <i class="fas fa-envelope"></i>
                            </span>
                            <span class="icon is-small is-right">
                                <i class="fas fa-check"></i>
                            </span>
                        </p>
                    </div>
                    <div class="field">
                        <p class="control has-icons-left column is-10 is-offset-1">
                            <input type = "password" class="input"  name="new_pass" placeholder="New Password">
                            <span class="icon is-small is-left">
                                <i class="fas fa-lock"></i>
                            </span>
                        </p>
                    </div>
                    <div class="field">
                        <p class="control has-icons-left column is-10 is-offset-1">
                            <input type = "password" class="input"  name="confirm_new_pass" placeholder="Confirm New Password">
                            <span class="icon is-small is-left">
                                <i class="fas fa-lock"></i>
                            </span>
                        </p>
                    </div>
                    <div class="field column">
                        <p class="control  has-text-centered">
                            <input type ="submit" name="Update_pwd" class="button is-primary is-outlined is-center" value="Update now">
                        </p>
                        <br />
                    </div>
                    <!--  Update Password ends here  -->
                </form> 
            </div>
            <!--  Box ends here  -->
            <br />
        </div>
    </div>
</div>
<div class="Footer" class = "has-background-light">
    <!-- WILL DISPLAY THE SAME IMAGE AS HEADER JUST WITH COPYRIGHT IN BOTTOM RIGHT -->
</div>
</body>
</html>

<?php
    include ("../functions/check_update_pass_vkey.php");
    if (isset($_POST['Update_pwd'])) {
        $vkey = $_GET['verif_key'];
        if (check_update_pass_vkey($vkey) == 1) {
            echo ("here");
            include ("../users/update_user.class.php");
            if (empty($_POST['old_pass']) || empty($_POST['new_pass'])|| empty($_POST['confirm_new_pass'])) {
                echo "<script>alert('Please fill all fields')</script>";
            }
            if ($_POST['new_pass'] != $_POST['confirm_new_pass']) {
                echo "<script>alert('New Password fields do not match')</script>";
            }
            $our_name = $_SESSION['user_name'];
            $our_id = $_SESSION['user_id'];
            $find_vkey = "SELECT 1 FROM users WHERE user_id='$our_id' AND user_name='$our_name'";
            $check_query = $con->prepare($find_vkey);
            $check_query->execute();
            $user = new update_user();
            $user->update_pass($_POST['old_pass'], $_POST['confirm_new_pass']);
            // echo "<script>alert('Please Check your email for a verification link')</script>";
            // echo "<script>window.open('../index.php','_self')</script>";
        } else {
            echo "<script>alert('You dont seem to have permissions')</script>";
            echo "<script>window.open('../index.php','_self')</script>";
        }
    }
?>