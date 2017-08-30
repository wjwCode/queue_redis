<?php

include 'db.php';

//加斜杠'\'表示redis()是在根目录命名空间
$redis = new \Redis();
$redis->connect('127.0.0.1',6379);
$redis_name = "miaosha";

$db = new db();
// var_dump($redis);var_dump($db);exit();
//死循环
while (1) {
	
// 从队列左侧取出一个数据--$redis_name是队列名
	$user = $redis->lPop($redis_name);
// 然后判断这个数据是否存在
	if (!$user ||$user =='nil') {
		sleep(2);
		continue;
	}
// 切割出时间
	$user_arr = explode('%', $user);
	$insert_data = array(
		'uid' => $user_arr[0],
		'time_stamp' => $user_arr[1],
	);
// 保存到数据库
	$sql = "insert into redis_queue(uid,time_stamp) values('".$insert_data['uid']."','".$insert_data['time_stamp']."')";
	$res = $db->exec($sql);
// 数据库插入失败的回滚机制
	if (!$res) {
		$redis->lPush($redis_name,$user);
	}
	sleep(2);
}
// 释放redis
$redis->close();