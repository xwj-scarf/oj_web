<?php
require_once(dirname(dirname(__FILE__)) . "/include/include.php");

$db = new Db();

$sql = "select id from user_info";

$data = $db->query($sql);

foreach($data as $k => $v) {
	$uid = $v['id'];
	$sql = "select  (select count(1) from contest_submit_info where status = 1 and uid='{$uid}') as ce_count, 
				    (select count(1) from contest_submit_info where status = 2 and uid = '{$uid}') as wa_count,
					(select count(1) from contest_submit_info where status = 3 and uid = '{$uid}') as tle_count,
					(select count(1) from contest_submit_info where status = 4 and uid = '{$uid}') as mle_count,
					(select count(1) from contest_submit_info where status = 5 and uid = '{$uid}') as re_count,
					(select count(1) from contest_submit_info where status = 6 and uid = '{$uid}') as ac_count,
					(select count(1) from contest_submit_info where status = 404 and uid = '{$uid}') as other_count 
		";
	$tmp_data = $db->query($sql)[0];

	$ac_count = $tmp_data['ac_count'];
	$wa_count = $tmp_data['wa_count'];
	$ce_count = $tmp_data['ce_count'];
	$tle_count = $tmp_data['tle_count'];
	$mle_count = $tmp_data['mle_count'];
	$re_count = $tmp_data['re_count'];
	$other_count = $tmp_data['other_count'];
	$total = $ac_count + $wa_count + $ce_count + $tle_count + $mle_count + $re_count + $other_count;
	$sql = "insert into user_statistic (uid,is_contest,total_count,ac_count,wa_count,ce_count,tle_count,mle_count,re_count,other_count) values('{$uid}',1,'{$total}','{$ac_count}','{$wa_count}',
			'{$ce_count}','{$tle_count}','{$mle_count}','{$re_count}','{$other_count}')";
	$db->query($sql);
@file_put_contents('/tmp/weijun.log',var_export($tmp_data,true)."\n",FILE_APPEND);

}

?>
