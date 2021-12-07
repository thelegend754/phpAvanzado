<?php
//require_once 'class/Person.php';
//require_once 'class/User.php';
//$ob = new App\Star\Person('moshe');
//echo $ob->result();
//
//$user = new App\User();    
    

require_once 'class/DataBase.php';
require_once 'class/CreateCsv.php';

$db = new Database("eshop");
$csv = new CreateCsv(["name","price"], $db->select("select machine_name,price from products"));
   
    
    


