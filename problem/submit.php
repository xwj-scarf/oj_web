<?php

$submit_code = htmlentities($_REQUEST['submit_code']);

require_once (dirname(dirname(__FILE__)) . "/include/include.php");

//连接数据库
$conn = mysqli_connect($db_config['db_host'],$db_config['db_user'],$db_config['db_password'],$db_config['db_name']) or die('连接数据库失败！');
mysqli_set_charset($conn,"utf8");

$redis = new Redis();
$redis->connect('127.0.0.1',6379);

$code = json_encode($submit_code);


$now = strtotime(date('Y-m-d H:i:s'));
$conn->query("insert into submit_info (uid,pid,status,time_use,memory_use,update_time) values('{$_SESSION['user_id']}','1',0,0,0,'{$now}')");

$sid = $conn->insert_id;
$pid = 1;
$uid = intval($_SESSION['user_id']);


$submit_info = array(
	'code' => $_REQUEST['submit_code'],
	'sid' => $sid,
	'pid' => $pid,
	'uid' => $uid,
);
$submit = json_encode($submit_info);

$redis->lpush('test',$submit);

var_dump($submit_code);
?>
