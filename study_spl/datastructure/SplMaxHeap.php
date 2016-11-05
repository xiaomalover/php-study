<?php
/** PHP标准库-数据结构-大堆(大的元素在堆的顶部)
 * 注意所有打印提示的地方用英语，避免windows命令行模式下乱码。
 * @author xiaomalover <xiaomalover@gmail.com>
 *
 * 类原型如下
 * The SplMaxHeap class provides the main functionalities of a heap, keeping the maximum on the top.
 * @link http://php.net/manual/en/class.splmaxheap.php
 *
 * SplMaxHeap extends SplHeap implements Iterator , Countable {
 * //类方法(正是在此方法中做了排序，所以才会大的元素在堆顶)
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
$maxHeap = new SplMaxHeap();
$maxHeap->insert(2);
$maxHeap->insert(0);
$maxHeap->insert(1);
$maxHeap->insert(3);
$maxHeap->insert(4);

$maxHeap->top(); //指针到堆顶
while ($maxHeap->valid()) {
    echo $maxHeap->current(), PHP_EOL;
    $maxHeap->next();
}
