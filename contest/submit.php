<?php
$cid = isset($_REQUEST['cid']) && is_numeric($_REQUEST['cid']) ? $_REQUEST['cid'] : 0;

$submit_code = htmlentities($_REQUEST['submit_code']);

require_once (dirname(dirname(__FILE__)) . "/include/include.php");

//登陆后才能提交
if (!isset($_SESSION['user_name']) || empty($_SESSION['user_name'])) {
	echo "<script> alert('请登陆后再提交'); </script>";
    echo "<meta http-equiv='Refresh' content='0;URL=/oj_web/contest/index.php'>";
	exit;
}

//连接数据库
$conn = new Db();
$tmp_data = $conn->query("select start_time,end_time from contest_info where contest_id = '{$cid}'");

$now = strtotime(date('Y-m-d H:i:s'));
if ($tmp_data) {
	if ($tmp_data[0]['end_time'] <= $now) {
		echo "<script> alert('比赛已结束'); </script>";
		echo "<meta http-equiv='Refresh' content='0;URL=/oj_web/contest/index.php'>";
		exit;	
	} else if ($tmp_data[0]['start_time'] > $now) {
		echo "<script> alert('比赛尚未开始'); </script>";
		echo "<meta http-equiv='Refresh' content='0;URL=/oj_web/contest/index.php'>";
		exit;	
	}
} else {
	echo "<script> alert('比赛不存在'); </script>";
	echo "<meta http-equiv='Refresh' content='0;URL=/oj_web/contest/index.php>";
	exit;	
}

$redis = new Redis();
$redis->connect('127.0.0.1',6379);

$code_root_path = CONTEST_CODE_STORGE_PATH . date('Y-m-d');
if (!is_dir($code_root_path)) {
    mkdir($code_root_path,0777,true);
}

$code_path = $code_root_path . "/" . $_SESSION['user_id'] . "_" . $now;
file_put_contents($code_path,$submit_code,FILE_APPEND);

$code = json_encode($submit_code);

$conn->query("insert into contest_submit_info (contest_id,uid,pid,status,time_use,memory_use,add_time,update_time,language,code_path) values('{$cid}','{$_SESSION['user_id']}','{$_REQUEST['pid']}',0,0,0,'{$now}','{$now}',0,'{$code_path}')");

$sid = $conn->getInsertId();

$conn->query("update contest_problem_info set total_num = total_num + 1 where show_pid = '{$_REQUEST['pid']}' and contest_id = '{$cid}'");

$tmp_data = $conn->query("select pid from contest_problem_info where show_pid = '{$_REQUEST['pid']}' and contest_id = '{$cid}'");

if ($tmp_data) {
	$pid = intval($tmp_data[0]['pid']);
} else {
	$pid = 0;
}

$uid = intval($_SESSION['user_id']);

$submit_info = array(
	'code' => $_REQUEST['submit_code'],
	'sid' => $sid,
	'pid' => $pid,
	'uid' => $uid,
	'cid' => intval($cid),	
);
$submit = json_encode($submit_info);

$redis->lpush('test',$submit);

echo "<script> alert('提交成功'); </script>";
echo "<meta http-equiv='Refresh' content='0;URL=/oj_web/contest/status.php?cid={$cid}'>";
?>
