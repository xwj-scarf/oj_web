<?php
require_once (dirname(dirname(__FILE__)) . "/include/include.php");

if (!empty($_REQUEST)) {

	@file_put_contents('/tmp/weijun.log',var_export($_REQUEST,true)."\n",FILE_APPEND);

	$contest_name = $_REQUEST['contest_name'];
	$is_show = $_REQUEST['is_show'];
	$start_time = $_REQUEST['start_time'];
	$end_time = $_REQUEST['end_time'];

	if (empty($contest_name)) {
        echo "<script> alert('Contest名称不能为空');</script>";
        echo "<meta http-equiv='Refresh' content='0;URL=./add_contest.php'>";
        exit;
	}

	if (empty($start_time) || empty($end_time)) {
        echo "<script> alert('开始时间或结束时间不能为空');</script>";
        echo "<meta http-equiv='Refresh' content='0;URL=./add_contest.php'>";
        exit;
	}
	
	if (!checkDateValid($start_time) || !checkDateValid($end_time)) {
		echo "<script> alert('开始时间或结束时间格式错误');</script>";
        echo "<meta http-equiv='Refresh' content='0;URL=./add_contest.php'>";
        exit;
	}

	if (strtotime($start_time) > strtotime($end_time)) {
		echo "<script> alert('结束时间早于开始时间');</script>";
        echo "<meta http-equiv='Refresh' content='0;URL=./add_contest.php'>";
        exit;
	}

	//这里不好
	if (count($_REQUEST) <= 4) {
		echo "<script> alert('请添加题目');</script>";
        echo "<meta http-equiv='Refresh' content='0;URL=./add_contest.php'>";
        exit;
	}

	$problem_num = count($_REQUEST) - 4;
	$problem_id = array();

	for ($i = 1;$i<=$problem_num;$i++) {
		$tmp = "title" . $i;
		$title = $_REQUEST[$tmp];
		if (!is_numeric($title)) {
			echo "<script> alert('请确认题目id是否包含非数字字符');</script>";
			echo "<meta http-equiv='Refresh' content='0;URL=./add_contest.php'>";
			exit;
		}
		$problem_id[] = $title;		
	}

	//连接数据库
	$conn = new Db();

	foreach($problem_id as $k => $v) {
		$data = [];
		$data = $conn->query("select pid,problem_name from problem_info where pid = '{$v}'");
		if (empty($data) || count($data) <= 0) {
			echo "<script> alert('请确认题目id是否正确');</script>";
			echo "<meta http-equiv='Refresh' content='0;URL=./add_contest.php'>";
			exit;
		}
	}
	@file_put_contents('/tmp/weijun.log',var_export($data,true)."\n",FILE_APPEND);

	$now = strtotime(date('Y-m-d H:i:s'));
	$start_time = strtotime($start_time);
	$end_time = strtotime($end_time);
	$sql = "insert into contest_info (contest_name,add_time,start_time,end_time,type) values ('{$contest_name}','{$now}','{$start_time}','{$end_time}','{$is_show}') ";
	

	$conn->query($sql);
	
	$cid = $conn->getInsertId();

	foreach($problem_id as $k => $v) {
		$show_pid = $k + 1000;
		$conn->query("insert into contest_problem_info (contest_id, pid, problem_name,show_pid,total_num,ac_num) values('{$cid}','{$data[$v-1]['pid']}','{$data[$v-1]['problem_name']}',
						'{$show_pid}','0','0')");
	}
	@file_put_contents('/tmp/weijun.log',var_export($problem_id,true)."\n",FILE_APPEND);
				
}

$smarty = new Smarty_Oj();

$is_login = 0;
if (isset($_SESSION['is_login'])) {
    $is_login = 1;
}

$user_name = '游客';
if (isset($_SESSION['user_name'])) {
    $user_name = $_SESSION['user_name'];
}
$smarty->assign('is_login',$is_login);
$smarty->assign('name',$user_name);
//$smarty->assign('data',$data);

$smarty->display('contest/add_contest.html');

?>
