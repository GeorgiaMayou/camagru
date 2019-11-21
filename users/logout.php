<html>
    <head>
        <title>Camagru-ayano</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
    </head>
    <body class = "has-navbar-fixed-top has-navbar-fixed-bottom">
        <!-- Main container starts here -->
        <div class="Main_container">
        <?php include "./header.html" ?>
            <div class="Middle" style = "background-image: url('../images/polkadot_bg.png'); background-size: 10%; min-height: 100vh; background-attachment:fixed">
                <br /><br /><br /><br />
            <!-- box starts here -->
            <div class = "box column is-7 is-offset-one-quarter">
            <br />
            <h1 class="subtitle is-3 has-text-centered">You are now logged out!</h1>
            <br />
            <div class="column">
                <p class="control has-text-centered">
                <a href = "../sign_in.php" class="button is-primary">Go to sign in page</a>
                </p>
            </div>
            </div>
            <!-- box ends here -->\
            <br />
        </div>
    </body>


            <div class="Footer" class = "has-background-light">
            <?php include "../header/footer.html" ?>
            </div>
        </div>
    </body>
</html>


<?php
    session_start();
    session_destroy();
    echo "<script>alert('Logout Successful')</script>";
    echo "<script>window.open('../index.php','_self')</script>";
?>