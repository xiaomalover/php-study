<?php

/**
 * Closure bindTo function Official demo
 */
class F
{
    function __construct($val)
    {
        $this->val = $val;
    }

    function getClosure()
    {
        //returns closure bound to this object and scope
        return function () {
            return $this->val;
        };
    }
}

$ob1 = new F(1);
$ob2 = new F(2);

$cl = $ob1->getClosure();
echo $cl(), PHP_EOL;
$cl = $cl->bindTo($ob2);
echo $cl(), PHP_EOL;
$cl = $cl->bindTo($ob1);
echo $cl(), PHP_EOL;

/**
 * Closure bindTo function demo 1
 * We can use the concept of bindTo to write a very small Template Engine:
 */
class Article
{
    private $title = "This is an article";
}

class Post
{
    private $title = "This is a post";
}

class Template
{
    function render($context, $tpl)
    {
        $closure = function ($tpl) {
            ob_start();
            include $tpl;
            return ob_end_flush();
        };

        $closure = $closure->bindTo($context, $context);
        $closure($tpl);
    }
}

$art = new Article();
$post = new Post();
$template = new Template();

$template->render($art, 'tpl.php');

$template->render($post, 'tpl.php');

/**
 * Closure bindTo function demo 2
 * You can do pretty Javascript-like things with objects using closure binding:
 */
trait DynamicDefinition
{

    public function __call($name, $args)
    {
        if (is_callable($this->$name)) {
            return call_user_func($this->$name, $args);
        } else {
            throw new \RuntimeException("Method {$name} does not exist");
        }
    }

    public function __set($name, $value)
    {
        $this->$name = is_callable($value) ?
            $value->bindTo($this, $this) :
            $value;
    }
}

class Foo
{
    use DynamicDefinition;
    private $privateValue = 'I am private';
}

$foo = new Foo;
$foo->bar = function () {
    return $this->privateValue;
};

// prints 'I am private'
print $foo->bar();

/**
 * Closure bindTo function demo 3
 * Private/protected members are accessible if you set the "newscope" argument (as the manual says).
 */
$fn = function () {
    return ++$this->foo; // increase the value
};

class Bar
{
    private $foo = 1; // initial value
}

$bar = new Bar();

$fn1 = $fn->bindTo($bar, 'Bar'); // specify class name
$fn2 = $fn->bindTo($bar, $bar); // or object

echo $fn1(); // 2
echo $fn2(); // 3

/**
 * Closure bindTo function demo 4
 * With rebindable $this at hand it's possible to do evil stuff:
 */
class A
{
    private $a = 12;

    private function getA()
    {
        return $this->a;
    }
}

class B
{
    private $b = 34;

    private function getB()
    {
        return $this->b;
    }
}

$a = new A();
$b = new B();
$c = function () {
    if (property_exists($this, "a") && method_exists($this, "getA")) {
        $this->a++;
        return $this->getA();
    }
    if (property_exists($this, "b") && method_exists($this, "getB")) {
        $this->b++;
        return $this->getB();
    }
};
$ca = $c->bindTo($a, $a);
$cb = $c->bindTo($b, $b);
echo $ca(), "\n"; // => 13
echo $cb(), "\n"; // => 35

/**
 * Closure bindTo function demo 5
 * Access private members of parent classes; playing with the scopes:
 */
class Grandparents
{
    private $__status1 = 'married';
}

class Parents extends Grandparents
{
    private $__status2 = 'divorced';
}

class Me extends Parents
{
    private $__status3 = 'single';
}

$status1_3 = function () {
    $this->__status1 = 'happy';
    $this->__status2 = 'happy';
    $this->__status3 = 'happy';
};

$status1_2 = function () {
    $this->__status1 = 'happy';
    $this->__status2 = 'happy';
};

// test 1:
$c = $status1_3->bindTo($R = new Me, Parents::class);
#$c();    // Fatal: Cannot access private property Me::$__status3

// test 2:
$d = $status1_2->bindTo($R = new Me, Parents::class);
$d();
var_dump($R);
/*
object(Me)#5 (4) {
  ["__status3":"Me":private]=>
  string(6) "single"
  ["__status2":"Parents":private]=>
  string(5) "happy"
  ["__status1":"Grandparents":private]=>
  string(7) "married"
  ["__status1"]=>
  string(5) "happy"
}
*/

// test 3:
$e = $status1_3->bindTo($R = new Me, Grandparents::class);
#$e(); // Fatal: Cannot access private property Me::$__status3

// test 4:
$f = $status1_2->bindTo($R = new Me, Grandparents::class);
$f();
var_dump($R);
/*
object(Me)#9 (4) {
  ["__status3":"Me":private]=>
  string(6) "single"
  ["__status2":"Parents":private]=>
  string(8) "divorced"
  ["__status1":"Grandparents":private]=>
  string(5) "happy"
  ["__status2"]=>
  string(5) "happy"
}
*/

