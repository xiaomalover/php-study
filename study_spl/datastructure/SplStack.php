<?php
/**
 * @author xiaomalover <xiaomalover@gmail.com>
 */
//SplStack extends from SplDoublyLinkedList

//New a SplStack;
echo "Now, New a stack...";
$st = new SplStack();
echo PHP_EOL;

//Like SplDoublyLinkedList, Add data into stack we use push() function.
echo "Now use push() function to add some data to stack...";
$st->push(10);
$st->push(20);
$st->push(30);
$st->push(40);
$st->push(50);
echo PHP_EOL;

//After add some data, we use print_r to display the stack.
echo "After add some data, we use print_r to display the stack:", PHP_EOL;
print_r($st);
echo PHP_EOL;

//Look at the bottom, we found that, it is same as SplDoublyLinkedList
echo "Look at the bottom, we found that, it is as same as SplDoublyLinkedList",
    PHP_EOL, "The bottom is:", $st->bottom(), PHP_EOL;

//Look at the top, we found that, it is same as SplDoublyLinkedList
echo "Look at the top, we found that, it is as same as SplDoublyLinkedList",
PHP_EOL, "The top is:", $st->top(), PHP_EOL;


//We use rewind() to reset the pointer position.
echo "Now rewind the pointer";
$st->rewind();
echo PHP_EOL;

//Just like SplDoublyLinkedList, we can use while to traverse the stack.
echo "Now traverse the stack use while:", PHP_EOL;
while ($st->valid()) {
    echo $st->current(), PHP_EOL;
    $st->next();
}
echo PHP_EOL;

//When we set the offset 0 some data, in fact, the data will set on top...
echo "Now use offsetSet function to set index 0 of the stack:";
$st->offsetSet(0, 60);
echo "And Now, the stack is like bellow,  we found that, the top has been overwrote :", PHP_EOL;
print_r($st);
echo PHP_EOL;

echo "Now use offsetSet function to set index 1 of the stack:", PHP_EOL;
$st->offsetSet(1, 50);
echo "And Now, the stack is like bellow,  we found that, the element next to the top has been overwrote :", PHP_EOL;
print_r($st);
echo PHP_EOL;

//We use pop() function to pop the top element out of the stack.
echo "Now pop one:", PHP_EOL;
$st->pop();
echo "And Now, the stack is:", PHP_EOL;
print_r($st);
echo PHP_EOL;



