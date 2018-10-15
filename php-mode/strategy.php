<?php

/**
 *
 * 策略模式
 *
 * 策略模式是对象的行为模式，用意是对一组算法的封装。动态的选择需要的算法并使用。
 *
 * 策略模式指的是程序中涉及决策控制的一种模式。策略模式功能非常强大，因为这个设计模式本身的核心思想就是面向对象编程的多形性思想。
 *
 * 策略模式的三个角色：
 *
 * 1．抽象策略角色
 *
 * 2．具体策略角色
 *
 * 3．环境角色（对抽象策略角色的引用）
 *
 * 实现步骤：
 *
 * 1．定义抽象角色类（定义好各个实现的共同抽象方法）
 *
 * 2．定义具体策略类（具体实现父类的共同方法）
 *
 * 3．定义环境角色类（私有化申明抽象角色变量，重载构造方法，执行抽象方法）
 *
 * 就在编程领域之外，有许多例子是关于策略模式的。例如：
 *
 * 如果我需要在早晨从家里出发去上班，我可以有几个策略考虑：我可以乘坐地铁，乘坐公交车，走路或其它的途径。每个策略可以得到相同的结果，但是使用了不同的资源。
 */


/**
 * 抽象策略类
 */
abstract class BaseAgent
{
    abstract function PrintPage();
}


/**
 * 用于客户端是IE时调用的类（环境角色）
 */
class IeAgent extends BaseAgent
{
    function PrintPage()
    {
        return 'IE';
    }
}


/**
 * 用于客户端不是IE时调用的类（环境角色）
 */
class OtherAgent extends BaseAgent
{
    function PrintPage()
    {
        return 'Not IE';
    }
}


/**
 * 具体策略角色
 */
class Browser
{
    /**
     * @param $object BaseAgent
     * @return mixed
     */
    public function call(BaseAgent $object)
    {
        return $object->PrintPage();
    }
}


$bro = new Browser ();

echo $bro->call(new IeAgent ());

echo PHP_EOL;

echo $bro->call(new OtherAgent());
