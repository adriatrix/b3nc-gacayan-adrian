<?php

session_start();

$_SESSION['feedback_msg'] = "Created new item successfully";
header('location: ../catalogue.php');

require '../connect.php';

$target_dir = "img/items/";
$target_file = $target_dir . basename($_FILES['image']['name']);
$target = "assets/img/items/";


// $id =  intval($_POST['id']);
$name = $_POST['name'];
$image = $target .''. ($_FILES['image']['name']);
$price = intval($_POST['price']);
$stock = $_POST['stock'];
$description = $_POST['description'];
$release_date = $_POST['release-date'];

$rarity = $_POST['rarity'];
$series = $_POST['series'];
$brand = $_POST['brand'];
$sub_brand = $_POST['sub-brand'];

if(move_uploaded_file($_FILES['image']['tmp_name'],$target_file)) {
  echo "file is uploaded";
} else {
  echo "error has occured";
}


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


$sql = "INSERT INTO items (name, price, image, stock, description, release_date, item_status_id, rarity_id, serial_id, brand_id, sub_brand_id, product_id) VALUES ('".$name."','".$price."','".$image."','".$stock."','".$description."','".$release_date."','1','".$rarity_id."','".$serial_id."','".$brand_id."','".$sub_brand_id."','1')";
mysqli_query($conn, $sql);

// check if successful


mysqli_close($conn);
