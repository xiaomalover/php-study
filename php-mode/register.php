<?php

/**
 * 注册模式，解决全局共享和交换对象。已经创建好的对象，挂在到某个全局可以使用的数组上，在需要使用的时候，直接从该数组上获取即可。
 *
 * 将对象注册到全局的树上。任何地方直接去访问。
 *
 */
class Register
{
    protected static $objects;

    /**
     * 将对象注册到全局的树上
     * @param string $alias 对象别名
     * @param Object $object 对象实例
     */
    function set($alias, $object)
    {
        self::$objects[$alias] = $object;
    }

    /**
     * 获取某个注册到树上的对象
     * @param string $alias
     * @return mixed
     */
    static function get($alias)
    {
        return self::$objects[$alias];
    }

    /**
     * 移除某个注册到树上的对象。
     * @param $alias
     */
    function _unset($alias)
    {
        unset(self::$objects[$alias]);
    }
}
