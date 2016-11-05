<?php
/** PHP标准库-数据结构-栈
 * 注意所有打印提示的地方用英语，避免windows命令行模式下乱码。
 * @author xiaomalover <xiaomalover@gmail.com>
 *
 * 类原型如下
 * @link http://php.net/manual/en/class.splstack.php
 * SplStack extends SplDoublyLinkedList implements Iterator , ArrayAccess , Countable {
 * //类方法
 * __construct ( void )
 * void setIteratorMode ( int $mode ) //设置了迭代器模式为 LIFO,后进先出，以符合栈的特点
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

//新建一个栈实例
echo "Now, New a stack...";
$st = new SplStack();
echo PHP_EOL;

//像SplDoublyLinkedList一样，添加元素用push
echo "Now use push() function to add some elements to stack...";
$st->push(10);
$st->push(20);
$st->push(30);
$st->push(40);
$st->push(50);
echo PHP_EOL;

//打印栈
echo "After add some data, we print the stack:", PHP_EOL;
print_r($st);
echo PHP_EOL;

//看栈顶，栈底 是否同SplDoublyLinkedList
echo "Look at the bottom, we found that, it is as same as SplDoublyLinkedList",
PHP_EOL, "The bottom is:", $st->bottom(), PHP_EOL;
echo "Look at the top, we found that, it is as same as SplDoublyLinkedList",
PHP_EOL, "The top is:", $st->top(), PHP_EOL;

//用while遍历栈
echo "Now traverse the stack use while:", PHP_EOL;
$st->rewind();
while ($st->valid()) {
    echo $st->current(), PHP_EOL;
    $st->next();
}
echo PHP_EOL;

//出栈用pop()
echo "Now pop one, the poped element is : ", $st->pop(), PHP_EOL;

//再次打印栈
echo "And Now, the stack is:", PHP_EOL;
print_r($st);
echo PHP_EOL;
