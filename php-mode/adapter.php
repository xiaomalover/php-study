<?php

/**
 *
 * 适配器模式
 *
 * 将各种截然不同的函数接口封装成统一的API。
 *
 * PHP中的数据库操作有MySQL,MySQLi,PDO三种，可以用适配器模式统一成一致，使不同的数据库操作，统一成一样的API。
 *
 * 类似的场景还有cache适配器，可以将memcache,redis,file,apc等不同的缓存函数，统一成一致。
 *
 * 首先定义一个接口(有几个方法，以及相应的参数)。然后，有几种不同的情况，就写几个类实现该接口。将完成相似功能的函数，统一成一致的方法。
 */


/**
 * 定义接口类
 * Interface IDatabase
 */
interface IDatabase
{
    function connect($host, $user, $password, $dbName);

    function query($sql);

    function close();
}


/**
 * Mysql作适配
 * Class MySQL
 */
class MySQL implements IDatabase
{
    protected $conn;

    function connect($host, $user, $password, $dbName)
    {
        $conn = mysql_connect($host, $user, $password);
        mysql_select_db($dbName, $conn);
        $this->conn = $conn;
    }

    function query($sql)
    {
        $res = mysql_query($sql, $this->conn);
        return $res;
    }

    function close()
    {
        mysql_close($this->conn);
    }
}


class OwnMySQLi implements IDatabase
{
    protected $conn;

    function connect($host, $user, $password, $dbName)
    {
        $conn = mysqli_connect($host, $user, $password, $dbName);
        $this->conn = $conn;
    }

    function query($sql)
    {
        return mysqli_query($this->conn, $sql);
    }

    function close()
    {
        mysqli_close($this->conn);
    }
}

