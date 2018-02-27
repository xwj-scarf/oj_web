<?php
require_once(dirname(__FILE__) . "/include/include.php");

$smarty = new Smarty_Oj();

$user_name = $_REQUEST['user_name'];
$password = $_REQUEST['password'];
$sec_password = $_REQUEST['sec_password'];

if (!empty($password) && !empty($sec_password) && !empty($user_name) && $password == $sec_password) {
	$conn = mysqli_connect($db_config['db_host'],$db_config['db_user'],$db_config['db_password'],$db_config['db_name']) or die('连接数据库失败！');
	mysqli_set_charset($conn,"utf8");
	$result = $conn->query("insert into user_info (user_name,password) values('{$user_name}','{$password}')");
	if (!$result) {
	    echo "<script> alert('注册失败,用户名重复'); </script>";
        echo "<meta http-equiv='Refresh' content='0;URL=/oj_web/register.php'>";
		exit;	
	} else {
	    echo "<script> alert('注册成功'); </script>";
        echo "<meta http-equiv='Refresh' content='0;URL=.'>";	
		exit;
	}
}
if (!empty($user_name) || !empty($password) || !empty($sec_password)) {
        echo "<script> alert('注册失败'); </script>";
        echo "<meta http-equiv='Refresh' content='0;URL=/oj_web/register.php'>";  
		exit; 
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
//$smarty->assign('data',$data);

$smarty->display('register.html');

?>
