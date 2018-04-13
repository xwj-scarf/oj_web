<?php
require_once (dirname(dirname(__FILE__)) . "/include/include.php");
$smarty = new Smarty_Oj();

$is_login = 0;
if (isset($_SESSION['is_login'])) {
        $is_login = 1;
}
$user_name = '游客';
if (isset($_SESSION['user_name'])) {
    $user_name = $_SESSION['user_name'];
}
$smarty->assign('name',$user_name);
$smarty->assign('is_login',$is_login);

$cid = isset($_REQUEST['cid']) && !empty($_REQUEST['cid']) ? $_REQUEST['cid'] : 0;

if ($_SESSION['cid'][$cid] == 1) {
    echo "<meta http-equiv='Refresh' content='0;URL=/oj_web/contest/detail.php?cid=$cid'>";
}

//已经注册，不用输入密码直接进入
$db = new Db();
$sql = "select id from contest_register_user_info where contest_id = '{$cid}' and user_name = '{$user_name}'";
$data = $db->query($sql);
if (!empty($data)) {
	$_SESSION['cid'][$cid] = 1;
	echo "<meta http-equiv='Refresh' content='0;URL=/oj_web/contest/detail.php?cid=$cid'>";
	exit;
}

//创建比赛的用户不用输入密码直接进入
$sql = "select add_user from contest_info where contest_id = '{$cid}'";
$data = $db->query($sql);
if (!empty($data) && $data[0]['add_user'] == $_SESSION['user_name']) {
	$_SESSION['cid'][$cid] = 1;
    echo "<meta http-equiv='Refresh' content='0;URL=/oj_web/contest/detail.php?cid=$cid'>";
	exit;
}

if (!isset($_REQUEST['password']) || empty($_REQUEST['password'])) {
	$smarty->assign('cid',$cid);
	$smarty->display("contest/check_password.html");
	exit;
}

$password = isset($_REQUEST['password']) && !empty($_REQUEST['password']) ? $_REQUEST['password'] : "";

$db = new Db();

$sql = "select password from contest_info where contest_id = '{$cid}'";

$data = $db->query($sql)[0];

if ($data['password'] == $password) {
	$_SESSION['cid'][$cid] = 1;

    echo "<script> alert('密码正确'); </script>";
    echo "<meta http-equiv='Refresh' content='0;URL=/oj_web/contest/detail.php?cid=$cid'>";

} else {
    echo "<script> alert('密码错误'); </script>";
    echo "<meta http-equiv='Refresh' content='0;URL=/oj_web/contest/check_password.php?cid=$cid'>";
}

?>
