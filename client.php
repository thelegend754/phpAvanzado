<?php 

require_once 'DB.php';
$db = new DB();
$db->connect('eshop');
$users = $db->select('SELECT * FROM users');

foreach($users as $user){
  echo $user['name'] . '<br>';
}