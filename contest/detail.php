<?php

$cid = (isset($_REQUEST['cid']) && is_numeric($_REQUEST['cid']) && !empty($_REQUEST['cid'])) ? $_REQUEST['cid'] : 0;
$cname = (isset($_REQUEST['cname']) && !empty($_REQUEST['cname'])) ? $_REQUEST['cname'] : "";

require_once (dirname(dirname(__FILE__)) . "/include/include.php");

$smarty = new Smarty_Oj();

//连接数据库
$conn = mysqli_connect($db_config['db_host'],$db_config['db_user'],$db_config['db_password'],$db_config['db_name']) or die('连接数据库失败！');
mysqli_set_charset($conn,"utf8");

//查询数据库
$result = $conn->query("SELECT * FROM contest_problem_info where contest_id = '{$cid}'");

$data = [];
while($row = mysqli_fetch_assoc($result)) {//mysqli_fetch_array
    $data[] = $row;
}

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
$smarty->assign('cid',$cid);
$smarty->assign('is_login',$is_login);
$smarty->assign('name',$user_name);
$smarty->assign('problem_id',$pid);
$smarty->display('contest_detail.html');

?>
