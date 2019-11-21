<?php

$servername = "localhost";
$username = "root";
$password = "Mayou12";
$dbname = "camagru";

try {
    $con = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $sql = "CREATE TABLE photos (
    photo_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    photo_upload LONGTEXT NOT NULL,
    photo_user_id int(255) NOT NULL,
    photo_user_name text (50) NOT NULL,
    photo_likes int(255) NOT NULL,
    photo_key VARCHAR(200) NOT NULL
    )";

    // use exec() because no results are returned
    $con->exec($sql);
    echo "Table photos created successfully";
    } catch(PDOException $exception) {
    echo $sql."<br>".$exception->getMessage();
    }
    $con = null;

?>