<?php

$name_id = $_POST['name_id'];

$file = file_get_contents('items.json');
$items = json_decode($file, true);

array_splice($items, $name_id, 1);

$jsonFile = fopen('items.json', 'w');
fwrite($jsonFile, json_encode($items, JSON_PRETTY_PRINT));
fclose($jsonFile);


header("location: ../catalog.php");


 ?>
