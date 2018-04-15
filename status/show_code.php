<?php

require_once(dirname(dirname(__FILE__)) . "/include/include.php");
$smarty = new Smarty_Oj();

$sid = (!empty($_REQUEST['sid']) && is_numeric($_REQUEST['sid'])) ? $_REQUEST['sid'] : 0;

if (!isset($_SESSION['user_id']) || !isset($_SESSION['user_name']) || empty($_SESSION['user_name']) || empty($_SESSION['user_id'])) {
	echo "<script> alert('尚未登陆');</script>";
	echo "<meta http-equiv='Refresh' content='0;URL=.'>";
	exit;
}

$db = new Db();
$sql = "select uid,code_path from submit_info where id = '{$sid}'";
$data = $db->query($sql);

if ($data[0]['uid'] != $_SESSION['user_id']) {
	echo "<script> alert('你尚无权限查看别人的代码');</script>";
	echo "<meta http-equiv='Refresh' content='0;URL=.'>";
	exit;
}

if (!isset($data[0]['code_path']) || empty($data[0]['code_path']) || !file_exists($data[0]['code_path'])) {
	echo "<script> alert('暂时找不到代码，请联系管理员');</script>";
	echo "<meta http-equiv='Refresh' content='0;URL=.'>";
	exit;
}

$data = file_get_contents($data[0]['code_path']);

$data = str_replace("\n","<br>",$data);
$data = str_replace(" ","&nbsp",$data);
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
} else {
    $smarty->assign('is_admin',0);
}

$smarty->assign('is_login',$is_login);
$smarty->assign('name',$user_name);

$smarty->assign('data',$data);
$smarty->display('contest/show_code.html');
?>
