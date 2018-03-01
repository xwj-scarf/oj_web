<?php
require_once(dirname(dirname(__FILE__)) . "/include/include.php");

$cid = isset($_REQUEST['cid']) && !empty($_REQUEST['cid']) ? $_REQUEST['cid'] : 0;
$page = 20; //每页显示50条

$sum = [];
//连接数据库
$conn = new Db();

$sum = $conn->query("select count(1) as sum from contest_submit_info where contest_id = '{$cid}'");
$sum = $sum[0]['sum'];

$page_num = intval($sum / $page) + 1;
$pt = isset($_REQUEST['pt']) && is_numeric($_REQUEST['pt']) && $_REQUEST['pt']>0 ? $_REQUEST['pt'] : 1;
if ($pt > $page_num) {
	$pt = $page_num;
}

$start_p = ($pt-1)*$page;

$smarty = new Smarty_Oj();

//查询数据库
$data = $conn->query("SELECT DISTINCT(contest_submit_info.id) as id ,contest_problem_info.problem_name as problem_name,contest_problem_info.show_pid as pid,
									  user_info.user_name as user_name,  contest_submit_info.time_use as time_use,
									  contest_submit_info.memory_use as memory_use, contest_submit_info.status as status,
									  contest_submit_info.add_time as add_time 
									 FROM contest_submit_info, contest_problem_info,user_info 
							   where contest_submit_info.pid = contest_problem_info.show_pid and contest_submit_info.uid = user_info.id  and contest_submit_info.contest_id = '{$cid}'
					  		   ORDER BY contest_submit_info.id DESC limit {$start_p},$page
					  ");

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

$smarty->assign('pt',$pt);
$smarty->assign('page_num',$page_num);

$smarty->assign('is_login',$is_login);
$smarty->assign('name',$user_name);
$smarty->assign('cid',$cid);
$smarty->assign('data',$data);
$smarty->display('contest_status.html');

?>
