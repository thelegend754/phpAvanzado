<?php

if(isset($_GET['method']) && $_GET['method'] == "get" ){
echo "get request test endpoint";    
}

if(isset($_POST)){
    echo "post request";
}

