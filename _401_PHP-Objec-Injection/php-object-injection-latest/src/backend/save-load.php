<?php
    include("libs.php");
    session_start();
    if (!isset($_SESSION["username"]))
        die(header("Location: register.php"));
    if (!isset($_SESSION["trainer"]))
        die(header("Location: index.php"));
    if (isset($_GET["action"])) {
        if ($_GET["action"] == "save") {
            $message = serialize($_SESSION["trainer"]);
            // Tải về thành file pokemon.sav
            // Reference: https://stackoverflow.com/questions/13279801/how-can-i-download-a-string-to-the-browser-using-php-not-a-text-file
            header('Content-Type: application/octet-stream');
            header("Content-disposition: attachment; filename=pokemon.sav");
            header("Content-Length: " . strlen($message));
            echo $message;
        }
        else if ($_GET["action"] == "load") {
            if (isset($_FILES["data"])) {
                $data = file_get_contents($_FILES["data"]["tmp_name"]);
                // Xử lý khi unserialize bị lỗi
                // Reference: https://stackoverflow.com/questions/12684871/how-to-catch-unserialize-exception
                $trainer = @unserialize($data);
                if ($trainer == null) {
                    echo "Something went wrong";
                }
                else {
                    $_SESSION["trainer"] = $trainer;
                    echo "Load successfully";
                }
            }
            else {
                echo "Empty data";
            }
        }
    }
?>
