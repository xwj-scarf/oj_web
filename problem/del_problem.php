<?php

require_once (dirname(dirname(__FILE__)) . "/include/include.php");

$pid = (isset($_REQUEST['problem_id']) && is_numeric($_REQUEST['problem_id'])) ? $_REQUEST['problem_id'] : 0;
var_dump($pid);

if (empty($_SESSION['user_id']) || empty($_SESSION['user_name'])) {
	echo "<script> alert('请登陆后再操作'); </script>";
	echo "<meta http-equiv='Refresh' content='0;URL=.'>";
	exit;
}

$sql = "delete from problem_info where pid = '{$pid}'";
$db = new Db();

$db->begin_transaction();

$db->query($sql);
$data = $db->getAffectedRows();
if ($data == 0) {
	$db->rollback();
	echo "<script> alert('删除失败'); </script>";
	echo "<meta http-equiv='Refresh' content='0;URL=.'>";
	exit;
}
$sql = "delete from contest_problem_info where pid = '{$pid}'";

$db->query($sql);

$db->commit();
echo "<script> alert('删除成功'); </script>";
echo "<meta http-equiv='Refresh' content='0;URL=.'>";
exit;

?>
