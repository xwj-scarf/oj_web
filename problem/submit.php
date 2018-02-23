<?php

$submit_code = htmlentities($_REQUEST['submit_code']);

require_once (dirname(dirname(__FILE__)) . "/include/include.php");

//登陆后才能提交
if (!isset($_SESSION['user_name']) || empty($_SESSION['user_name'])) {
	echo "<script> alert('请登陆后再提交'); </script>";
    echo "<meta http-equiv='Refresh' content='0;URL=/oj_web/problem/detail.php?pid={$_REQUEST['problem_id']}'>";
	exit;
}

//连接数据库
$conn = mysqli_connect($db_config['db_host'],$db_config['db_user'],$db_config['db_password'],$db_config['db_name']) or die('连接数据库失败！');
mysqli_set_charset($conn,"utf8");

$redis = new Redis();
$redis->connect('127.0.0.1',6379);

$code = json_encode($submit_code);


$now = strtotime(date('Y-m-d H:i:s'));
$conn->query("insert into submit_info (uid,pid,status,time_use,memory_use,add_time,update_time) values('{$_SESSION['user_id']}','{$_REQUEST['problem_id']}',0,0,0,'{$now}','{$now}')");

$sid = $conn->insert_id;

$conn->query("update problem_info set total_num = total_num + 1 where pid = '{$_REQUEST['problem_id']}'");

$pid = intval($_REQUEST['problem_id']);
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
