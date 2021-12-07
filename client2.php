<?php 

require_once 'DB.php';
$db = new DB();
$db->connect('eshop');
$products = $db->select("SELECT title FROM products");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products Page</title>
</head>

<body>
    <ul>
        <?php foreach($products as $product): ?>
        <li><?= $product['title']; ?></li>
        <?php endforeach; ?>
    </ul>
</body>

</html>