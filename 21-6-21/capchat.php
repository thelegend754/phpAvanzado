<?php
require 'vendor/autoload.php';

use Gregwar\Captcha\CaptchaBuilder;

session_start();

$builder = new CaptchaBuilder;
$builder->build();

echo __LINE__. "-this is the session old captcha ". $_SESSION['phrase']."<br>";

$_SESSION['phrase'] = $builder->getPhrase();



if(isset($_POST['submit'])){
if(isset($_POST['UserValidCaptch'])){

    if($_POST['UserValidCaptch'] === $_SESSION['phrase']){


    }
}

}


echo __LINE__. " - ".$_SESSION['phrase']= $builder->getPhrase();
echo "<hr>";


?>

<!DOCTYPE html>
<html lang="en">

<head>

    <title>Document</title>
</head>

<body>
    <form>


        <img src="<?php echo $builder->inline(); ?>" />
        <input type="text" name="validateCapth">
        <button type="submit"> Enter Captcha</button>

    </form>


</body>

</html>