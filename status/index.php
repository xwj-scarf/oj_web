<?php
require_once(dirname(dirname(__FILE__)) . "/include/include.php");
$smarty = new Smarty_Oj();
//连接数据库
$conn = mysqli_connect($db_config['db_host'],$db_config['db_user'],$db_config['db_password'],$db_config['db_name']) or die('连接数据库失败！');
mysqli_set_charset($conn,"utf8");


$pt = isset($_REQUEST['pt']) && is_numeric($_REQUEST['pt']) && $_REQUEST['pt']>0 ? $_REQUEST['pt'] : 1;
$page = 20; //每页显示50条
$sum = [];
$result = $conn->query("select count(1) as sum from submit_info");
while($row = mysqli_fetch_assoc($result)) {
	$sum[] = $row;
}

$sum = $sum[0]['sum'];

$page_num = intval($sum / $page) + 1;

if ($pt > $page_num) {
	$pt = $page_num;
}

$start_p = ($pt-1)*$page;

//查询数据库
$result = mysqli_query($conn, "SELECT submit_info.id as id ,problem_info.problem_name as problem_name,problem_info.pid as pid,
									  user_info.user_name as user_name, submit_info.time_use as time_use,
									  submit_info.memory_use as memory_use, submit_info.status as status,
									  submit_info.add_time as add_time  
									 FROM submit_info, problem_info,user_info 
							   where submit_info.pid = problem_info.pid and submit_info.uid = user_info.id
					  		   ORDER BY submit_info.id DESC limit {$start_p},$page
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
$smarty->assign('pt',$pt);
$smarty->assign('page_num',$page_num);
$smarty->assign('data',$data);
$smarty->display('status.html');

?>
