<?php
require_once(dirname(__FILE__) . "/include/include.php");
$smarty = new Smarty_Oj();


$smarty->assign('is_login',1);
$smarty->assign('name','weijunweijunweijun');
$smarty->display('home.html');


?>
