<?php

require '../connect.php';

// $id =  intval($_POST['id']);
$name = $_POST['name'];
// $image =  $_POST['image'];
$price = intval($_POST['price']);
$stock = $_POST['stock'];
$description = $_POST['description'];
$release_date = $_POST['release-date'];

$rarity = $_POST['rarity'];
$series = $_POST['series'];
$brand = $_POST['brand'];
$sub_brand = $_POST['sub-brand'];
//
// echo $name . ' ' . $price;
// echo $stock . ' ' . $description . ' ' . $rarity;
// echo $series . ' ' . $brand . ' ' . $sub_brand;

$sql = "SELECT * FROM rarities WHERE rarity = '".$rarity."'";
$result = mysqli_query($conn, $sql);
while ($rarity = mysqli_fetch_assoc($result)) {
  extract($rarity);
  $rarity_id = $id;
}

$sql = "SELECT * FROM serials WHERE series = '".$series."'";
$result = mysqli_query($conn, $sql);
while ($series = mysqli_fetch_assoc($result)) {
  extract($series);
  $serial_id = $id;
}

$sql = "SELECT * FROM brands WHERE brand = '".$brand."'";
$result = mysqli_query($conn, $sql);

while ($brand = mysqli_fetch_assoc($result)) {
  extract($brand);
  $brand_id = $id;
}

$sql = "SELECT * FROM sub_brands WHERE sub_brand = '".$sub_brand."'";
$result = mysqli_query($conn, $sql);

while ($sub_brand = mysqli_fetch_assoc($result)) {
  extract($sub_brand);
  $sub_brand_id = $id;
}


$sql = "INSERT INTO items (name, price, stock, description, release_date, item_status_id, rarity_id, serial_id, brand_id, sub_brand_id, product_id) VALUES ('".$name."','".$price."','".$stock."','".$description."','".$release_date."','1','".$rarity_id."','".$serial_id."','".$brand_id."','".$sub_brand_id."','1')";
// var_dump($sql);

$result = mysqli_query($conn, $sql);

// check if successful
if ($result)
  $_SESSION['feedback_msg'] = "Created new item successfully";
  header('location: ../catalogue.php');
else
  die('Error: ' .$sql. '<br>' . mysqli_error($conn));


mysqli_close($conn);

// header('location: ../catalogue.php');
