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

/**
 * 由于SplHeap是抽象类，所以得继承后实现其抽象方法
 */
class JupilerLeague extends SplHeap
{
    /**
     * 实现抽象方法
     * 通过给定数组的值排序
     */
    public function compare($array1, $array2)
    {
        $values1 = array_values($array1);
        $values2 = array_values($array2);
        if ($values1[0] === $values2[0]) {
            return 0;
        }
        return $values1[0] < $values2[0] ? -1 : 1;
    }
}

// 插入数据到堆
$heap = new JupilerLeague();
$heap->insert(array('AA Gent' => 15));
$heap->insert(array('Anderlecht' => 20));
$heap->insert(array('Cercle Brugge' => 11));
$heap->insert(array('Charleroi' => 12));
$heap->insert(array('Club Brugge' => 21));
$heap->insert(array('G. Beerschot' => 15));
$heap->insert(array('Kortrijk' => 10));
$heap->insert(array('KV Mechelen' => 18));
$heap->insert(array('Lokeren' => 10));
$heap->insert(array('Moeskroen' => 7));
$heap->insert(array('Racing Genk' => 11));
$heap->insert(array('Roeselare' => 6));
$heap->insert(array('Standard' => 20));
$heap->insert(array('STVV' => 17));
$heap->insert(array('Westerlo' => 10));
$heap->insert(array('Zulte Waregem' => 15));

// 到堆的顶部【第一个结点】
$heap->top();

// 打印堆中数据
while ($heap->valid()) {
    $current = $heap->current();
    echo key($current) . ': ' . $current[key($current)] . PHP_EOL;
    $heap->next();
}
