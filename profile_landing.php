<html>
    <head>
        <title>Camagru-ayano</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
    </head>
    <body>
        <!-- Main container starts here -->
        <div class="Main_container">
            <!-- Header of page starts here, Only contains a background image included in the stylesheet found at css/index.css-->
            <div class="Header">
            <!-- Menu bar starts here -->
            <div class="Menu_bar">
                <div class = "columns level" style ="bg-color: #FAFAFA" id="menu">
                <!-- SEARCH BAR -->    
                <div class = "column is-two-fifths leve-right" id="logo" ><a href="../index.php"><img src="../images/camagru_logo.png"></a></div>
                    <div class="field is-grouped column is-two-fifths is-centered level-item">
                        <p class="control is-expanded">
                            <input class="input" type="text" placeholder="Search">
                          </p>
                          <p class="control">
                            <a class="button is-primary">
                              Search
                            </a>
                          </p>
                    </div>   
                    <!-- WILL SHOW THE USERS NOTIFICATIONS HERE -->
                    <div class = "column is-centered level-item" id="home"><a href="../index.php"><img src="../images/home_icon.png"></a></div>
                    <!-- WILL TAKE THE USER TO ALL IMAGES -->
                    <div class = "column is-centered level-item" id="all_images"><a href="../images.php"><img src="../images/camera_icon.png"></a></div>
                    <!-- WILL SHOW THE USERS PAGE -->
                    <div class = "column is-centered" id="my_account"><a href="../profile/profile_landing.php"><img src="../images/account_icon.png"></a></div>
                </div>
            </div>
            <!-- menu_bar ends here -->
            </div>
            <!-- Header ends here -->

            <div class="Middle" style = "background-image: url('../images/polkadot_bg.png'); background-size: 10%;">
            <br />
            <!-- Profile image and name starts here -->
            <div class = "box column is-7 is-offset-one-quarter">
            <div class = "columns is-vcentered is-offset-1">
                <div class = "is-one-quarter">
                <a href="../index.php"><img src="../images/home_icon.png"></a>
                </div>
                <h1 class=" column subtitle">Username</h1>
            </div>
            </div>
            <!-- Profile image and name ends here -->
            <br />
            <!-- image 1 starts here -->
            <div class = "box column is-7 is-offset-one-quarter">
            <br />
            <h1 class="subtitle is-3 has-text-centered">image 1</h1>
            <br />
            </div>
            <!-- image 1 ends here -->
            <br />
            <!-- image 2 starts here -->
            <div class = "box column is-7 is-offset-one-quarter">
            <br />
            <h1 class="subtitle is-3 has-text-centered">image 2</h1>
            <br />
            </div>
            <!-- image 2 ends here -->
            <br />
        </div>
    </body>


    <footer style = "bg-color: #FAFAFA">
                <!-- WILL DISPLAY THE SAME IMAGE AS HEADER JUST WITH COPYRIGHT IN BOTTOM RIGHT -->
            <br />
            <div class = "columns">
                <div class="column ">
                    <p class="control level-left"><a href = "./users/sign_in.php" class="button">Sign In</a></p>
                </div>
                <div class="column ">
                    <p class="control level-right"><a href = "./users/logout.php" class="button">Sign Out</a></p>
                </div>
            </div>
    </footer>
        </div>
    </body>
</html>