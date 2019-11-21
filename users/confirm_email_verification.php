<html>
    <head>
        <title>Camagru</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
    </head>
    <body class = "has-navbar-fixed-top has-navbar-fixed-bottom">
        <!-- Main container starts here -->
        <div class="Main_container">
        <?php include "../header/header.html" ?>

            <div class="Middle" style = "background-image: url('../images/polkadot_bg.png'); min-height: 100vh; background-size: 10%; background-attachment:fixed">
                <br /> <br /> <br /> <br />
            <?php if (!empty($_SESSION['user_name'])):?>
            <!-- box starts here -->
            <div class = "box column is-7 is-offset-one-quarter">
            <br />
            <h1 class="subtitle is-3 has-text-centered">Account Confirmed!</h1>
            <br />
            <div class="column">
                <p class="control has-text-centered">
                <a href = "../index.php" class="button is-primary">Back to home</a>
                </p>
            </div>
            </div>
            <!-- box ends here -->
            <?php endif;?> 
            <br />
        </div>
    </body>


    <footer style = "bg-color: #FAFAFA">
                <!-- WILL DISPLAY THE SAME IMAGE AS HEADER JUST WITH COPYRIGHT IN BOTTOM RIGHT -->
                <?php include "../header/footer.html" ?>
    </footer>
        </div>
    </body>
</html>

<?php
    include ("../database/connect_database.php");
    include ("../functions/check_vkey.php");
    
    if (isset($_GET['verif_key'])) {
        $vkey = $_GET['verif_key'];
        if (check_vkey($vkey)) {
            try {
                $update_users = "UPDATE users SET user_verif='1' WHERE user_vkey='$vkey'";
                $res = $con->prepare($update_users);
                $res->execute();
                echo "<script>alert('Successfully Confirmed')</script>";
                echo "<script>window.open('../index.php','_self')</script>";
            } catch(PDOException $exception) {
                echo $res."<br>".$exception->getMessage();
            }
        }    
    } else {
        die ("Something went wrong!");
    }
    $con = null;
?>