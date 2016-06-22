1在当前文件所在目录, 启动服务
php -S localhost:8080
打开新的命令行，执行ab压力测试  
ab -n3 -c1 http://localhost:8080/php-internal-function.php
//测试结果为: 每秒请求375次， 每次请求 2.6 ms 
ab -n3 -c1 http://localhost:8080/self-code.php
//测试结果为: 每秒请求1.8次， 每次请求 588 ms

由此可见，php内置函数效率远高于我们自己实现逻辑，所以在编码过程中应尽可能多用内置函数来实现。 
