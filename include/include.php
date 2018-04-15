<?php
define('INCLUDE_PATH','/home/oj_web/include/');
define('CONFIG_PATH','/home/oj_web/include/config.php');
define('ROOT_PATH','/home/oj_web');
define('PROBLEM_IOP_PATH','/home/oj_problem_iop/');
define('SMARTY_DIR', '/usr/local/lib/smarty-master/libs/');
require_once(INCLUDE_PATH . 'smarty.php');
session_start();

define('UTILS_PATH','/home/oj_web/utils/');
define('CONTEST_CODE_STORGE_PATH','/home/oj_contest_code_storge/');
define('CODE_STORGE_PATH','/home/oj_code_storge/');
require_once(UTILS_PATH . 'db.php');
require_once(UTILS_PATH . 'file.php');
require_once(UTILS_PATH . 'utils.php');
require_once(CONFIG_PATH);
?>
