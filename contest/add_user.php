<?php
require_once (dirname(dirname(__FILE__)) . "/include/include.php");
//require_once (UTILS_PATH . "PHPExcel/Classes/PHPExcel.php");
require_once (UTILS_PATH . "PHPExcel/Classes/PHPExcel/IOFactory.php");
//require_once (UTILS_PATH . "PHPExcel/Classes/PHPExcel/Reader/Excel5.php");

@file_put_contents('/tmp/weijun.log',var_export($_FILES,true)."\n",FILE_APPEND);

$cid = $_REQUEST['cid'];
if ($_FILES['add_user']['error'] > 0) {
    echo "<script> alert('请上传用户名单后再提交');</script>";
    echo "<meta http-equiv='Refresh' content='0;URL=./detail.php?cid=$cid'>";
    exit;
}

if (!is_uploaded_file($_FILES['add_user']['tmp_name'])) {
    echo "<script> alert('上传到服务端失败，请稍后再试'); </script>";
    echo "<meta http-equiv='Refresh' content='0;URL=./detail.php?cid=$cid'>";
    exit;
}

try {
	$inputFileType = PHPExcel_IOFactory::identify($_FILES['add_user']['tmp_name']);
	$objReader = PHPExcel_IOFactory::createReader($inputFileType);
	$objPHPExcel = $objReader->load($_FILES['add_user']['tmp_name']);
} catch(Exception $e) {
	echo "<script> alert('读取excel文件出错，请确定文件类型是否为xlxs'); </script>";
    echo "<meta http-equiv='Refresh' content='0;URL=./detail.php?cid=$cid'>";
    exit;
}

$sheet = $objPHPExcel->getSheet(0);
$highestRow = $sheet->getHighestRow();
$highestColumn = $sheet->getHighestColumn();

$db = new Db();
// 获取一行的数据
for ($row = 1; $row <= $highestRow; $row++){
	$rowData = $sheet->rangeToArray('A' . $row . ":" . $highestColumn . $row,NULL, TRUE, FALSE);
	$sql = "insert into contest_register_user_info (contest_id,user_name) values ('{$cid}','{$rowData[0][0]}')";
	$db->query($sql);
}

echo "<script> alert('导入完成'); </script>";
echo "<meta http-equiv='Refresh' content='0;URL=./detail.php?cid=$cid'>";
exit;

?>
