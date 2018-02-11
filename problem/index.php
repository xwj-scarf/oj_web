<?php

require_once (dirname(dirname(__FILE__)) . "/include/config.php");

$smarty = new Smarty_Oj();

$data = array(
	'1' => array(
		'name' => 'asd',
		'pass' => 0,
	),
	'2' => array(
		'name' => 'sdf',
		'pass'=> 1,
	),
);

$smarty->assign('data',$data);

$smarty->display('problem.html');


?>
