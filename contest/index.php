<?php

@file_put_contents('/tmp/weijun.log',var_export($_REQUEST,true)."\n",FILE_APPEND);
require_once (dirname(dirname(__FILE__)) . "/include/include.php");

$smarty = new Smarty_Oj();


//连接数据库
$conn = new Db();
//查询数据库
$data = $conn->query("SELECT * FROM contest_info");

$type_arr = array(
	0 => "公开",
	1 => "私有",
);

$now = strtotime(date('Y-m-d H:i:s'));

if ($data) {
    foreach($data as $k => $v) {
		//@file_put_contents('/tmp/weijun.log',var_export($type_arr['0'],true)."\n",FILE_APPEND);
		$data[$k]['is_private'] = $v['type'];
		$data[$k]['type'] = $type_arr[$v['type']];
		$data[$k]['start_time'] = date('Y-m-d H:i:s',$v['start_time']);
		$data[$k]['end_time'] = date('Y-m-d H:i:s',$v['end_time']);

		if ($now > $v['end_time']) {
			$data[$k]['status'] = "已结束";
		} else if ($now < $v['end_time'] && $now > $v['start_time']) {
			$data[$k]['status'] = "进行中";
		} else {
			$data[$k]['status'] = "未开始";
		}
    }
}

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
$smarty->assign('data',$data);

$smarty->display('contest/contest.html');

?>
