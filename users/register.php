<?php
    include ("../functions/verify_email.php");
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
            <br /><br /><br /><br />
            <!-- Box starts here -->
            <div class = "box column has-text-centered is-7 is-offset-one-quarter">  
            <form action="" method="post" enctype="multipart/form-data">
            <h1 class="subtitle is-3 has-text-centered">Create Account</h1>
                <div class="field column is-10 is-offset-1">
                    <p class="is-one-quarter">
                        <input type = "text" name="user_name" class="input" placeholder="Name">
                    </p>
                </div>
                <div class="field column is-10 is-offset-1">
                    <p class="is-one-quarter">
                        <input type = "text" name="user_email" class="input" placeholder="Email">
                    </p>
                </div>
                <div class="field column is-10 is-offset-1">
                    <p class="is-one-quarter">
                        <input type = "password" name="user_pass" class="input" placeholder="Password">
                    </p>
                </div>
                <br />
                <!-- Country selector starts -->
                <div class="field ">
                    <p class="control has-text-centered">
                      <span class="select is-primary">
                        <select name="user_country">
                            <option selected>Country</option>
                            <option>America</option>
                            <option>Brazil</option>
                            <option>France</option>
                            <option>India</option>
                            <option>Japan</option>
                            <option>Mexico</option>
                            <option>Russia</option>
                            <option>South Africa</option>
                            <option>United Kingdon</option>
                        </select>
                      </span>
                      <span class="icon is-small is-left">
                        <i class="fas fa-globe"></i>
                      </span>
                    </p>
                </div>
                <!-- Country selector ends -->
                <br />
                <div class="field column is-10 is-offset-1">
                    <p class="is-one-quarter">
                        <h3>Image:</h3> 
                        <input class = " is-offset-5 has-text-centered" type="file" name="user_image" accept="image/*">
                    </p>
                </div>
                <br />
                <input type="submit" name="register" class="button is-primary" value="Register now">
            </form>
            </div>
            <br />
            <!-- Box ends here -->
            </div>
            <!-- Content ends here -->
    </body>
    <footer style = "bg-color: #FAFAFA">
    <?php include "../header/footer.html" ?>
    </footer>
</html>


<?php
    include ("../database/connect_database.php");
    include ("../functions/check_password.php");
    if (isset($_POST['register'])) {
        if (check_password($_POST['user_pass']) === 1) {
            $user_name = $_POST['user_name'];
            $user_email = $_POST['user_email'];
            // check_password($_POST['user_pass']); 
            $user_pass = hash("whirlpool", $_POST['user_pass']);
            $user_image = $_FILES['user_image']['name'];
            $user_image_tmp = base64_encode(file_get_contents($_FILES['user_image']['tmp_name']));
            $user_vkey = hash("whirlpool", time().$user_name);
            move_uploaded_file($user_image_tmp, "../user_images/$user_image");
            $check = $con->prepare("SELECT * FROM users WHERE user_email=?");
            $check->execute([$user_email]);
            $res = $check->fetch();
            if (!$res) {
                try {
                    $sql = "INSERT INTO users (user_name, user_email, user_pass, user_vkey, user_verif, user_notif, user_image)
                VALUES ('$user_name', '$user_email', '$user_pass', '$user_vkey', '0', '1', '$user_image_tmp')";
                // use exec() because no results are returned
                $con->exec($sql);
                verify_email($user_email, $user_vkey);
                echo "<script>alert('Registration Successful, Please check your email')</script>";
                echo "<script>window.open('../index.php','_self')</script>";
            } catch(PDOException $exception) {
                echo $sql . "<br>" . $exception->getMessage();
                echo "<script>alert('Registration Successful')</script>";
                echo "<script>window.open('my_account.php','_self')</script>";
            }
        } else {
            echo "<script>alert('That Email is already in use')</script>";
            echo "<script>window.open('my_account.php','_self')</script>";
        }
    }
    $con = null;
}
?> 