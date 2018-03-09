<?php

stream_context_set_default(
    array(
        'http' => array(
            'method' => 'HEAD'
        )
    )
);

$info = get_headers('http://www.baidu.com'); 

//$info = array();
//exec("curl -v -I http://www.baidu.com",$info);
?>
