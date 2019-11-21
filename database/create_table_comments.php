<?php

$servername = "localhost";
$username = "root";
$password = "Mayou12";
$dbname = "camagru";

try {
    $con = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $sql = "CREATE TABLE comments (
    photo_comment_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    photo_id INT,
    photo_user int(255) NOT NULL,
    photo_comment Text(255) NOT NULL,
    photo_comment_user INT
    )";

    // use exec() because no results are returned
    $con->exec($sql);
    echo "Table comments created successfully";
    } catch(PDOException $exception) {
    echo $sql."<br>".$exception->getMessage();
    }
    $con = null;

?>