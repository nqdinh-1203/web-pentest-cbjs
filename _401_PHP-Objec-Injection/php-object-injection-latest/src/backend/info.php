<?php
include("libs.php");
session_start();
if (!isset($_SESSION["username"]))
    die(header("Location: register.php"));
if (!isset($_SESSION["trainer"]))
    die(header("Location: index.php"));
echo $_SESSION["trainer"];
?>
