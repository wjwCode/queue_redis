# queue_redis

秒杀

#使用

需要PHP+MySQL+apache/nginx环境，PHP的redis扩展。

在PHP+MySQL+apache/nginx启动的环境下，启动redis扩展，命令行执行savetodb.php文件，开启redis队列服务监听。

连接MySQL数据库。

浏览器访问user.php模拟多用户同时抢购。

最终实现秒杀功能。
