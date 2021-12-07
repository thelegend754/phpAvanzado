<?php


require_once 'DataBase.php';
require_once 'class/CreateCsv.php';

$db= new Database("eshop");
//$products =$db->select("select * from products");

$csv = new CreateCsv(["name","price"],$db->select("select machine_name, price from products"));