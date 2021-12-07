<?php
$raw_post_data = file_get_contents('php://input');
$raw_post=json_encode($raw_post_data);

$raw_post_array = explode('&', $raw_post_data);
$IPNPost = array();
foreach ($raw_post_array as $keyval) {
    $keyval = explode ('=', $keyval);
    if (count($keyval) == 2)
        $IPNPost[$keyval[0]] = urldecode($keyval[1]);
} 


$data =  file_get_contents('php://input');
file_put_contents("responseFromServer.txt", print_r($IPNPost,true));
