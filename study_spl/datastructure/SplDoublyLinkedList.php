<?php
/** PHP标准库-数据结构-双向链表
 * 注意所有打印提示的地方用英语，避免windows命令行模式下乱码。
 * @author xiaomalover <xiaomalover@gmail.com>
 *
 * 类原型如下
 * @link http://php.net/manual/en/class.spldoublylinkedlist.php
 * SplDoublyLinkedList implements Iterator , ArrayAccess , Countable {
 * //类方法
 * public
 * __construct(void)
 * public void add(mixed $index , mixed $newval )
 * public mixed bottom(void)
 * public int count(void)
 * public mixed current(void)
 * public int getIteratorMode(void)
 * public bool isEmpty(void)
 * public mixed key(void)
 * public void next(void)
 * public bool offsetExists(mixed $index )
 * public mixed offsetGet(mixed $index )
 * public void offsetSet(mixed $index , mixed $newval )
 * public void offsetUnset(mixed $index )
 * public mixed pop(void)
 * public void prev(void)
 * public void push(mixed $value )
 * public void rewind(void)
 * public string serialize(void)
 * public void setIteratorMode(int $mode )
 * public mixed shift(void)
 * public mixed top(void)
 * public void unserialize(string $serialized )
 * public void unshift(mixed $value )
 * public bool valid(void)
 * }
 */

//新建一个双向链表实例
echo "Now we new a SplDoublyLinkedList instance ... ", PHP_EOL;
$ddl = new SplDoublyLinkedList();

//用push向链表尾部【顶部】加入数据, 对应弹出链表尾部【顶部】数据用pop()
echo "Now we push two elements(one two, in their order) onto the instance's top ... ", PHP_EOL;
$ddl->push('one');
$ddl->push('two');

//用unshift向链表头部【底部】加入数据，对应获取链表头部【底部】数据用shift()
echo "Now we unshift one element(three) into the instance's bottom ... ", PHP_EOL;
$ddl->unshift('three');

//打印链表
echo "Now we print the instance, we found the instance detail as bellow : ", PHP_EOL;
print_r($ddl);
echo "We found that, It is contain two attributes, int flags: 0, and one array which contain the data that we had pushed and unshifted.", PHP_EOL;

/**
 * 通过打印我们发现，双向链表结果为如下结构，有两个私有成员，一个为整形标志flags, 值为1
 * 一个为数据成员， dllist, 为一个数组， 我们push的数据被加在index大的位置尾部【顶部】，
 * unshift的数据被加在了index为0的位置，即头部【底部】
 * SplDoublyLinkedList Object
 * (
 *      [flags:SplDoublyLinkedList:private] => 0
 *      [dllist:SplDoublyLinkedList:private] => Array
 *      (
 *          [0] => three
 *          [1] => one
 *          [2] => two
 *      )
 * )
 */

/*
 * 接下来，我们用top(), bottom()方法查看一下链表的顶部和底部
 */
echo "Now we take a look at the instance's top and bottom ... ", PHP_EOL;
echo "The top element we push onto is : " . $ddl->top(), PHP_EOL;
echo "The bottom element we unshited into is : " . $ddl->bottom(), PHP_EOL;
/* 结果为：
 * The top element is : two
 * The bottom element is : three
 * 我们发现，正如我们所料，索引小的为链表头部【底部】，索引大的为链表尾部【顶部】
 */

//对应刚刚的push操作，我们用pop()从链表尾部【顶部】弹出一个元素。
echo "Now we pop one element from the top of the instance ... ", PHP_EOL;
$pop = $ddl->pop();
echo "the poped element is:" . $pop, PHP_EOL;
//被弹出的元素为two, 正是，push的最后一个元素, 尾部【顶部】元素

//对应刚刚的unshift操作，我们用shift()从链表头部【底部】弹出一个元素。
echo "Now we shift one element from the bottom of the instance ... ", PHP_EOL;
$shift = $ddl->shift();
echo "the shifted element is:" . $shift, PHP_EOL;
//被抽出的元素为three,  正是，unshift的那个元素, 头部【底部】元素

//现在打印一下链表.
echo "Now we print the instance again ... ", PHP_EOL;
print_r($ddl);
//我们发现，数据域只剩中间元素one了
echo "We found data field only one element(one) Leave behind.", PHP_EOL;

//为了后续的实验，我们继续添加几个元素进链表
echo "Now we push three elements(a, b, c) into the instance again ... ", PHP_EOL;
$ddl->push('a');
$ddl->push('b');
$ddl->push('c');

/*
 * 由于双向链表实现了Iterator【迭代器】接口，所以可以通过迭代器的方式来遍历
 * 在遍历是可以按以下常量值设置遍历模式, 其实下面的值就是flags域对应的值
 * const IT_MODE_LIFO = 2;
 * const IT_MODE_FIFO = 0;
 * const IT_MODE_DELETE = 1;
 * const IT_MODE_KEEP = 0;
 */

//我们来看看默认的遍历模式是不是为当前的flags的值
echo "The current traverse mode is " . $ddl->getIteratorMode(), PHP_EOL;

echo "Now we traverse the instance as the default mode first in first out...", PHP_EOL;
$ddl->rewind(); //遍历前必须先rewind 指针
while ($ddl->valid()) {
    echo $ddl->current(), PHP_EOL;
    $ddl->next();
}

echo "Now we traverse the instance as the mode last in first out...", PHP_EOL;
$ddl->setIteratorMode(SplDoublyLinkedList::IT_MODE_LIFO); //后进先出
$ddl->rewind(); //便利前必须先rewind 指针
while ($ddl->valid()) {
    echo $ddl->current(), PHP_EOL;
    $ddl->next();
}

//由于双向链表实现了serialize接口，所以可以序列化，反序列化
echo "Now serialize the instance ... ", PHP_EOL;
$str = serialize($ddl);
echo $str, PHP_EOL;
echo "Now unserialize data:", PHP_EOL;
print_r(unserialize($str));
echo PHP_EOL;

//由于双向链表实现了Countable接口，所以可以用count()方法获取元素个数。
echo "Now use count() function to get the length ... ", PHP_EOL;
echo "The length is ", count($ddl);
echo PHP_EOL;

//add()方法能插入元素到指定索引，注意，flags的值不同【iterator mode 不同】，结果不同
echo "Now add a element 'hello' to index 3 when iterator mode is 2... ", PHP_EOL;
$ddl->add(3, "hello");
echo "Now instance is like bellow: ", PHP_EOL;
print_r($ddl);

$ddl->setIteratorMode(SplDoublyLinkedList::IT_MODE_FIFO); //先进先出
echo "Now add a element 'world' to index 3 when iterator mode is 0... ", PHP_EOL;
$ddl->add(3, "world");
echo "Now instance is like bellow: ", PHP_EOL;
print_r($ddl);

//由于双向链表实现了Traversable接口，所以可以foreach遍历。
echo "Now use foreach to traverse elements ... ", PHP_EOL;
$ddl->rewind(); //不要忘记遍历前rewind();
foreach ($ddl as $d) {
    echo $d, PHP_EOL;
}

//由于双向链表实现了ArrayAccess接口,实现了 offsetGet offsetSet offsetExists offsetUnset方法
echo "Now we use offsetExists to determine whether exist index 1 ... ", PHP_EOL;
echo $ddl->offsetExists(1), PHP_EOL;

echo "Now we use offsetGet to get the element whose index is 1 ... ", PHP_EOL;
echo $ddl->offsetGet(1), PHP_EOL;

echo "Now we use offsetSet to overwrite the element whose index is 1 ... ", PHP_EOL;
$ddl->offsetSet(1, 'new');
echo "Now the instance like bellow : ", PHP_EOL;
print_r($ddl);

echo "Now we use offsetUnset to delete the element whose index is 1 ... ", PHP_EOL;
$ddl->offsetUnset(1);
echo "Now the instance like bellow : ", PHP_EOL;
print_r($ddl);
