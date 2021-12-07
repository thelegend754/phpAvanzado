<?php


class User{
static public $name = 'jonas';


static public function GetName(){
return self::$name;
}


static public function PostName(){
    return self::$name;
    }

}

echo User::GetName();
echo User::PostName();