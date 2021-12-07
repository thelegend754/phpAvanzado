<?php 

require 'class.dataBase.php';

$db = new Database();
$db->connect("eshop");
$result= $db->select("SELECT * FROM products");

echo "<pre>";
print_r($result);