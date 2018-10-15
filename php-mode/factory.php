<?php
/**
 *
 * 简单工厂模式（静态工厂方法模式）
 *
 * 工厂模式是我们最常用的实例化对象模式，是用工厂方法代替new操作的一种模式。
 *
 * 使用工厂模式的好处是，如果你想要更改所实例化的类名等，则只需更改该工厂方法内容即可，
 *
 * 不需逐一寻找代码中具体实例化的地方（new处）修改了。为系统结构提供灵活的动态扩展机制，减少了耦合。
 */

/**
 * Interface people 人类
 */
interface  People
{
    public function say();
}


/**
 * Class man 继承people的男人类
 */
class Man implements People
{
    // 具体实现people的say方法
    public function say()
    {
        echo "I am a man", PHP_EOL;
    }
}


/**
 * Class women 继承people的女人类
 */
class Women implements People
{
    // 具体实现people的say方法
    public function say()
    {
        echo "I am a women", PHP_EOL;
    }
}


/**
 * Class SimpleFactory 工厂类
 */
class SimpleFactory
{
    // 简单工厂里的静态方法 - 用于创建男人对象
    static function createMan()
    {
        return new Man();
    }

    // 简单工厂里的静态方法 - 用于创建女人对象
    static function createWomen()
    {
        return new Women();
    }
}


/**
 * 具体调用
 */
$man = SimpleFactory::createMan();

$man->say();

$woman = SimpleFactory::createWomen();

$woman->say();