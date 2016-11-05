<?php

/** PHP标准库-数据结构-优先队列
 * 注意所有打印提示的地方用英语，避免windows命令行模式下乱码。
 * @author xiaomalover <xiaomalover@gmail.com>
 *
 * 类原型如下
 * The SplPriorityQueue class provides the main functionalities of a prioritized queue, implemented using a max heap.
 * @link http://php.net/manual/en/class.splpriorityqueue.php
 *
 * SplPriorityQueue implements Iterator , Countable {
 * //类方法
 * public __construct ( void )
 * public int compare ( mixed $priority1 , mixed $priority2 )
 * public int count ( void )
 * public mixed current ( void )
 * public mixed extract ( void )
 * public void insert ( mixed $value , mixed $priority )
 * public bool isEmpty ( void )
 * public mixed key ( void )
 * public void next ( void )
 * public void recoverFromCorruption ( void )
 * public void rewind ( void )
 * public void setExtractFlags ( int $flags )
 * public mixed top ( void )
 * public bool valid ( void )
 * }
 */

//实例化一个优先队列
$splPQ = new SplPriorityQueue();

$splPQ->insert('A', 3);
$splPQ->insert('B', 6);
$splPQ->insert('C', 1);
$splPQ->insert('D', 2);

echo "The count of the priorityQueue is :" . $splPQ->count() . PHP_EOL;

//设置取出的模式, SplPriorityQueue::EXTR_BOTH(数据，优先级都取出)
//SplPriorityQueue::EXTR_DATA(只取出数据)
//SplPriorityQueue::EXTR_PRIORITY(只取出优先级)
$splPQ->setExtractFlags($splPQ::EXTR_BOTH);

//回到队列的头部(顶部)
$splPQ->top();

while ($splPQ->valid()) {
    print_r($splPQ->current());
    $splPQ->next();
}


//另一个例子，按优先级打印日志
//接口，限定插入元素的方法必须是两个参数，避免和 SplMinHeap SplMaxHeap插入元素为一个参数搞混
interface PriorityLoggerInterface
{
    public function insert($value, $priority);
}

/**
 * 优先级日志类，继承优先队列，实现优先级日志接口
 * Class PriorityLogger
 */
class PriorityLogger extends SplPriorityQueue implements PriorityLoggerInterface
{

}

class Logger
{

    const ERROR = 3;
    const NOTICE = 1;
    const WARNING = 2;

    private $priorityLogger;

    public function __construct(PriorityLoggerInterface $priorityLogger)
    {
        $this->priorityLogger = $priorityLogger;
    }

    public function addMessage($value, $priority)
    {
        $this->priorityLogger->insert($value, $priority);
    }

    public function getPriorityLogger()
    {
        return $this->priorityLogger;
    }

}

$priorityLogger = new PriorityLogger();

$logger = new Logger($priorityLogger);
$logger->addMessage('Message with notice type', Logger::NOTICE);
$logger->addMessage('Message with warning type', Logger::WARNING);
$logger->addMessage('Message with error type', Logger::ERROR);

$priorityLoggerQueue = $logger->getPriorityLogger();

foreach ($priorityLoggerQueue as $queue) {
    print $queue . PHP_EOL;
}
