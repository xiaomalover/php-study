<?php
/** PHP标准库-数据结构-堆
 * 注意所有打印提示的地方用英语，避免windows命令行模式下乱码。
 * @author xiaomalover <xiaomalover@gmail.com>
 *
 * 类原型如下
 * @link http://php.net/manual/en/class.splheap.php
 * abstract SplHeap implements Iterator , Countable {
 * //类方法
 * public __construct ( void )
 * abstract protected int compare ( mixed $value1 , mixed $value2 )
 * public int count ( void )
 * public mixed current ( void )
 * public mixed extract ( void )
 * public void insert ( mixed $value )
 * public bool isEmpty ( void )
 * public mixed key ( void )
 * public void next ( void )
 * public void recoverFromCorruption ( void )
 * public void rewind ( void )
 * public mixed top ( void )
 * public bool valid ( void )
 * }
 */
$heap = new SplMaxHeap(); # Ascending order
$heap->insert('E');
$heap->insert('B');
$heap->insert('D');
$heap->insert('A');
$heap->insert('C');

echo $heap->extract(), PHP_EOL; # E
echo $heap->extract(), PHP_EOL; # D

$heap = new SplMinHeap(); # Descending order
$heap->insert('E');
$heap->insert('B');
$heap->insert('D');
$heap->insert('A');
$heap->insert('C');

print PHP_EOL;
echo $heap->extract(), PHP_EOL; # A
echo $heap->extract(), PHP_EOL; # B
$heap->rewind();
$heap->next();
echo $heap->key(), $heap->current();
$heap->valid() && $heap->extract();
$heap->valid() && $heap->extract();
$heap->valid() && $heap->extract();
echo $heap->isEmpty();