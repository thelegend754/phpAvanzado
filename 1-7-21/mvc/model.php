<?php
function getData($arcId){
    $link=mysqli_connect("localhost","root","","eshop");
$result = mysqli_query($link,'SELECT FROM');
$data=mysqli_fetch_all($result, MYSQL_ASSOC);
return $data;
}