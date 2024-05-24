<?php 
    session_start();
    ob_start();
    unset($_SESSION["user_data"]);
    header("location: signin.php");
?>