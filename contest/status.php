<?php

$cid = isset($_REQUEST['cid']) && !empty($_REQUEST['cid']) ? $_REQUEST['cid'] : 0;

require_once(dirname(dirname(__FILE__)) . "/include/include.php");
$smarty = new Smarty_Oj();

//连接数据库
$conn = mysqli_connect($db_config['db_host'],$db_config['db_user'],$db_config['db_password'],$db_config['db_name']) or die('连接数据库失败！');
mysqli_set_charset($conn,"utf8");

//查询数据库
$result = mysqli_query($conn, "SELECT DISTINCT(contest_submit_info.id) as id ,contest_problem_info.problem_name as problem_name,contest_problem_info.show_pid as pid,
									  user_info.user_name as user_name,  contest_submit_info.time_use as time_use,
									  contest_submit_info.memory_use as memory_use, contest_submit_info.status as status,
									  contest_submit_info.add_time as add_time 
									 FROM contest_submit_info, contest_problem_info,user_info 
							   where contest_submit_info.pid = contest_problem_info.show_pid and contest_submit_info.uid = user_info.id  and contest_submit_info.contest_id = '{$cid}'
					  		   ORDER BY contest_submit_info.id DESC
					  ");
$data = [];
while($row = mysqli_fetch_assoc($result)) {//mysqli_fetch_array
    $data[] = $row;
}

if ($data) {
	foreach($data as $k => $v) {
		$data[$k]['add_time'] = date("Y-m-d H:i:s",intval($v['add_time']));
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
$smarty->assign('cid',$cid);
$smarty->assign('data',$data);
$smarty->display('contest_status.html');

?>
