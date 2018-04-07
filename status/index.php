<?php
require_once(dirname(dirname(__FILE__)) . "/include/include.php");
$smarty = new Smarty_Oj();

$conn = new Db();

$pt = isset($_REQUEST['pt']) && is_numeric($_REQUEST['pt']) && $_REQUEST['pt']>0 ? $_REQUEST['pt'] : 1;
$page = 20; //每页显示20条
$page_num = 5; //5页
$sum = $conn->query("select count(1) as sum from submit_info");
$sum = $sum[0]['sum'];

$page_num = intval($sum / $page) + 1; //一共能显示多少页

if ($pt > $page_num) {
	$pt = $page_num;
}

$start_p = ($pt-1)*$page;

//查询数据库
$data = $conn->query( "SELECT submit_info.id as id ,problem_info.problem_name as problem_name,problem_info.pid as pid,
									  user_info.user_name as user_name, submit_info.time_use as time_use,
									  submit_info.memory_use as memory_use, submit_info.status as status,
									  submit_info.add_time as add_time  
									 FROM submit_info, problem_info,user_info 
							   where submit_info.pid = problem_info.pid and submit_info.uid = user_info.id
					  		   ORDER BY submit_info.id DESC limit {$start_p},$page
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

$page_begin = intval($pt / 5) * 5;
$page_end = $page_begin + 5;
$smarty->assign('page_begin',$page_begin);
$smarty->assign('page_end',$page_end);
$smarty->assign('is_login',$is_login);
$smarty->assign('name',$user_name);
$smarty->assign('pt',$pt);
$smarty->assign('page_num',$page_num);
$smarty->assign('data',$data);
$smarty->display('status/status.html');

?>
