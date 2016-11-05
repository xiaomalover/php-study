<?php
/** PHP标准库-数据结构-定长数组
 * 定长数组提供了数组的主要功能，区别于普通数组的是长度固定，索引【键名】必须为长度范围类的整数。
 * 优势是拥有更快的速度
 * 注意所有打印提示的地方用英语，避免windows命令行模式下乱码。
 * @author xiaomalover <xiaomalover@gmail.com>
 *
 * 类原型如下
 * The SplFixedArray class provides the main functionalities of array.
 * The main differences between a SplFixedArray and a normal PHP array
 * is that the SplFixedArray is of fixed length and allows only integers
 * within the range as indexes. The advantage is that it allows a faster array implementation.
 *
 * SplFixedArray implements Iterator , ArrayAccess , Countable {
 * //类方法
 * public __construct ([ int $size = 0 ] )
 * public int count ( void )
 * public mixed current ( void )
 * public static SplFixedArray fromArray ( array $array [, bool $save_indexes = true ] )
 * public int getSize ( void )
 * public int key ( void )
 * public void next ( void )
 * public bool offsetExists ( int $index )
 * public mixed offsetGet ( int $index )
 * public void offsetSet ( int $index , mixed $newval )
 * public void offsetUnset ( int $index )
 * public void rewind ( void )
 * public int setSize ( int $size )
 * public array toArray ( void )
 * public bool valid ( void )
 * public void __wakeup ( void )
 * }
 */

//实例化是要带上长度参数
echo "Now new the SplFixedArray instance ...", PHP_EOL;
$fa = new SplFixedArray(4);
$fa[0] = 'zero';
$fa[1] = 'one';
$fa[2] = 'two';

//打印数组
echo "Now the instance like bellow:", PHP_EOL;
print_r($fa);

//再加一个，就会超出范围
//$fa[4] = 'four';

//索引为字母也会错
//$fa['a'] = 'a';

//索引为数字的字符串格式不会错
$fa['1'] = 'new one';

while ($fa->valid()) {
    echo $fa->current(), PHP_EOL;
    $fa->next();
}

//省略键名也会报错
//$fa[] = "three";

//获取长度
echo "Length is : ", $fa->getSize(), PHP_EOL;

//重设长度，原来的元素不受影响
$fa->setSize(5);
$fa[4] = 'four';
print_r($fa);


//测试效率的例子
for ($size = 1000; $size < 10000000; $size *= 2) {
    echo PHP_EOL . "Testing size: $size" . PHP_EOL;
    for ($s = microtime(true), $container = Array(), $i = 0; $i < $size; $i++) {
        $container[$i] = null;
    }
    echo "Array(): " . (microtime(true) - $s) . PHP_EOL;

    for ($s = microtime(true), $container = new SplFixedArray($size), $i = 0; $i < $size; $i++) {
        $container[$i] = null;
    }
    echo "SplArray(): " . (microtime(true) - $s) . PHP_EOL;
}
