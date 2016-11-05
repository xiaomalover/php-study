<?php
define("LENGTH", 5000);
$arr1 = range(1, LENGTH);
$arr2 = range(LENGTH / 2, LENGTH * 2);

//自己用foreach 实现数组1数组2合并
$carr = $arr1;
foreach ($arr2 as $v) {
    if (!in_array($v, $carr)) {
        $carr[] = $v;
    }
}

//打印出数组长度
echo "Arr1's length is: " . count($arr1) . PHP_EOL;
echo "Arr2's length is: " . count($arr2) . PHP_EOL;
echo "Carr's length is: " . count($carr) . PHP_EOL;

