<?php

require_once(dirname(__FILE__) . "/include/include.php");


setcookie(session_name(), "", time() - 3600);
session_destroy();

header('Location:index.php');

exit;
?>
