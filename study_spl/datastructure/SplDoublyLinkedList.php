<?php
/**
 * @author xiaomalover <xiaomalover@gmail.com>
 */
$ddl = new SplDoublyLinkedList();
$ddl->push('one');
$ddl->push('two');
$ddl->unshift('three');

echo "--------------------------", PHP_EOL, "Now object is :", PHP_EOL;
print_r($ddl);
echo PHP_EOL;

echo "--------------------------", PHP_EOL, "Now pop element is:", PHP_EOL;
$pop = $ddl->pop();
echo $pop, PHP_EOL;

echo "--------------------------", PHP_EOL, "Now shift element is:", PHP_EOL;
$shift = $ddl->shift();
echo $shift, PHP_EOL;

echo "--------------------------", PHP_EOL, "Now push some elements:", PHP_EOL;
$ddl->push('a');
$ddl->push('b');
$ddl->push('c');

echo "--------------------------", PHP_EOL, "And now object is :", PHP_EOL;
print_r($ddl);
echo PHP_EOL;

echo "--------------------------", PHP_EOL, "Now FIFO traverse:", PHP_EOL;
$ddl->setIteratorMode(0);
$ddl->rewind();
while($ddl->valid()) {
    echo $ddl->current(), PHP_EOL;
    $ddl->next();
}

echo "--------------------------", PHP_EOL, "Now LIFO traverse:", PHP_EOL;
$ddl->setIteratorMode(2);
$ddl->rewind();
foreach ($ddl as $d) {
    echo $d, PHP_EOL;
}

echo "--------------------------", PHP_EOL, "Now serialize data:", PHP_EOL;
$str = serialize($ddl);
echo $str;
echo PHP_EOL;

echo "--------------------------", PHP_EOL, "Now unserialize data:", PHP_EOL;
print_r(unserialize($str));
echo PHP_EOL;

echo "--------------------------", PHP_EOL, "Now bottom element:", PHP_EOL;
echo $ddl->bottom();
echo PHP_EOL;

echo "--------------------------", PHP_EOL, "Now top element:", PHP_EOL;
echo $ddl->top();
echo PHP_EOL;

echo "--------------------------", PHP_EOL, "Now add element:", PHP_EOL;
$ddl->add(3, 'eleven');
echo PHP_EOL;

echo "--------------------------", PHP_EOL, "And now object is :", PHP_EOL;
print_r($ddl);
echo PHP_EOL;

