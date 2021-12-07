<?php

namespace App\Star;
class Person {

    public function __construct($name){

        $this->name = $name;
    }

    public function result(){
        return ' People name: ' . $this->name;
    }
}