<?php

session_start();
if (!isset($_SESSION['type'])) {
    header("location: ../401.html");
    exit();
}
