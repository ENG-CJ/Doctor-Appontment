<?php


session_start();
if(!isset($_SESSION['type']))
{
    header("location: ../index.php");
    exit();
}




?>