<?php

$cid = isset($_REQUEST['cid']) && !empty($_REQUEST['cid']) ? $_REQUEST['cid'] : 0;
$pid = isset($_REQUEST['pid']) && !empty($_REQUEST['pid']) ? $_REQUEST['pid'] : 0;

require_once (dirname(dirname(__FILE__)) . "/include/include.php");

$smarty = new Smarty_Oj();

$conn = new Db();

//查询数据库
$tmp_data = $conn->query( "SELECT a.problem_name,a.problem_description,a.problem_sample_input,a.problem_sample_output,
								a.time_limit,a.memory_limit,a.input,a.output  FROM problem_info a,contest_problem_info b
								where
								b.contest_id = '{$cid}' and b.show_pid = '{$pid}' and b.pid = a.pid ");

$data = array(
    'problem_name' => $tmp_data[0]['problem_name'],
    'description' => $tmp_data[0]['problem_description'],
    'problem_input' => $tmp_data[0]['problem_sample_input'],
    'problem_output' => $tmp_data[0]['problem_sample_output'],
    'time_limit' => $tmp_data[0]['time_limit'],
    'memory_limit' => $tmp_data[0]['memory_limit'],
    'input' => $tmp_data[0]['input'],
    'output' => $tmp_data[0]['output'],
);

$smarty->assign('data',$data);
$is_login = 0;
if (isset($_SESSION['is_login'])) {
    $is_login = 1;
}

$user_name = '游客';
if (isset($_SESSION['user_name'])) {
    $user_name = $_SESSION['user_name'];
}

$smarty->assign('cid',$cid);
$smarty->assign('is_login',$is_login);
$smarty->assign('name',$user_name);
$smarty->assign('problem_id',$pid);
$smarty->display('contest/contest_problem_detail.html');
?>
