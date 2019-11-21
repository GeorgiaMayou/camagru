<?php
    session_start();
    include ("./functions/display_all_photos.php");
?>

<html>
    <head>
        <title>Camagru</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
    </head>
    <body class="has-navbar-fixed-top has-navbar-fixed-bottom">
        <div class="Main_container">
            <?php include "./header_index.html" ?>
            <div class="Middle" style = "background-image: url('./images/polkadot_bg.png'); min-height: 100vh; background-size: 10%; background-attachment:fixed">
            <br /><br /><br /><br />  
            <?php display_all_photos(); ?>
            <br />

            </div>
        </div>
    </body>
    <footer style = "bg-color: #FAFAFA">
                <?php include "./footer_index.html" ?>
    </footer>
    </body>
</html>