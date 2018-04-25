<?php

$pid = (isset($_REQUEST['problem_id']) && !empty($_REQUEST['problem_id'])) ? $_REQUEST['problem_id'] : 0;

require_once(dirname(dirname(__FILE__)) . "/include/include.php");

$smarty = new Smarty_Oj();

$conn = new Db();

//@file_put_contents('/tmp/weijun.log',var_export($_REQUEST,true)."\n",FILE_APPEND);
if (isset($_REQUEST['op']) && !empty($_REQUEST['op'])) {
	$sample_input = str_replace("\n","<br>",$_REQUEST['sample_input']);
	$sample_output = str_replace("\n","<br>",$_REQUEST['sample_output']);
	$output = str_replace("\n","<br>",$_REQUEST['output']);
	$input = str_replace("\n","<br>",$_REQUEST['input']);
	$description = str_replace("\n","<br>",$_REQUEST['description']);

	$time = is_numeric($_REQUEST['time']) ? $_REQUEST['time'] : 0;
	$memory = is_numeric($_REQUEST['memory']) ? $_REQUEST['memory'] : 0;
    $remark = $_REQUEST['remark'];	
	$conn->query("update problem_info set problem_name = '{$_REQUEST['problem_name']}', problem_description = '{$description}',
                    input = '{$input}' , output = '{$output}',
                problem_sample_input = '{$sample_input}', problem_sample_output = '{$sample_output}',
                time_limit = '{$time}',memory_limit = '{$memory}',is_show = '{$_REQUEST['is_show']}' , remark = '{$remark}'
				 where pid = '{$_REQUEST['problem_id']}'");

	echo "<script> alert('编辑成功'); </script>";
    echo "<meta http-equiv='Refresh' content='0;URL=/oj_web/problem/detail.php?pid={$_REQUEST['problem_id']}'>";
    exit;
	
}

$tmp_data = $conn->query("SELECT * FROM problem_info where pid = '{$pid}'");

$data = array(
    'problem_name' => $tmp_data[0]['problem_name'],
    'description' => $tmp_data[0]['problem_description'],
    'problem_input' => $tmp_data[0]['problem_sample_input'],
    'problem_output' => $tmp_data[0]['problem_sample_output'],
	'time_limit' => $tmp_data[0]['time_limit'],
	'memory_limit' => $tmp_data[0]['memory_limit'],
	'input' => $tmp_data[0]['input'],
    'output' => $tmp_data[0]['output'],
    'remark' => $tmp_data[0]['remark'],
); 

if ($data) {
	foreach($data as $k => $v) {
		$data[$k] = str_replace("<br>","",$v);
	}
	
}

$smarty->assign('data',$data);

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
$smarty->assign('problem_id',$pid);
$smarty->display('problem/problem_edit.html');
?>
