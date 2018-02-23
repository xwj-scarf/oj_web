<?php

require_once (dirname(dirname(__FILE__)) . "/include/include.php");

//登陆后
if (!isset($_SESSION['user_name']) || empty($_SESSION['user_name'])) {
    echo "<script> alert('请登陆后再添加'); </script>";
    echo "<meta http-equiv='Refresh' content='0;URL=.'>";
    exit;
}

if (!empty($_REQUEST)) {
	$title = $_REQUEST['title'];
	$desc = $_REQUEST['description'];
	$sample_input = $_REQUEST['sample_input'];
	$sample_output = $_REQUEST['sample_output'];
	$time_limit = $_REQUEST['time_limit'];
	$memory_limit = $_REQUEST['memory_limit'];

	if (empty($title) || empty($desc) || empty($sample_input) || empty($sample_output) || empty($time_limit) || empty($memory_limit)) {
		echo "<script> alert('请完善所有内容后再提交');</script>";
		echo "<meta http-equiv='Refresh' content='0;URL=./add_problem.php'>";
		exit;
	} 

	if (!is_numeric($time_limit) || !is_numeric($memory_limit)) {
		echo "<script> alert('时间空间限制仅填写数字,请修改后再提交');</script>";
		echo "<meta http-equiv='Refresh' content='0;URL=./add_problem.php'>";
		exit;
	}

	if ($_FILES['judge_input']['error'] > 0 || $_FILES['judge_output']['error'] > 0 ) {
        echo "<script> alert('请上传判题输入输出文件后再提交');</script>";
        echo "<meta http-equiv='Refresh' content='0;URL=./add_problem.php'>";
        exit;	
	}

	if ($_FILES['judge_input']['type'] != "text/plain") {
        echo "<script> alert('判题输入输出文件仅为txt格式,上传失败');</script>";
        echo "<meta http-equiv='Refresh' content='0;URL=./add_problem.php'>";
        exit;	
	}

	//大于10M
	if ($_FILES['judge_input']['size'] > 1024*1024*10) {
        echo "<script> alert('判题输入输出文件超过10M,上传失败');</script>";
        echo "<meta http-equiv='Refresh' content='0;URL=./add_problem.php'>";
        exit;	
	}

	//替换空格为<br>存入数据库中	
	$title = str_replace("\n","<br>",$title);
	$desc = str_replace("\n","<br>",$desc);
	$sample_input = str_replace("\n","<br>",$sample_input);
	$sample_output = str_replace("\n","<br>",$sample_output);

	$conn = mysqli_connect($db_config['db_host'],$db_config['db_user'],$db_config['db_password'],$db_config['db_name']) or die('连接数据库失败！');
    mysqli_set_charset($conn,"utf8");

	$conn->begin_transaction();

	$result = $conn->query("insert into problem_info (problem_name,problem_description,time_limit,memory_limit,problem_sample_input,problem_sample_output) 
							values('{$title}','{$desc}','{$time_limit}','{$memory_limit}','{$sample_input}','{$sample_output}')");

	if (!$result) {
		$conn->rollback();
        echo "<script> alert('写入数据库失败，请稍后再试'); </script>";
        echo "<meta http-equiv='Refresh' content='0;URL=./add_problem.php'>";
        exit;	
	}

	$pid = $conn->insert_id;

	$file_path = PROBLEM_IOP_PATH . $pid;
	//文件夹已经有了
	if (is_dir($file_path)) {
		$conn->rollback();
	    echo "<script> alert('上传到服务端失败，请稍后再试'); </script>";
        echo "<meta http-equiv='Refresh' content='0;URL=./add_problem.php'>";	
		exit;
	}

	if (!is_uploaded_file($_FILES['judge_input']['tmp_name']) || !is_uploaded_file($_FILES['judge_output']['tmp_name'])) {
		$conn->rollback();
	    echo "<script> alert('上传到服务端失败，请稍后再试'); </script>";
        echo "<meta http-equiv='Refresh' content='0;URL=./add_problem.php'>";	
		exit;
	}

	//创建文件夹
	if (!mkdir($file_path,0777)) {
		$conn->rollback();
	    echo "<script> alert('创建文件夹错误，请稍后再试'); </script>";
        echo "<meta http-equiv='Refresh' content='0;URL=./add_problem.php'>";	
		exit;
	}

	if (!move_uploaded_file($_FILES['judge_input']['tmp_name'],PROBLEM_IOP_PATH . $pid . "/input.txt")) {
		$conn->rollback();
		//unlink($file_path);
	    echo "<script> alert('创建input错误，请稍后再试'); </script>";
        echo "<meta http-equiv='Refresh' content='0;URL=./add_problem.php'>";	
		exit;
	}

	if (!move_uploaded_file($_FILES['judge_output']['tmp_name'],PROBLEM_IOP_PATH . $pid . "/output.txt")) {
		$conn->rollback();
		//unlink($file_path);
	    echo "<script> alert('创建output错误，请稍后再试'); </script>";
        echo "<meta http-equiv='Refresh' content='0;URL=./add_problem.php'>";	
		exit;
	}

	$file_output_path = PROBLEM_IOP_PATH . $pid . "/output.txt";
	if (!file_exists($file_output_path)) {
		$conn->rollback();
		//unlink($file_path);
	    echo "<script> alert('output.txt文件不存在，请稍后再试'); </script>";
        echo "<meta http-equiv='Refresh' content='0;URL=./add_problem.php'>";	
		exit;
	}

	$contents = file_get_contents($file_output_path);
	if (!$contents) {
		$conn->rollback();
		//unlink($file_path);
	    echo "<script> alert('读取output.txt文件错误，请稍后再试'); </script>";
        echo "<meta http-equiv='Refresh' content='0;URL=./add_problem.php'>";	
		exit;
	}

	if (!file_put_contents($file_output_path,str_replace("\r\n","\n",$contents))) {
		$conn->rollback();
		//unlink($file_path);
	    echo "<script> alert('复制output.txt文件错误，请稍后再试'); </script>";
        echo "<meta http-equiv='Refresh' content='0;URL=./add_problem.php'>";	
		exit;
	}
	
	if (!$conn->commit()) {
		$conn->rollback();
		//unlink($file_path);
	    echo "<script> alert('数据库异常，请稍后再试'); </script>";
        echo "<meta http-equiv='Refresh' content='0;URL=./add_problem.php'>";	
		exit;
	}

    echo "<script> alert('添加题目成功'); </script>";
    echo "<meta http-equiv='Refresh' content='0;URL=.'>";	
}


$smarty = new Smarty_Oj();

$is_login = $_SESSION['is_login'];
$user_name = $_SESSION['user_name'];

$smarty->assign('is_login',$is_login);
$smarty->assign('name',$user_name);

$smarty->display('add_problem.html');
?>
