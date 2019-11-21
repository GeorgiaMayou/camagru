<?php
    session_start();
    // include ("../photos/videos.js");
    include ("./uplode_photo_filter.php");
    include ("../functions/show_images.php");
    // include ("../functions/edit_upload_image.php");
?>

<html>
    <head>
        <title>Camagru</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
    </head>
    <body class="has-navbar-fixed-top has-navbar-fixed-bottom">
    <?php include "../header/header.html" ?>
    <div class="Middle" style = "background-image: url('../images/polkadot_bg.png'); min-height: 100vh; background-size: 10%; background-attachment:fixed">
        <br /><br /><br /><br />  
    <div class = "box column has-text-centered is-10 is-offset-1">
        <h3 class = "subtitle">Live Image</h3> 
        <video id="video" width="400" height="300" autoplay></video>
        <br/>
        <button class = "button is-rounded is-small" id="snap">Take Photo</button><br>
        <input type="file" id="inp" accept="image/*"><br>
        <br/>
        <h3 class = "subtitle">Current Image</h3>
        <canvas id="canvas" width="400" height="300"></canvas>
        <form method="post" action="">
          <input name="image_data" id="image_data" type="hidden" value="uplode_photo_filter.php">
          <button class = "button is-rounded is-small" type="submit" name="submit" id="submitphoto">Submit Photo</button>
        </form>
    </div>
    <br >
    <!-- YOU CAN STYLE THE PAGE HOWEVER YOU WANT JUST DONT CHANGE CLASS OR ID PLS -->
    <div class = "box column has-text-centered is-10 is-offset-1">
        <img class="filter" src="http://localhost:8080/camagru/filter_images/1.png" height="125" width="125">
        <img class="filter" src="http://localhost:8080/camagru/filter_images/2.png" height="125" width="125">
        <img class="filter" src="http://localhost:8080/camagru/filter_images/3.png" height="125" width="125">
        <img class="filter" src="http://localhost:8080/camagru/filter_images/4.png" height="125" width="125">
        <img class="filter" src="http://localhost:8080/camagru/filter_images/5.png" height="150" width="150">
        <img class="filter" src="http://localhost:8080/camagru/filter_images/6.png" height="150" width="150">
    </div>
    <div class = "box column has-text-centered is-10 is-offset-1">
        <?php show_images(); ?>
    </div>
    <div class="flex-container">
    <script src="./edit.js"></script>
    <script src="./video.js"></script>
    </body>
    <footer style = "bg-color: #FAFAFA">
                <!-- WILL DISPLAY THE SAME IMAGE AS HEADER JUST WITH COPYRIGHT IN BOTTOM RIGHT -->
                <?php include "../header/footer.html" ?>
    </footer>
        </div>
    </body>
</html>