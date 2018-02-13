<?php

$pid = (isset($_REQUEST['pid']) && is_numeric($_REQUEST['pid'])) ? $_REQUEST['pid'] : 0;

require_once (dirname(dirname(__FILE__)) . "/include/include.php");

$smarty = new Smarty_Oj();

//连接数据库
$conn = mysqli_connect($db_config['db_host'],$db_config['db_user'],$db_config['db_password'],$db_config['db_name']) or die('连接数据库失败！');
mysqli_set_charset($conn,"utf8");

//查询数据库
$result = mysqli_query($conn, "SELECT * FROM problem where pid = '{$pid}'");
$tmp_data = [];
while($row = mysqli_fetch_assoc($result)) {//mysqli_fetch_array
    $tmp_data[] = $row;
}

$data = array(
	'problem_name' => $tmp_data[0]['problem_name'],
	'description' => $tmp_data[0]['description'],
	'problem_input' => $tmp_data[0]['sample_input'],
	'problem_output' => $tmp_data[0]['sample_output'], 
);
$smarty->assign('data',$data);

$smarty->display('problem_detail.html');

?>
