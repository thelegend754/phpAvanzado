<?php

spl_autoload_register(function ($class_name){
    if(file_exists($file)){

   include "class/class.dataBase.php";
    echo "$class_name from my function";


    }
 
});


echo "<pre>";
$data = new Database();