<?php
$flag = file_get_contents("/flag");
if (isset($_GET["secret"])) {
    if ($flag === $_GET["secret"])
        die(header("Location: map5.html"));
echo "Wrong secret";
}
