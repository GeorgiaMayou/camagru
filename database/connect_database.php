<?php
$servername = "localhost";
$username = "root";
$password = "Mayou12";

try {
    $con = new PDO("mysql:host=$servername;dbname=camagru", $username, $password);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully";
    } catch(PDOException $exception) {
    echo "Connection failed: " . $exception->getMessage();
    }
?>