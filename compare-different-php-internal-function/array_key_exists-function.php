<?php
$start = current_time();
$arr = range(1, 500000);
$i = 0;
while ($i < count($arr)) {
    array_key_exists($i, $arr);
    $i++;
}
$end = current_time();

echo "spend time:", $end - $start, PHP_EOL;

function current_time()
{
    list($usec, $sec) = explode(" ", microtime());
    return ((float)$usec + (float)$sec);
}
