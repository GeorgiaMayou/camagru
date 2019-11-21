<?php
    session_start();
    include ("../functions/get_user_profile_image.php");
    include ("../functions/get_user_name.php");
    include ("../functions/upload_photo.php");
    include ("../functions/show_user_photos.php");
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
            <!-- Profile image and name starts here -->
            <div class = "box column is-7 is-offset-one-quarter has-text-centered">
            <div class = "">
                <figure class = "image" >
                <img class = "is-rounded" <?php get_user_profile_image()?> 
                <!-- Hello. leave me alone.  -->
                </figure>
                <br />
                <h1 class="subtitle is-2"><?php get_user_name()?></h1>
            </div>
            </div>
            <!-- Profile image and name ends here -->
            <br />
            <!-- Upload image starts here -->
            <form action="../functions/upload_photo.php" method="post" enctype="multipart/form-data">
            <div class = "box column is-7 is-offset-one-quarter has-text-centered">
                <div class="field column is-10 is-offset-1">
                    <p class="is-one-quarter">
                        <h3>Upload new image:</h3> 
                        <br />
                        <input class = " is-offset-5 has-text-centered" type="file" name="new_upload" accept="image/*">
                    </p>
                </div>
                    <div class="field column">
                        <p class="control has-text-centered">
                            <input type="submit" name="upload_now" class="button is-primary is-outlined" value="Upload now"/>
                            <!-- <button type ="file" name="upload_now" class="button is-primary is-outlined">Upload now</button> -->
                        </p>
                    </div>
                </div>
            </form>
            <!-- Upload image ends here -->
                <br /> 
            <br />
            <?php show_user_photos(); ?>
            <!-- image 1 starts here -->
            <!-- <div class = "box column is-7 is-offset-one-quarter">
            <br />
            <h1 class="subtitle is-3 has-text-centered"><?php // show_user_photos(); ?></h1>
            <br />
            </div>  -->
            <!-- image 1 ends here -->
            <br />
        </div>
    </body>


    <footer style = "bg-color: #FAFAFA">
    <?php include "../header/footer.html" ?>
    </footer>
        </div>
    </body>
</html>                  