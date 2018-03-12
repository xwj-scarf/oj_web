<?php
require_once(dirname(dirname(__FILE__)) . "/include/include.php");

$smarty = new Smarty_Oj();

$is_login = 0;
if (isset($_SESSION['is_login'])) {
	$is_login = 1;
}

$user_name = '游客';
if (isset($_SESSION['user_name'])) {
    $user_name = $_SESSION['user_name'];
}

$smarty->assign('ac_count',1000);
$smarty->assign('wa_count',1000);
$smarty->assign('tle_count',1000);
$smarty->assign('mle_count',1000);
$smarty->assign('ce_count',1000);

$smarty->assign('name',$user_name);
$smarty->assign('is_login',$is_login);
$smarty->display('statistics.html');


?>
