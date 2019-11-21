<?php

$servername = "localhost";
$username = "root";
$password = "Mayou12";
try {
    $con = new PDO("mysql:host=$servername", $username, $password);
    // set the PDO error mode to exception
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE DATABASE IF NOT EXISTS camagru";
    // use exec() because no results are returned
    $con->exec($sql);
    echo "Database created successfully<br>";
    } catch(PDOException $exception) {
    echo $sql."<br>".$exception->getMessage();
    }
$con = null;

?>