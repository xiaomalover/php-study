<?php
/**
 * @author xiaomalover <xiaomalover@gmail.com>
 */

//RecursiveIterator
$ri = new RecursiveDirectoryIterator(__DIR__);
$rii = new RecursiveIteratorIterator($ri);

echo "Now recursive display all file and directory of current directory:", PHP_EOL;
foreach ($rii as $r) {
    echo $r, PHP_EOL;
}
