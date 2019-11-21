<?php
    session_start();
    include ("../database/connect_database.php");
    include ("../functions/check_photo_key.php");
    include ("./photo.class.php");
    include ("../functions/get_user_profile_image.php");
    include ("../functions/get_user_name.php");
    include ("../functions/add_comment.php");
    include ("../functions/add_like.php");
    include ("../functions/get_commentor_image.php");
    include ("../functions/display_comments.php");
    include ("../functions/delete_photo.php");
    include ("../functions/download_photo.php");

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
                  <form action="" method="post">
                    <button name="delete_photo" class="delete"></button>
                  </form>  
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
                <div class = "columns level is-flex-mobile" style ="margin-top:10px;">
                <form method="post" action="">
                  <div class = "column is-level is-2 is-left">
                  <?php if (!empty($_SESSION['user_name'])):?>  
                  <input type="submit" name="like_now" value= "like" class = "button is-level is-primary is-rounded has-text-centered is-pulled-left"/>
                  <?php endif;?>
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
                    <form action="" method="post">
                      <div class="column media-right is-right">
                        <button name="dl_photo" class = "button is-rounded is-small is-pulled-right">download</button>
                      </div>
                    </form>  
                  </div>
                  <?php if (!empty($_SESSION['user_name'])):?> 
                    <form method="post" action="">
                  <div class="field is-grouped column level-item" style = "margin-top: 15px;">
                      <p class="control is-expanded">
                        <input class="input" type="text" placeholder="Comment here" name="user_comment"/>
                      </p>
                      <p class="control">
                        <input type=submit class="button is-primary" value="Add Comment" name="comment_now"/>
                        <!-- </a> -->
                      </p>
                    </div>
                  </form>
                  <?php endif;?> 
                        </div>
                    <!-- Comment starts here -->
                    <?php $key = $_GET['photo_key']; display_comments($key); ?>
                <!-- Comment ends here -->
</body>
<footer style = "bg-color: #FAFAFA">
<?php include "../header/footer.html" ?>
</footer>
</div>
</body>
</html>