<?php
define("LENGTH", 5000);
$arr1 = range(1, LENGTH);
$arr2 = range(LENGTH / 2, LENGTH * 2);

//用系统函数合并数组
$carr = array_merge($arr1, $arr2);

//打印出数组长度
echo "Arr1's length is: " . count($arr1) . PHP_EOL;
echo "Arr2's length is: " . count($arr2) . PHP_EOL;
echo "Carr's length is: " . count($carr) . PHP_EOL;

