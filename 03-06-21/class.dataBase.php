<?php
class Database{
private $host = "localhost",
        $user = "root",
        $password ="",
        $link;

public function connect($db){
$this->link= mysqli_connect($this->host,
$this->user,
$this->password,
$db);

}
public function select($sql){
$result = mysqli_query($this->link,$sql);
return mysqli_fetch_all($result,MYSQLI_ASSOC);

}


}