<?php

$pid = (isset($_REQUEST['problem_id']) && !empty($_REQUEST['problem_id'])) ? $_REQUEST['problem_id'] : 0;

require_once(dirname(dirname(__FILE__)) . "/include/include.php");

$smarty = new Smarty_Oj();

//连接数据库
$conn = mysqli_connect($db_config['db_host'],$db_config['db_user'],$db_config['db_password'],$db_config['db_name']) or die('连接数据库失败！');
mysqli_set_charset($conn,"utf8");


//@file_put_contents('/tmp/weijun.log',var_export($_REQUEST,true)."\n",FILE_APPEND);
if (isset($_REQUEST['op']) && !empty($_REQUEST['op'])) {
	//@file_put_contents('/tmp/weijun.log',var_export('asd',true)."\n",FILE_APPEND);
	$input = str_replace("\n","<br>",$_REQUEST['input']);
	$output = str_replace("\n","<br>",$_REQUEST['output']);
	
	$time = is_numeric($_REQUEST['time']) ? $_REQUEST['time'] : 0;
	$memory = is_numeric($_REQUEST['memory']) ? $_REQUEST['memory'] : 0;
	
	$conn->query("update problem_info set problem_name = '{$_REQUEST['problem_name']}', problem_description = '{$_REQUEST['description']}',
				problem_sample_input = '{$input}', problem_sample_output = '{$output}',time_limit = '{$time}',memory_limit = '{$memory}',is_show = '{$_REQUEST['is_show']}' 
				 where pid = '{$_REQUEST['problem_id']}'");

	echo "<script> alert('编辑成功'); </script>";
    echo "<meta http-equiv='Refresh' content='0;URL=/oj_web/problem/detail.php?pid={$_REQUEST['problem_id']}'>";
    exit;
	
}

//查询数据库
$result = mysqli_query($conn, "SELECT * FROM problem_info where pid = '{$pid}'");
$tmp_data = [];
while($row = mysqli_fetch_assoc($result)) {//mysqli_fetch_array
    $tmp_data[] = $row;
}

$data = array(
    'problem_name' => $tmp_data[0]['problem_name'],
    'description' => $tmp_data[0]['problem_description'],
    'problem_input' => $tmp_data[0]['problem_sample_input'],
    'problem_output' => $tmp_data[0]['problem_sample_output'],
	'time_limit' => $tmp_data[0]['time_limit'],
	'memory_limit' => $tmp_data[0]['memory_limit'],
); 

if ($data) {
	$data['problem_input'] = str_replace("<br>","",$data['problem_input']);
	$data['problem_output'] = str_replace("<br>","",$data['problem_output']);
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
$smarty->display('problem_edit.html');
?>
