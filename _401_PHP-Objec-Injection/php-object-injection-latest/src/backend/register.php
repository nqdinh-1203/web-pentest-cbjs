<?php
include("libs.php");
session_start();
if (isset($_POST["username"]) && isset($_POST["password"])) {
    $check = $db->check_user($_POST["username"]);
    if ($check) {
        $db->insert_user($_POST["username"], $_POST["password"]);
        $message = "<font color='green'>Create user successfully</font>";
    } else
        $message = "<font color='red'>User already exists</font>";
}
if (isset($message))
    echo $message;
