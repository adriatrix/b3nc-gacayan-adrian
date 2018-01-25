<?php

$product_name = $_POST['pname'];
$desciption = $_POST['desciption'];
$price = $_POST['price'];
$category = $_POST['category'];
$image =  $_POST['image'];

// echo $userName . ' ' . $passWord . ' ' . $email;

$file = file_get_contents('items.json');
$items = json_decode($file, true);

$newItem = array('name' => $product_name, 'desciption' => $desciption, 'image' => 'assets/img/' .$image, 'price' => $price, 'category' => $category);

array_push($items, $newItem);

$jsonFile = fopen('items.json', 'w');
fwrite($jsonFile, json_encode($items, JSON_PRETTY_PRINT));
fclose($jsonFile);

header('location: ../catalog.php');
