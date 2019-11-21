<?php
    // sesion_start();
    function display_comments($key) {
        include ("../database/connect_database.php");
        include ("./get_commentor_image.php");
        include ("../functions/get_commentor_name.php");
        include ("../functions/get_comment.php");
        include ("../functions/set_id.php");
        include ("../functions/delete_comment.php");
        $get_photo_id = "SELECT * FROM photos WHERE photo_key='$key'";
        $run_get_photo_id = $con->prepare($get_photo_id);
        $run_get_photo_id->execute();
        $photo_id_arr = $run_get_photo_id->fetch();
        $photo_id = $photo_id_arr['photo_id'];
        
        $find_comments = "SELECT * FROM comments WHERE photo_id='$photo_id'";
        $run_find_comments = $con->prepare($find_comments);
        $run_find_comments->execute();
        $comments = $run_find_comments->fetchAll();
        // print_r ($comments);
        
        foreach ($comments as $current) {
            echo "
            <div class = 'box column is-7 is-offset-one-quarter'>
                <div class = 'tile is-flex-mobile is-ancestor is-offset-1'>
                    <div class = 'tile is-parent is-2'>
                        <div class = 'tile is-child'>
                            <figure class='image is-64x64'>".get_commentor_image($current['photo_comment_id'])."</figure>  
                        </div>
                    </div>
                    <div class='tile is-parent is-vertical'>
                        <p><strong>".get_commentor_name($current['photo_comment_id'])."</strong></p>
                        <div class='tile is-child'>
                            <p>".get_comment($current['photo_comment_id'])."</strong></p>
                        </div>
                    </div>
                    <div class = 'tile is-parent'>
                        <div class=' tile is-child'>
                            <form action='' method='post'>
                                <input type='hidden' id='comment_id' name='comment_id' value='".$current['photo_comment_id']."'>
                                <button name='delete_comment' class='delete is-pulled-right'></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>";
        }
    }

?>