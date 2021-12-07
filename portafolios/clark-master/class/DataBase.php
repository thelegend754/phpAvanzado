<?php

class Database{
  
  private $host = 'localhost',
          $user = 'root',
          $password = '',
          $link;
            
  public function __construct($db){    
    $this->link = mysqli_connect($this->host, $this->user, $this->password, $db); 
  }
  
  public function select($sql){
    
    $data = [];
    $result = mysqli_query($this->link, $sql);
    
    if($result && mysqli_num_rows($result) > 0){
      
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