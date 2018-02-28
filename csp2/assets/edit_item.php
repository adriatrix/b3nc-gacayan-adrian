<?php

$name_id = $_POST['name_id'];

$name = $_POST['name'];
$desciption = $_POST['desciption'];
$image = $_POST['image'];
$price = $_POST['price'];
$category = $_POST['category'];

// echo $username . '<br>' .  $password . '<br>' .  $email . '<br>' .  $user_role;

// $file = file_get_contents('items.json');
// $items = json_decode($file, true);
//
// $items[$name_id]['name'] = $name;
// $items[$name_id]['desciption'] = $desciption;
// if ($image == "") {} else {$items[$name_id]['image'] = 'assets/img/' .$image;}
// $items[$name_id]['price'] = $price;
// $items[$name_id]['category'] = $category;
//
// $jsonFile = fopen('items.json', 'w');
// fwrite($jsonFile, json_encode($items, JSON_PRETTY_PRINT));
// fclose($jsonFile);

header("location: ../item.php?id=$name_id");


 ?>
