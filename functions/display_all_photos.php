<?php
        function display_all_photos() {
            include ("./database/connect_database.php");
            try {
                $all_photos = "SELECT * FROM photos ORDER BY photo_id DESC";
                $get_all_photos = $con->prepare($all_photos);
                $get_all_photos->execute();
                $data = $get_all_photos->fetchAll(PDO::FETCH_ASSOC);
                if ($data) {
                    foreach ($data as $image) {
                       echo "<div class = 'box column is-7 is-offset-one-quarter'>
                        <br />
                           <h1 class='subtitle is-3 has-text-centered'>
                               <a href='./photos/photo_ops.php?photo_key=".$image['photo_key']."'><img src=data:image/png;base64,".$image['photo_upload']."></a>
                           </h1>
                        <br />
                        </div>";
                    }
                }
            } catch (PDOException $exception) {
                echo $all_photos."<br>".$exception;
            }
        }
?>