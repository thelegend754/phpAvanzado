<?php


class Session {

    public $status=1;
    
    public function getStatus(){
        return 'The status is'.$this->status; 
    }
  
}
$session= new Session();
echo $session->getStatus();