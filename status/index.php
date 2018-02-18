<?php
require_once(dirname(dirname(__FILE__)) . "/include/include.php");
$smarty = new Smarty_Oj();


//连接数据库
$conn = mysqli_connect($db_config['db_host'],$db_config['db_user'],$db_config['db_password'],$db_config['db_name']) or die('连接数据库失败！');
mysqli_set_charset($conn,"utf8");


//查询数据库
$result = mysqli_query($conn, "SELECT submit_info.id as id ,problem_info.problem_name as problem_name,
									  user_info.user_name as user_name, submit_info.time_use as time_use,
									  submit_info.memory_use as memory_use, submit_info.status as status 
									 FROM submit_info, problem_info,user_info 
							   where submit_info.pid = problem_info.pid and submit_info.uid = user_info.id 
					  		   ORDER BY submit_info.id DESC
					  ");
$data = [];
while($row = mysqli_fetch_assoc($result)) {//mysqli_fetch_array
    $data[] = $row;
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
$smarty->display('status.html');

?>
