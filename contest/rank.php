<?php

$cid = isset($_REQUEST['cid']) && !empty($_REQUEST['cid']) ? $_REQUEST['cid'] : 0;
require_once (dirname(dirname(__FILE__)) . "/include/include.php");

$smarty = new Smarty_Oj();

//连接数据库
$conn = new Db();

$data = $conn->query("select start_time from contest_info where contest_id = '{$cid}'");

$start_time = $data[0]['start_time'];

//查询数据库
$data = $conn->query("SELECT a.id,a.contest_id,a.uid,a.pid,a.status,a.add_time,b.user_name FROM contest_submit_info a,user_info b where contest_id = '{$cid}' and a.uid = b.id order by a.id");

$problem_list = $conn->query("select show_pid from contest_problem_info where contest_id = '{$cid}'");

$pass = array();   //user => array()
$submit = array();
$rank = array();   //user => array()

$pass_time = array();

if ($data) {
	foreach($data as $k => $v) {
		$rank[$v['uid']]['user_name'] = $v['user_name'];
		if ($v['status'] == 6 && !in_array($v['pid'], $pass[$v['uid']])) {
			$rank[$v['uid']]['ac_num'] += 1;
			$rank[$v['uid']]['time'] += round(($v['add_time'] - $start_time + 20*60*$rank[$v['uid']][$v['pid']]) / 60);
			$pass[$v['uid']][] = $v['pid'];
			$submit[$v['uid']][] = $v['pid'];
			$pass_time[$v['uid']][$v['pid']] = secToTime(($v['add_time'] - $start_time));
		} else if ($v['status'] != 0 && $v['status'] != 6 && $v['status'] != 404 && !in_array($v['pid'],$pass[$v['uid']])) {
			$rank[$v['uid']][$v['pid']]+=1;
			$submit[$v['uid']][] = $v['pid'];
		}
	}
}

ksort($rank,'compare');

$count = 1;
if ($rank) {
	foreach($rank as $k => $v) {
		$rank[$k]['rank'] = $count;
		$count++;
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

$smarty->assign('cid',$cid);
$smarty->assign('pass',$pass);
$smarty->assign('is_login',$is_login);
$smarty->assign('name',$user_name);
$smarty->assign('rank',$rank);
$smarty->assign('submit',$submit);
$smarty->assign('pass_time',$pass_time);
$smarty->assign('problem_list',$problem_list);
$smarty->display('contest/contest_rank.html');


function compare($a,$b) {
	if ($a['ac_num'] > $b['ac_num']) {
		return -1;
	} else if ($a['ac_num'] == $b['ac_num']) {
		if ($a['time'] < $b['time']) {
			return -1;
		} else {
			return 1;
		}
	}
	return 1;
}

function secToTime($times){  
        $result = '00:00:00';  
        if ($times>0) {  
                $hour = floor($times/3600);  
                $minute = floor(($times-3600 * $hour)/60);  
                $second = floor((($times-3600 * $hour) - 60 * $minute) % 60);  
				if ($hour < 10) {
					$hour = "0" . $hour;
				}
				if ($minute < 10) {
					$minute = "0" . $minute;
				}
				if ($second < 10) {
					$second = "0" . $second;
				} 
                $result = $hour.':'.$minute.':'.$second;  
        }  
        return $result;  
}  

?>
