<?php

require_once (dirname(dirname(__FILE__)) . "/include/include.php");

$smarty = new Smarty_Oj();


/*
//连接数据库
$conn = mysqli_connect($db_config['db_host'],$db_config['db_user'],$db_config['db_password'],$db_config['db_name']) or die('连接数据库失败！');
mysqli_set_charset($conn,"utf8");


//查询数据库
$result = $conn->query("SELECT * FROM contest_info");

$data = [];
while($row = mysqli_fetch_assoc($result)) {//mysqli_fetch_array
    $data[] = $row;
}

$type_arr = array(
	0 => "公开",
	1 => "私有",
);

$now = strtotime(date('Y-m-d H:i:s'));

if ($data) {
    foreach($data as $k => $v) {
		//@file_put_contents('/tmp/weijun.log',var_export($type_arr['0'],true)."\n",FILE_APPEND);

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
*/
//@file_put_contents('/tmp/weijun.log',var_export($data,true)."\n",FILE_APPEND);

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

$smarty->display('add_contest.html');

?>
