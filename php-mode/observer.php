<?php
/**
 *
 * 观察者模式(Observer)，当一个对象状态发生变化时，依赖它的对象全部会收到通知，并自动更新。
 *
 * 场景:一个事件发生后，要执行一连串更新操作。传统的编程方式，就是在事件的代码之后直接加入处理的逻辑。
 * 当更新的逻辑增多之后，代码会变得难以维护。这种方式是耦合的，侵入式的，增加新的逻辑需要修改事件的主体代码。
 *
 * 观察者模式实现了低耦合，非侵入式的通知与更新机制。
 */

/**
 * 主题接口
 */
interface Subject
{
    public function register(Observer $observer);

    public function notify();
}


/**
 * 观察者接口
 */
interface Observer
{
    public function watch();
}


/**
 * 主题
 */
class Action implements Subject
{
    public $_observers = array();

    public function register(Observer $observer)
    {
        $this->_observers[] = $observer;
    }

    public function notify()
    {
        foreach ($this->_observers as $observer) {
            $observer->watch();
        }

    }
}

// 观察者
class Cat implements Observer
{
    public function watch()
    {
        echo "Cat watches TV<hr/>";
    }
}


class Dog implements Observer
{
    public function watch()
    {
        echo "Dog watches TV<hr/>";
    }
}


class Human implements Observer
{
    public function watch()
    {
        echo "People watches TV<hr/>";
    }
}


$action = new Action();

$action->register(new Cat());

$action->register(new Human());

$action->register(new Dog());

$action->notify();
