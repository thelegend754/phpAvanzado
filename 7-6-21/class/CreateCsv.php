<?php

class CreateCsv {
public $header ,
$data;

public function __construct($headerData,$products) {
    $this->header = $headerData;

    $this->data = $products;
}

public function doqnloadCsv(){
$file = fopen("products.csv","w");
foreach ($this->data as $line) {
fputcsv($file,$line);


}


}
    
}