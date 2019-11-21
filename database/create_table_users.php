<?php

$servername = "localhost";
$username = "root";
$password = "Mayou12";
$dbname = "camagru";

try {
    $con = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $sql = "CREATE TABLE users (
    user_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_name TEXT(255) NOT NULL,
    user_email TEXT(255) NOT NULL,
    user_pass VARCHAR(200) NOT NULL,
    user_vkey VARCHAR(200),
    user_verif BOOLEAN,
    user_notif BOOLEAN,
    user_image LONGTEXT
    )";

    // use exec() because no results are returned
    $con->exec($sql);
    echo "Table users created successfully";
    } catch(PDOException $exception) {
    echo $sql."<br>".$exception->getMessage();
    }
    $con = null;

?>