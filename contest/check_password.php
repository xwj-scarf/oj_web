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

if ($_SESSION['cid'] == 1) {
    echo "<meta http-equiv='Refresh' content='0;URL=/oj_web/contest/detail.php?cid=$cid'>";
}

if (!isset($_REQUEST['password']) || empty($_REQUEST['password'])) {
	$smarty->assign('cid',$cid);
	$smarty->display("contest/check_password.html");
	exit;
}

$password = isset($_REQUEST['password']) && !empty($_REQUEST['password']) ? $_REQUEST['password'] : "";

$db = new Db();

$sql = "select password from contest_info where contest_id = '{$cid}'";
@file_put_contents('/tmp/weijun.log',var_export($sql,true)."\n",FILE_APPEND);

$data = $db->query($sql)[0];

@file_put_contents('/tmp/weijun.log',var_export($data,true)."\n",FILE_APPEND);
@file_put_contents('/tmp/weijun.log',var_export($password,true)."\n",FILE_APPEND);

if ($data['password'] == $password) {
	$_SESSION['cid'] = 1;
    echo "<script> alert('密码正确'); </script>";
    echo "<meta http-equiv='Refresh' content='0;URL=/oj_web/contest/detail.php?cid=$cid'>";

} else {
    echo "<script> alert('密码错误'); </script>";
    echo "<meta http-equiv='Refresh' content='0;URL=/oj_web/contest/check_password.php?cid=$cid'>";
}

?>
