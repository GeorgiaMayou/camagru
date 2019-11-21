<?php
session_start();
    include ("../database/connect_database.php");
    if (isset($_POST['sign_in'])) {
        $check_email = $_POST['user_email'];
        $check_pass = hash("whirlpool", $_POST['user_pass']);
        $check = $con->prepare("SELECT * FROM users WHERE user_email='$check_email' AND user_pass='$check_pass' AND user_verif=1");
        $check->execute();
        $res = $check->fetch();
        if ($res) {
            // SHOULD PROBABLY MAKE A GLOBAL USER INSTANCE HERE AND THEN USE THAT UNTIL THEY LOG OUT?!
            // global $user = new user()
            $_SESSION['user_name'] = $res['user_name'];
            $_SESSION['user_id'] = $res['user_id'];
            echo "<script>alert('Login Successful')</script>";
            echo "<script>window.open('./my_account.php','_self')</script>";
        }
    }
    // print_r($_SESSION);
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
            <div class="Body_left" style = "background-image: url('../images/polkadot_bg.png'); background-size: 10%; min-height: 100vh; background-attachment:fixed">
                <!--  SIGN IN FORM GOES HERE  -->
                <br /><br /><br />
                <form action="" method="post" enctype="multipart/form-data">
                <div class = "box column is-7 is-offset-one-quarter">
                <br />
                <h1 class="subtitle is-3 has-text-centered">Sign In</h1>
                <div class="field column is-10 is-offset-1">
                    <p class="is-one-quarter control has-icons-left has-icons-right">
                        <input name="user_email" class="input" placeholder="Email">
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
                        <input type="password" class="input"  name="user_pass" placeholder="Password">
                            <span class="icon is-small is-left">
                                <i class="fas fa-lock"></i>
                            </span>
                    </p>
                </div>
                <br />
                <div class="field">
                    <p class="control has-text-centered">
                        <input type="submit" name = "sign_in" class="button is-primary" value="Sign in">
                    </p>
                </div>
                    </form>         
                <!--  SIGN IN FORM ENDS HERE  -->
                    <br />
                    <div class = columns>
                        <div class="column">
                            <p class="control"><a href = "register.php" class="button">Sign Up</a></p>
                        </div>
                        <?php if (!empty($_SESSION['user_name'])):?>
                        <div class="column">
                            <p class="control"><a href = "./update_info_landing.php" class="button">Update Info</a></p>
                        </div>
                        <?php endif;?>
                        <div class="column ">
                              <p class="control level-right"><a href = "./logout.php" class="button">Sign Out</a></p>
                        </div>
                        </div>
                    </div>
                <!--  Box ends here  -->
                <br />
        </div>
    </body>
    <footer style = "bg-color: #FAFAFA">
    
    </footer>
        </div>
    </body>
</html>