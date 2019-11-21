<?php
session_start();
    function set_id($comment_id) {
        echo "<script>alert('$comment_id')</script>";
        return ($comment_id);
    }
?>