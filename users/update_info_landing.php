<?php 
    session_start();
    include ("./update_user.php");
?>
<html>
    <head>
        <title>Camagru</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
    </head>
    <body class = "has-navbar-fixed-top has-navbar-fixed-bottom">
        <!-- Main container starts here -->
        <div class="Main_container">
        <?php include "../header/header.html" ?>
                <div class="Middle" style = "background-image: url('../images/polkadot_bg.png'); background-size: 10%; min-height: 100vh; background-attachment:fixed">
                <!--  Update Email goes here  -->
                <form action="" method="post" enctype="multipart/form-data">
                <br /><br /><br /><br />
                <div class = "box column has-text-centered is-7 is-offset-one-quarter">
                    <br />
                    <h1 class="subtitle is-3 has-text-centered"> Update Email</h1>
                    <div class="field column is-10 is-offset-1">
                        <p class="is-one-quarter control has-icons-left has-icons-right">
                            <input type = "text" name="new_email" class="input" placeholder="New Email">
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
                            <input type = "text" class="input"  name="confirm_new_email" placeholder="Confirm New Email">
                            <span class="icon is-small is-left">
                                <i class="fas fa-lock"></i>
                            </span>
                        </p>
                    </div>
                    <div class="field column">
                        <p class="control has-text-centered">
                            <button type ="submit" name="Update_email" class="button is-primary is-outlined">Update now</button>
                        </p>
                    </div>
                <!--  Update Email ends here  -->
               
                <!--  Update Username starts here  -->
                <br />
                <h1 class="subtitle is-3 has-text-centered"> Update Username</h1>
                <div class="field column is-10 is-offset-1">
                    <p class="is-one-quarter control has-icons-left has-icons-right">
                        <input type = "text" name="new_username" class="input" placeholder="New Username"/>
                        <span class="icon is-small is-left">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <span class="icon is-small is-right">
                            <i class="fas fa-check"></i>
                        </span>
                    </p>
                </div>
                <div div class="field column is-10 is-offset-1">
                    <p class="is-one-quarter control has-icons-left has-icons-right">
                        <input type = "text" class="input"  name="confirm_new_username" placeholder="Confirm Username"/>
                        <span class="icon is-small is-left">
                            <i class="fas fa-lock"></i>
                        </span>
                    </p>
                </div>
                <div class="field column">
                    <p class="control has-text-centered">
                        <button type ="submit" name="Update_username" class="button is-primary is-outlined">Update now</button>
                    </p>
                </div>
                <!--  Update Username ends here  -->

                 <!--  Update Photo starts here  -->
                 <br />
                <div class="field column">
                    <p class="is-one-quarter">
                        <h3>Update Image:</h3> 
                        <br />
                        <input class = "button is-offset-5 has-text-centered" type="file" name="new_image" accept="image/*">
                    </p>
                </div>
                <div class="field column">
                    <p class="control has-text-centered">
                        <button type ="submit" name="Update_image" class="button is-primary is-outlined">Update now</button>
                    </p>
                </div>
                <br />
                <!--  Update Photo ends here  -->

                <!--  Update Password starts here  -->
                <div class="field column">
                    <p class="control  has-text-centered">
                        <a href="../functions/send_update_pass.php" name="Update_password" class="button is-primary is-outlined is-center">Update Password</a>
                    </p>
                    <br />
                </div>
                <!--  Update Password ends here  -->

                <!--  Update Notifications starts here  -->
                <div class = "columns  is-flex-mobile">
                    <h1 class=" column subtitle is-5 has-text-centered level-item is-offset-1">Notifications:</h1>
                    <!-- <form method="post" action=""> -->
                        
                        <div class="field column is-3">
                            <p class="control ">
                                <input type ="submit" name="notif_yes" value="Yes" class=" button is-primary">
                            </p>
                        </div>
                        <div class="field column is-3">
                            <p class="control">
                                <input type ="submit" name="notif_no" value="No" class="button is-danger">
                            </p>
                        </div>
                        <!-- </form> -->
                    </div >
                </form> 
                <!--  Update Notifications ends here  -->
                
            </div>
            <br />
        </div>
    </div>
</body>
<footer style = "bg-color: #FAFAFA">
<?php include "../header/footer.html" ?>
</footer>
</div>
</body>
</html>

