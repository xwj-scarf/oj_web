<?php
require_once(dirname(__FILE__) . "/include/include.php");

$smarty = new Smarty_Oj();

if (!empty($_REQUEST)) {
	$user_name = $_REQUEST['user_name'];
	$password = $_REQUEST['password'];
	$sec_password = $_REQUEST['sec_password'];
	$unickname = $_REQUEST['unickname'];

	if (empty($unickname)) {
		echo "<script> alert('请设置昵称'); </script>";
		echo "<meta http-equiv='Refresh' content='0;URL=/oj_web/register.php'>";
		exit;	
	}

	$db = new Db();
	$sql = "select unick_name from user_info where unick_name = '{$unickname}'";
	$result = $db->query($sql);
	if (!empty($result)) {
		echo "<script> alert('昵称重复'); </script>";
		echo "<meta http-equiv='Refresh' content='0;URL=/oj_web/register.php'>";
		exit;	
	}
		
	if (!empty($password) && !empty($sec_password) && !empty($user_name) && $password == $sec_password) {
		$result = $db->query("insert into user_info (user_name,password,unick_name) values('{$user_name}','{$password}','{$unickname}')");
		if (!$result) {
			echo "<script> alert('注册失败,用户名重复'); </script>";
			echo "<meta http-equiv='Refresh' content='0;URL=/oj_web/register.php'>";
			exit;	
		} else {
			$_SESSION['user_id'] = $db->getInsertId();
			$_SESSION['is_login'] = 1;
			$_SESSION['user_name'] = $user_name;
		}
		$uid = $db->getInsertId();
		$result = $db->query("insert into user_statistic (uid,is_contest) values('{$uid}',0)");
		$result1 = $db->query("insert into user_statistic (uid,is_contest) values('{$uid}',1)");
		echo "<script> alert('注册成功'); </script>";
		echo "<meta http-equiv='Refresh' content='0;URL=.'>";	
		exit;
	}

	if (!empty($user_name) || !empty($password) || !empty($sec_password)) {
		echo "<script> alert('注册失败'); </script>";
		echo "<meta http-equiv='Refresh' content='0;URL=/oj_web/register.php'>";  
		exit; 
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

$smarty->display('register.html');

?>
