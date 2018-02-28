<?php

//检测是否为合法的Y-m-d H:i:s模式
function checkDateValid($date) {
	if (date('Y-m-d H:i:s',strtotime($date)) == $date) {
		return true;
	} else {
		return false;
	}
}

?>
