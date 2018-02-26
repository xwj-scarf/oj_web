<?php

$cid = isset($_REQUEST['cid']) && !empty($_REQUEST['cid']) ? $_REQUEST['cid'] : 0;
require_once (dirname(dirname(__FILE__)) . "/include/include.php");

$smarty = new Smarty_Oj();

//连接数据库
$conn = mysqli_connect($db_config['db_host'],$db_config['db_user'],$db_config['db_password'],$db_config['db_name']) or die('连接数据库失败！');
mysqli_set_charset($conn,"utf8");


$result = $conn->query("select start_time from contest_info where contest_id = '{$cid}'");
$data = [];
while($row = mysqli_fetch_assoc($result)) {
	$data[] = $row;
}
$start_time = $data[0]['start_time'];

//查询数据库
$result = $conn->query("SELECT * FROM contest_submit_info where contest_id = '{$cid}' order by id");

$data = [];
while($row = mysqli_fetch_assoc($result)) {//mysqli_fetch_array
    $data[] = $row;
}

$pass = array();   //user => array()
$rank = array();   //user => array()


if ($data) {
	foreach($data as $k => $v) {
		if ($v['status'] == 6 && !in_array($v['pid'], $pass[$v['uid']])) {
			$rank[$v['uid']]['ac_num'] += 1;
			$rank[$v['uid']]['time'] += round(($v['add_time'] - $start_time + 20*60*$rank[$v['uid']][$v['pid']]) / 60);
			$pass[$v['uid']][] = $v['pid'];

		} else if ($v['status'] != 0 && $v['status'] != 6 && $v['status'] != 404 && !in_array($v['pid'],$pass[$v['uid']])) {
			$rank[$v['uid']][$v['pid']]+=1;
		}
	}
}

var_dump($rank);

var_dump($pass);
?>
