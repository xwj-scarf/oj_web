<?php
require_once(dirname(dirname(__FILE__)) . "/include/include.php");
$smarty = new Smarty_Oj();

$smarty->assign('is_login',1);
$smarty->assign('name','weijunweijunweijun');

//连接数据库
$conn = mysqli_connect($db_config['db_host'],$db_config['db_user'],$db_config['db_password'],$db_config['db_name']) or die('连接数据库失败！');
mysqli_set_charset($conn,"utf8");


//查询数据库
$result = mysqli_query($conn, "SELECT * FROM submit_info, problem_info where submit_info.pid = problem_info.pid");
$data = [];
while($row = mysqli_fetch_assoc($result)) {//mysqli_fetch_array
    $data[] = $row;
}

$smarty->assign('data',$data);
$smarty->display('status.html');

?>
