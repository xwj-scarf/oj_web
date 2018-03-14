<?php

@file_put_contents('/tmp/weijun.log',var_export($_REQUEST,true)."\n",FILE_APPEND);

$cid = (isset($_REQUEST['cid']) && is_numeric($_REQUEST['cid']) && !empty($_REQUEST['cid'])) ? $_REQUEST['cid'] : 0;
$cname = (isset($_REQUEST['cname']) && !empty($_REQUEST['cname'])) ? $_REQUEST['cname'] : "";

require_once (dirname(dirname(__FILE__)) . "/include/include.php");

$smarty = new Smarty_Oj();

//连接数据库
$conn = new Db();
//查询数据库
$data = $conn->query("SELECT * FROM contest_problem_info where contest_id = '{$cid}'");

if ($data) {
    foreach($data as $k => $v) {
		$data[$k]['pid'] = $v['show_pid'];
        if ($v['total_num'] != 0) {
            $data[$k]['pass_percent'] = round($v['ac_num'] / $v['total_num'] * 100,2);
        } else {
            $data[$k]['pass_percent'] = 0;
        }
    }
}

$tmp = $conn->query("select start_time,end_time from contest_info where contest_id = '{$cid}'");

$now = strtotime(date('Y-m-d H:i:s'));
if ($now >= $tmp[0]['end_time']) {
	$time_rate = 100;
} else {	
	$time_rate = round(($now-$tmp[0]['start_time']) / ($tmp[0]['end_time']-$tmp[0]['start_time'])*100);
}

$smarty->assign('time_rate',$time_rate);
$smarty->assign('contest_name',$cname);
$smarty->assign('data',$data);
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
}

$smarty->assign('is_securt',1);
$smarty->assign('start_time',date('Y-m-d H:i:s',$tmp[0]['start_time']));
$smarty->assign('end_time',date('Y-m-d H:i:s',$tmp[0]['end_time']));
$smarty->assign('cid',$cid);
$smarty->assign('is_login',$is_login);
$smarty->assign('name',$user_name);
$smarty->display('contest_detail.html');

?>
