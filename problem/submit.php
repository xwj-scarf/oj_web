<?php

$submit_code = htmlentities($_REQUEST['submit_code']);

require_once (dirname(dirname(__FILE__)) . "/include/include.php");

//登陆后才能提交
if (!isset($_SESSION['user_name']) || empty($_SESSION['user_name'])) {
	echo "<script> alert('请登陆后再提交'); </script>";
    echo "<meta http-equiv='Refresh' content='0;URL=/oj_web/problem/detail.php?pid={$_REQUEST['problem_id']}'>";
	exit;
}

$conn = new Db();
$redis = new Redis();
$redis->connect('127.0.0.1',6379);

$code = json_encode($submit_code);

$now = strtotime(date('Y-m-d H:i:s'));

$code_root_path = CODE_STORGE_PATH . date('Y-m-d');
if (!is_dir($code_root_path)) {
	mkdir($code_root_path,0777,true);
}

$code_path = $code_root_path . "/" . $_SESSION['user_id'] . "_" . $now;
file_put_contents($code_path,$submit_code,FILE_APPEND);

$conn->query("insert into submit_info (uid,pid,status,time_use,memory_use,add_time,update_time,language,code_path) values('{$_SESSION['user_id']}','{$_REQUEST['problem_id']}',0,0,0,'{$now}','{$now}',0,'{$code_path}')");

$sid = $conn->getInsertId();

$conn->query("update problem_info set total_num = total_num + 1 where pid = '{$_REQUEST['problem_id']}'");

$pid = intval($_REQUEST['problem_id']);
$uid = intval($_SESSION['user_id']);

$submit_info = array(
	'code' => $_REQUEST['submit_code'],
	'sid' => $sid,
	'pid' => $pid,
	'uid' => $uid,
	'cid' => 0,
);
$submit = json_encode($submit_info);

$redis->lpush('test',$submit);

echo "<script> alert('提交成功'); </script>";
echo "<meta http-equiv='Refresh' content='0;URL=/oj_web/status/index.php'>";
exit;
//var_dump($submit_code);
?>
