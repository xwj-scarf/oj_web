<?php

$pid = (isset($_REQUEST['pid']) && is_numeric($_REQUEST['pid'])) ? $_REQUEST['pid'] : 0;

require_once (dirname(dirname(__FILE__)) . "/include/include.php");

$smarty = new Smarty_Oj();

//连接数据库
$conn = mysqli_connect($db_config['db_host'],$db_config['db_user'],$db_config['db_password'],$db_config['db_name']) or die('连接数据库失败！');
mysqli_set_charset($conn,"utf8");

//查询数据库
$result = mysqli_query($conn, "SELECT * FROM problem_info where pid = '{$pid}'");
$tmp_data = [];
while($row = mysqli_fetch_assoc($result)) {//mysqli_fetch_array
    $tmp_data[] = $row;
}

$data = array(
	'problem_name' => $tmp_data[0]['problem_name'],
	'description' => $tmp_data[0]['problem_description'],
	'problem_input' => $tmp_data[0]['problem_sample_input'],
	'problem_output' => $tmp_data[0]['problem_sample_output'], 
    'time_limit' => $tmp_data[0]['time_limit'],
    'memory_limit' => $tmp_data[0]['memory_limit'],
);
$smarty->assign('data',$data);
$is_login = 0;
if (isset($_SESSION['is_login'])) {
    $is_login = 1;
}

$user_name = '游客';
if (isset($_SESSION['user_name'])) {
    $user_name = $_SESSION['user_name'];
}

if (in_array($_SESSION['user_name'],$admin_arr)) {
	$smarty->assign('is_admin',1);
}

$smarty->assign('is_login',$is_login);
$smarty->assign('name',$user_name);
$smarty->assign('problem_id',$pid);
$smarty->display('problem_detail.html');

?>
