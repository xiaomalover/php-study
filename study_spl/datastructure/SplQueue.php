<?php
/**PHP标准库-数据结构-队列
 * 注意所有打印提示的地方用英语，避免windows命令行模式下乱码。
 * @author xiaomalover <xiaomalover@gmail.com>
 *
 * 类原型如下
 * @link http://php.net/manual/en/class.splqueue.php
 * SplQueue extends SplDoublyLinkedList implements Iterator , ArrayAccess , Countable {
 * //类方法
 * __construct ( void )
 * mixed dequeue ( void ) //出队
 * void enqueue ( mixed $value ) //入队
 * void setIteratorMode ( int $mode ) //设置了迭代器模式为 FIFO,先进先出，以符合队列的特点
 * //继承方法
 * public void SplDoublyLinkedList::add ( mixed $index , mixed $newval )
 * public mixed SplDoublyLinkedList::bottom ( void )
 * public int SplDoublyLinkedList::count ( void )
 * public mixed SplDoublyLinkedList::current ( void )
 * public int SplDoublyLinkedList::getIteratorMode ( void )
 * public bool SplDoublyLinkedList::isEmpty ( void )
 * public mixed SplDoublyLinkedList::key ( void )
 * public void SplDoublyLinkedList::next ( void )
 * public bool SplDoublyLinkedList::offsetExists ( mixed $index )
 * public mixed SplDoublyLinkedList::offsetGet ( mixed $index )
 * public void SplDoublyLinkedList::offsetSet ( mixed $index , mixed $newval )
 * public void SplDoublyLinkedList::offsetUnset ( mixed $index )
 * public mixed SplDoublyLinkedList::pop ( void )
 * public void SplDoublyLinkedList::prev ( void )
 * public void SplDoublyLinkedList::push ( mixed $value )
 * public void SplDoublyLinkedList::rewind ( void )
 * public string SplDoublyLinkedList::serialize ( void )
 * public void SplDoublyLinkedList::setIteratorMode ( int $mode )
 * public mixed SplDoublyLinkedList::shift ( void )
 * public mixed SplDoublyLinkedList::top ( void )
 * public void SplDoublyLinkedList::unserialize ( string $serialized )
 * public void SplDoublyLinkedList::unshift ( mixed $value )
 * public bool SplDoublyLinkedList::valid ( void )
 * }
 */

//实例化一个队列
echo "Now new a SplQueue instance ... ", PHP_EOL;
$queue = new SplQueue();

//入队用enqueue()方法
echo "Now use enqueue() function to add some elements(one, two, three, four) to queue ... ", PHP_EOL;
$queue->enqueue('one');
$queue->enqueue('two');
$queue->enqueue('three');
$queue->enqueue('four');

//打印出队列
echo "Now queue like bellow:", PHP_EOL;
print_r($queue);

//看队列头，队列尾 是否同SplDoublyLinkedList
echo "Look at the bottom, we found that, it is as same as SplDoublyLinkedList",
PHP_EOL, "The bottom is:", $queue->bottom(), PHP_EOL;
echo "Look at the top, we found that, it is as same as SplDoublyLinkedList",
PHP_EOL, "The top is:", $queue->top(), PHP_EOL;

//出队用dequeue()
echo "Now use dequeue() function to pick one element from queue out ... ", PHP_EOL;
echo "The element is : ", $queue->dequeue(), PHP_EOL;

//再次打印队列
echo "Now the queue like bellow : ", PHP_EOL;
print_r($queue);
