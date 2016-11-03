<?php
/**
 * @author xiaomalover <xiaomalover@gmail.com>
 */
$dit = new DirectoryIterator(__DIR__);

echo "---------------------", PHP_EOL, "Now display all file and directory of current directory:", PHP_EOL;
//Because iterator implements Traversable
foreach ($dit as $it) {

    if ($it->isDot()) { //Because iterator extends SplFileInfo
        echo "Dot:";
    }

    if ($it->isFile()) {
        echo "File:";
    }

    if ($it->isDir()) {
        echo "Directory:";
    }

    echo $it->getFileInfo(), PHP_EOL;
}
echo "-----------------------", PHP_EOL;


echo "Now display all file and directory of current directory in another way:", PHP_EOL;
//Because it is iterator, so we can use while to traverse data.
$dit->rewind(); // Set pointer point to start position.
while ($dit->valid()) {
    echo $dit, PHP_EOL;
    $dit->next(); //Set pointer point to the next element.
}
echo "-----------------------", PHP_EOL;

echo "Now display the element after seek.", PHP_EOL;
$dit->rewind(); // Set pointer to start position.
//Because iterator implements SeekableIterator
$dit->seek(1);

//Now pointer is point to the specify key.
echo $dit;

echo PHP_EOL, "--------------------", PHP_EOL, "End";