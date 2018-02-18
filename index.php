<?php
require_once(dirname(__FILE__) . "/include/include.php");
$smarty = new Smarty_Oj();


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

$smarty->display('home.html');


?>
