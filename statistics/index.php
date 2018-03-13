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

$db = new Db();

$user_id = $_SESSION['user_id'];
$sql = "select * from user_statistic where uid = '{$user_id}' and is_contest = 0";
$data = $db->query($sql)[0];

$smarty->assign('ac_count',$data['ac_count']);
$smarty->assign('wa_count',$data['wa_count']);
$smarty->assign('tle_count',$data['tle_count']);
$smarty->assign('mle_count',$data['mle_count']);
$smarty->assign('ce_count',$data['ce_count']);
$smarty->assign('re_count',$data['re_count']);
$smarty->assign('total_count',$data['total_count']);

$sql = "select * from user_statistic where uid = '{$user_id}' and is_contest = 1";
$data = $db->query($sql)[0];

$smarty->assign('c_ac',$data['ac_count']);
$smarty->assign('c_wa',$data['wa_count']);
$smarty->assign('c_tle',$data['tle_count']);
$smarty->assign('c_mle',$data['mle_count']);
$smarty->assign('c_ce',$data['ce_count']);
$smarty->assign('c_re',$data['re_count']);
$smarty->assign('c_total',$data['total_count']);


$smarty->assign('name',$user_name);
$smarty->assign('is_login',$is_login);
$smarty->display('statistics.html');


?>
