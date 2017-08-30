<?php

$redis = new \Redis();

$redis->connect('127.0.0.1',6379);
$redis_name = "miaosha";

//获取一下redis里面已有的数量
$num = 0;
for ($i=0; $i <100 ; $i++) { 
	//接受用户的id
	// $uid = $_GET['uid'];
	$uid = rand(100,999);

	//如果人数少于10 则加入队列
	if ($num<10) {
		$redis->rPush($redis_name,$uid.'%'.microtime());//micritime()毫秒
		$num +=1;
		echo "秒杀成功";
	}else{
		//人数已满，返回秒杀完成
		echo "秒杀已结束";
	}
}
$redis->close();