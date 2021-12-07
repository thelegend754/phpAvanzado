<?php
$data = array(
    "GroupPrivateToken"=>"872f1891-d4f8-4a44-b566-dfb26e99401e",//"786746b4-90b2-49ce-b852-cb0c13e60b72", 
    "Items" => array(
        array(
            "Quantity" => 2,
            "UnitPrice" => 20,
            "Description" => "product1",
        )),
        "Order"=>"1256",
        "IPNURL"=>"http://cc9850405ef5.ngrok.io/class37/curl/apilistener.php",
        "RedirectURL"=>"https://stablewp.com/wp-content/uploads/2019/12/thankyou1.png",    
        "EmailAddress"=>"youremail@gmail.com",
        "CustomerLastName"=>"name",
        "CustomerFirstName"=>"name",
        "PhoneNumber"=>"0555555555",
        "Currency"=>1,
//        "HideItemList"=>true,
        "MaxPayments"=>3,
//        "CreateToken"=>"yes",  
//        'Custom1'=>$email,
//        "DisplayBackButton"=>true,
);


$url = "https://testicredit.rivhit.co.il/API/PaymentPageRequest.svc/GetUrl";




$jsonData = json_encode($data);
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_HEADER, false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HTTPHEADER,array("Content-type: application/json"));
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $jsonData);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
$result     = curl_exec($curl);
curl_close($curl);
$response   = json_decode($result);
echo "<pre>";
print_r($response->URL);
header("location:$response->URL");