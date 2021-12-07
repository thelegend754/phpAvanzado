<?php

class DB {

  private $link; 

  public function connect($db){
    $this->link = mysqli_connect('localhost', 'root', '', $db);
  }

  public function select($sql){
    $data = [];
    $result = mysqli_query($this->link, $sql);
    if( $result && mysqli_num_rows($result) ){
      while($row = mysqli_fetch_assoc($result)){
        $data[] = $row;
      }
    }
    return $data;
  }

  public function close(){
    mysqli_close($this->link);
  }

}