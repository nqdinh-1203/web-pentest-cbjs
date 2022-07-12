<?php

// include mọi file .php trong thư mục libs
// Reference: https://stackoverflow.com/questions/599670/how-to-include-all-php-files-from-a-directory
foreach (glob("libs/*.php") as $filename) {
    include $filename;
}
