<?php


    $ip = file_get_contents('https://api.ipify.org');
    echo "My public IP address is: " . $ip;

echo ("<br>");
     $curl = curl_init();
    
    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://api.hostip.info/country.php',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'DELETE',
      CURLOPT_HTTPHEADER => array(
        'x-auth-token: eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJfaWQiOiI1ZmVlMTM3OGRkMTMwODJiNDg2MzRlZDQiLCJiaXoiOmZhbHNlLCJpYXQiOjE2MTAzODI4MTl9.JSL2YV5Pf6awMxxQ4vPUPZ1B3ry8D8DOJ18gBYxll78'
      ),
    ));

    $response = curl_exec($curl);
    
    curl_close($curl);
    echo ("you are from . $response");
    
    echo ("<br>");
//echo $_SERVER['REMOTE_ADDR']; // muestra: 200.49.6.149

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <A HREF="https://www.hostip.info">
        <IMG SRC="https://api.hostip.info/flag.php" BORDER="0" ALT="IP Address Lookup">
    </A>

</body>

</html>