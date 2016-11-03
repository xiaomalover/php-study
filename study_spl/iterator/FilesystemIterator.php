<?php
//This iterator extends from DirectoryIterator
//But ignore the ./ ../ folder.
echo "---------------------", PHP_EOL, "Now display all file and directory of current directory except /. /.. :", PHP_EOL;
$fit = new FilesystemIterator(__DIR__);
foreach ($fit as $fi) {
    echo $fi, PHP_EOL;
}
