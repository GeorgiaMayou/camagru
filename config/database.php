<?php
    session_start();
    session_destroy();
    include ("../database/create_database.php");
    include ("../database/create_table_photos.php");
    include ("../database/create_table_users.php");
    include ("../database/create_table_comments.php");
    include ("../config/setup.php");
    echo "<script>alert('Success')</script>";
    echo "<script>window.open('../index.php','_self')</script>";
?>