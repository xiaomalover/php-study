1,在当前文件所在目录, 启动服务
--------
<pre><code>php -S localhost:8080</code></pre>
2,打开新的命令行，执行ab压力测试  
--------
<pre><code>ab -n3 -c1 http://localhost:8080/php-internal-function.php</code></pre> <br>
测试结果为: 每秒请求375次， 每次请求 2.6 ms 
<pre><code>ab -n3 -c1 http://localhost:8080/self-code.php</code></pre> <br>
测试结果为: 每秒请求1.8次， 每次请求 588 ms

由此可见，php内置函数效率远高于我们自己实现逻辑，所以在编码过程中应尽可能多用内置函数来实现。 
