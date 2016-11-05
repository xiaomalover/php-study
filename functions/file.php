<?php

$arr = file('./file.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

print_r($arr);

$arr1 = file('http://www.baidu.com');

print_r($arr1);
