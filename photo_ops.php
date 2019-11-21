<?php
    session_start();
    include ("../database/connect_database.php");
    include ("../functions/check_photo_key.php");
    include ("../photos/photo.class.php");
    include ("../functions/get_user_profile_image.php");
    include ("../functions/get_user_name.php");
    include ("../functions/add_comment.php");
    include ("../functions/add_like.php");
    include ("../functions/get_commentor_image.php");
    include ("../functions/display_comments.php");

    if (empty($_GET['photo_key']) || !check_photo_key($_GET['photo_key'])) {
        echo "<script>alert('Unexpected Error')</script>";
        echo "<script>window.open('../users/my_account.php','_self')</script>";
    } else {
        // will display nb likes.
        // will display comments.
        // will have a like button.
        // will have a remove comment if user logged in is looking at own picture.
        // will also have a remove image button.

        // all is todo when we have the layout of the page.
    }
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
        <div class="Middle" style = "background-image: url('../images/polkadot_bg.png'); min-height: 100vh; background-size: 10%; background-attachment:fixed">
        <br /><br /><br /><br />
            <div class = "box column has-text-centered is-7 is-offset-one-quarter">
                <br />
                <div class="media-right level-right">
                    <button class="delete"></button>
                </div>
                <br />
                <h1> 
                  <?php
                    $key = $_GET['photo_key'];
                    $user = new photo();
                    $user->get_photo($key);
                  ?> 
                </h1>
                <br />
                <!-- Likes and download bar starts here -->
                <div class = "columns level" style ="margin-top:10px;">
                <form method="post" action="">
                  <div class = "column is-level is-2 is-left">
                    <input type="submit" name="like_now" value= "like" class = "button is-level is-primary is-rounded has-text-centered is-pulled-left"/>
                  </div>
                </form>
                  <div class = "column is-left">
                        <h3 class = "is-pulled-left">
                        <?php
                          $key = $_GET['photo_key'];  
                          $likes = new photo();
                          $likes->get_likes($key);
                        ?>
                        </h3>
                    </div>
                    <div class="column media-right is-right">
                        <button class = "button is-rounded is-small is-pulled-right">download</button>
                    </div>
                </div>
                <!-- Likes and download bar ends here -->
                <div class="field is-grouped column level-item" style = "margin-top: 15px;">
                        <p class="control is-expanded">
                            <input class="input" type="text" placeholder="Comment here">
                          </p>
                          <p class="control">
                            <a class="button is-primary">
                              Add
                            </a>
                          </p>
                    </div>
                        </div>
                    <!-- Comment starts here -->
                    <div class = "box column has-text-centered is-7 is-offset-one-quarter">
                    <div class = "tile is-ancestor is-offset-1">
                      <div class = "tile is-parent is-1">
                        <div class=" tile is-child">
                          <figure class=" is-pulled-right image is-64x64">
                            <?php
                        get_user_profile_image();
                        // NEED TO CHANGE TO GET COMMENTER PROFILE IMAGE.
                        ?>
                      </figure>
                    </div>
                  </div>
                  <div class="tile is-parent is-vertical">
                    <p><strong><?php get_user_name();  ?></strong></p>
                    <div class="tile is-child">
                      <p>comment</p>
                    </div>
                  </div>
                  <div class = "tile is-parent">
                    <div class=" tile is-child">
                      <button class="delete is-pulled-right"></button>
                    </div>
                  </div>
                </div>
              </div>
                <!-- Comment ends here -->



</body>
<footer style = "bg-color: #FAFAFA">
<?php include "../header/footer.html" ?>
</footer>
</div>
</body>
</html>