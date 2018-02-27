<?php
require_once(dirname(__FILE__) . "/include/include.php");

$smarty = new Smarty_Oj();

$user_name = $_REQUEST['user_name'];
$password = $_REQUEST['password'];

if (isset($user_name) && !empty($user_name) && isset($password) && !empty($password)) {
	$conn = mysqli_connect($db_config['db_host'],$db_config['db_user'],$db_config['db_password'],$db_config['db_name']) or die('连接数据库失败！');
	mysqli_set_charset($conn,"utf8");

	$result = $conn->query("SELECT id,user_name FROM user_info WHERE user_name = '{$user_name}' and password = '{$password}'");
    
	while ($row = $result->fetch_assoc()) {
    	$name = $row['user_name'];
		$id = $row['id'];
	}

	if (isset($name) && !empty($name)) {
		//登陆成功
		$_SESSION['user_name'] = $name;
		$_SESSION['user_id'] = $id;
		$_SESSION['is_login'] = 1;
		echo "<script> alert('登陆成功'); </script>"; 
		echo "<meta http-equiv='Refresh' content='0;URL=.'>"; 
		exit;	
	} else {
		echo "<script> alert('账号或密码错误，请重新输入'); </script>"; 
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
$smarty->assign('name',$user_name);
$smarty->assign('is_login',$is_login);
$smarty->display('login.html');


?>
