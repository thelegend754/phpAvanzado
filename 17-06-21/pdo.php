<?php

define('DB_CONFIG', 'mysql:hots=localhost;dbname=eshop;charset=utf8');

define('DB_USER', 'root');

define('DB_PASSWORD','');

try {
    db=new PDO(DB_CONFIG, DB_USER)
}