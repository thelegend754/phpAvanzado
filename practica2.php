<?php 

class Request {

  public $api = 'domain.com';

  public function run(){
    return $this->api;
  }

}

class FormRequest extends Request {

  public function getForm(){
    return 'this is my form';
  }

}

$form = new FormRequest();
echo $form->api;
echo '<hr>';
echo $form->run();
echo '<hr>';
echo $form->getForm();