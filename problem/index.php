<?php

require_once (dirname(dirname(__FILE__)) . "/include/include.php");

$smarty = new Smarty_Oj();

$conn = new Db();

if (in_array($_SESSION['user_name'],$admin_arr)) {
    $data = $conn->query("SELECT * FROM problem_info");
} else {
	$data = $conn->query("SELECT * FROM problem_info where is_show = 1");
}

if ($data) {
	foreach($data as $k => $v) {
		if ($v['total_num'] != 0) {
			$data[$k]['pass_percent'] = round($v['ac_num'] / $v['total_num'] * 100,2);
		} else {
			$data[$k]['pass_percent'] = 0;
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

$smarty->display('problem.html');


?>
