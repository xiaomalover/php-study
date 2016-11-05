<?php
/** PHP标准库-数据结构-小堆(小的元素在堆的顶部)
 * 注意所有打印提示的地方用英语，避免windows命令行模式下乱码。
 * @author xiaomalover <xiaomalover@gmail.com>
 *
 * 类原型如下
 * The SplMinHeap class provides the main functionalities of a heap, keeping the minimum on the top.
 * @link http://php.net/manual/en/class.splminheap.php
 *
 * SplMinHeap extends SplHeap implements Iterator , Countable {
 * //类方法(正是在此方法中做了排序，所以才会小的元素在堆顶)
 * protected int compare ( mixed $value1 , mixed $value2 )
 * //继承方法
 * abstract protected int SplHeap::compare ( mixed $value1 , mixed $value2 )
 * public int SplHeap::count ( void )
 * public mixed SplHeap::current ( void )
 * public mixed SplHeap::extract ( void )
 * public void SplHeap::insert ( mixed $value )
 * public bool SplHeap::isEmpty ( void )
 * public mixed SplHeap::key ( void )
 * public void SplHeap::next ( void )
 * public void SplHeap::recoverFromCorruption ( void )
 * public void SplHeap::rewind ( void )
 * public mixed SplHeap::top ( void )
 * public bool SplHeap::valid ( void )
 * }
 */
$minHeap = new SplMinHeap();
$minHeap->insert(2);
$minHeap->insert(0);
$minHeap->insert(1);
$minHeap->insert(3);
$minHeap->insert(4);

$minHeap->top(); //指针到堆顶
while ($minHeap->valid()) {
    echo $minHeap->current(), PHP_EOL;
    $minHeap->next();
}
