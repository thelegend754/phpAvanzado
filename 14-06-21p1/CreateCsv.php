<?php

class CreateCsv{
   
    public $header ,
           $data;
    
 public function __construct(array $headerData,$products) {
     $this->header = $headerData;
     $this->data = $products;
     $this->downloadCsv();
 }
    
 public function downloadCsv(){
     array_unshift($this->data, $this->header);
     $file = fopen("products.csv", "w");
     foreach ($this->data as $line) {
         fputcsv($file, $line);
     }
 }
 
    
    
}

